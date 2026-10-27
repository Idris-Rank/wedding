<?php

namespace Application\Tests;

defined('DS') or exit('No direct access.');

class AdminCrudTest extends \PHPUnit_Framework_TestCase
{
    use \System\Testing\Http;

    /**
     * All protected admin resources must reject unauthenticated requests.
     *
     * @group application
     */
    public function testCrudPagesRequireAuthentication()
    {
        foreach (['admin/events', 'admin/galleries', 'admin/gifts', 'admin/wedding'] as $uri) {
            $this->get($uri)->assert_unauthorized();
        }
    }

    /**
     * Controllers must expose the CRUD methods wired by the package routes.
     *
     * @group application
     */
    public function testCrudControllersStayAlignedWithRoutes()
    {
        $controllers = [
            'event' => ['get_index', 'get_create', 'post_store', 'get_edit', 'post_update', 'post_delete'],
            'gallery' => ['get_index', 'get_create', 'post_store', 'get_edit', 'post_update', 'post_delete'],
            'gift' => ['get_index', 'get_create', 'post_store', 'get_edit', 'post_update', 'post_delete'],
            'wedding' => ['get_index', 'post_update'],
        ];

        foreach ($controllers as $name => $methods) {
            $source = file_get_contents(path('package').'admin'.DS.'controllers'.DS.$name.'.php');
            foreach ($methods as $method) {
                $this->assertContains('function '.$method, $source, $name.' controller is missing '.$method);
            }
        }
    }

    /**
     * Child resources must always be scoped to the active wedding.
     *
     * @group application
     */
    public function testChildCrudControllersKeepWeddingScope()
    {
        foreach (['event', 'gallery', 'gift'] as $name) {
            $source = file_get_contents(path('package').'admin'.DS.'controllers'.DS.$name.'.php');
            $this->assertContains("where('wedding_id', '=', \$wedding->id)", $source, $name.' controller lost wedding scoping');
        }
    }

    public function testWeddingMediaUsesUploadsInsteadOfPaths()
    {
        $controller = file_get_contents(path('package').'admin'.DS.'controllers'.DS.'wedding.php');
        $view = file_get_contents(path('package').'admin'.DS.'views'.DS.'partials'.DS.'wedding.blade.php');
        $this->assertContains("hero_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240", $controller);
        $this->assertContains("audio_path' => 'nullable|mimes:mp3,wav,ogg|max:10240", $controller);
        $this->assertContains('enctype="multipart/form-data"', $view);
        $this->assertContains('type="file"', $view);
        $this->assertNotContains('Path hero image', $view);
        $this->assertNotContains('Path audio', $view);
        $this->assertContains("bride_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240", $controller);
        $this->assertContains("groom_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240", $controller);
        $this->assertContains("['bride_image'", $view);
        $this->assertContains("['groom_image'", $view);
        $this->assertContains('post_delete_media', $controller);
        $this->assertContains('admin/wedding/media/', $view);
    }

    public function testSharedUploadHelperAndRsvpDeleteStayProtected()
    {
        $helper = file_get_contents(path('app').'libraries'.DS.'wedding'.DS.'upload.php');
        $rsvp = file_get_contents(path('package').'admin'.DS.'controllers'.DS.'rsvp.php');
        $this->assertContains('class Wedding_Upload', $helper);
        $this->assertContains("Wedding_Upload::store", file_get_contents(path('package').'admin'.DS.'controllers'.DS.'gallery.php'));
        $this->assertContains("Wedding_Upload::store", file_get_contents(path('package').'admin'.DS.'controllers'.DS.'wedding.php'));
        $this->assertContains("where('wedding_id', '=', \$wedding->id)", $rsvp);
        $this->assertContains('if ($rsvp)', $rsvp);
    }

    public function testHeroImageIsUsedByPublicCover()
    {
        $cover = file_get_contents(path('app').'views'.DS.'components'.DS.'wedding'.DS.'cover.blade.php');
        $this->assertContains("\$wedding['hero_image']", $cover);
        $this->assertContains("\$wedding['bride']", $cover);
    }

    public function testCoupleImagesAreUsedByPublicCoupleSection()
    {
        $couple = file_get_contents(path('app').'views'.DS.'components'.DS.'wedding'.DS.'couple.blade.php');
        $this->assertContains("\$wedding['bride_image']", $couple);
        $this->assertContains("\$wedding['groom_image']", $couple);
    }

    public function testPublicMediaUsesConfiguredAudioAndGalleryFallbacks()
    {
        $home = file_get_contents(path('app').'views'.DS.'home.blade.php');
        $gallery = file_get_contents(path('app').'views'.DS.'components'.DS.'wedding'.DS.'gallery.blade.php');
        $this->assertContains("asset(\$wedding['audio_path'])", $home);
        $this->assertNotContains('SoundHelix', $home);
        $this->assertContains('loading="lazy"', $gallery);
        $this->assertContains('Galeri segera hadir', $gallery);
    }

    public function testRsvpFiltersAndEventTimeValidationArePresent()
    {
        $rsvp = file_get_contents(path('package').'admin'.DS.'controllers'.DS.'rsvp.php');
        $event = file_get_contents(path('package').'admin'.DS.'controllers'.DS.'event.php');
        $view = file_get_contents(path('package').'admin'.DS.'views'.DS.'rsvps'.DS.'index.blade.php');
        $this->assertContains("Input::get('attendance')", $rsvp);
        $this->assertContains("Input::get('search')", $rsvp);
        $this->assertContains('Waktu selesai harus setelah waktu mulai', $event);
        $this->assertContains('Total respons', $view);
        $this->assertContains('name="search"', $view);
        $this->assertContains("'sort_order' => 'nullable|integer|min:1", file_get_contents(path('package').'admin'.DS.'controllers'.DS.'gallery.php'));
    }
}
