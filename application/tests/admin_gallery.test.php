<?php

namespace Application\Tests;

defined('DS') or exit('No direct access.');

class AdminGalleryTest extends \PHPUnit_Framework_TestCase
{
    use \System\Testing\Http;

    /**
     * Admin gallery routes must remain protected by authentication.
     *
     * @group application
     */
    public function testGalleryPageRequiresAuthentication()
    {
        $this->get('admin/galleries')->assert_unauthorized();
    }

    /**
     * The gallery source must use multipart upload validation and not accept paths.
     *
     * @group application
     */
    public function testGalleryUploadRulesRemainRestricted()
    {
        $controller = file_get_contents(path('package').'admin'.DS.'controllers'.DS.'gallery.php');

        $this->assertContains("image_path' => 'required|image|mimes:jpg,jpeg,png,webp|max:10240", $controller);
        $this->assertContains("image_path' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240", $controller);
        $this->assertContains("'images/gallery'", $controller);
        $this->assertContains('Wedding_Upload::remove($new_image', $controller);
        $this->assertContains('if ($new_image) { Wedding_Upload::remove($gallery->image_path', $controller);
    }

    /**
     * Gallery forms must keep the upload and replacement UX intact.
     *
     * @group application
     */
    public function testGalleryFormsUseMultipartPreviewAndDeleteConfirmation()
    {
        $create = file_get_contents(path('package').'admin'.DS.'views'.DS.'galleries'.DS.'create.blade.php');
        $edit = file_get_contents(path('package').'admin'.DS.'views'.DS.'galleries'.DS.'edit.blade.php');
        $index = file_get_contents(path('package').'admin'.DS.'views'.DS.'galleries'.DS.'index.blade.php');

        $this->assertContains('enctype="multipart/form-data"', $create);
        $this->assertContains('gallery-preview', $create);
        $this->assertContains('gallery-preview', $edit);
        $this->assertContains("confirm('Hapus foto ini?')", $index);
    }
}
