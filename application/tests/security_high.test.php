<?php

namespace Application\Tests;

defined('DS') or exit('No direct access.');

class SecurityHighTest extends \PHPUnit_Framework_TestCase
{
    use \System\Testing\Http;

    public function testAdminRoutesRequireAdminRole()
    {
        $routes = file_get_contents(path('package').'admin'.DS.'routes.php');
        $this->assertContains("['before' => 'auth|can:admin']", $routes);

        $gate = file_get_contents(path('app').'boot.php');
        $this->assertContains("Gate::define('admin'", $gate);
        $this->assertContains('!empty($user->is_admin)', $gate);
    }

    public function testAuthenticatedNonAdminCannotEnterAdminRoutes()
    {
        $this->acting_as((object) ['id' => 99, 'email' => 'guest@example.test', 'is_admin' => 0])
            ->get('admin/galleries')
            ->assert_forbidden();
    }

    public function testNonAdminLoginIsRejected()
    {
        $controller = file_get_contents(path('package').'admin'.DS.'controllers'.DS.'auth.php');
        $this->assertContains('if ($user && !empty($user->is_admin))', $controller);
        $this->assertContains('Auth::logout()', $controller);
    }

    public function testMapUrlsRequireHttpScheme()
    {
        $controller = file_get_contents(path('package').'admin'.DS.'controllers'.DS.'event.php');
        $view = file_get_contents(path('app').'views'.DS.'components'.DS.'wedding'.DS.'events.blade.php');

        $this->assertContains("'match:/^https?:\\\\/\\\\//i'", $controller);
        $this->assertContains("preg_match('/^https?:\\\\/\\\\//i'", $view);
    }

    public function testDebuggerIsDisabledByDefault()
    {
        $debugger = file_get_contents(path('app').'config'.DS.'debugger.php');
        $this->assertContains("'activate' => false", $debugger);
        $this->assertContains("'debugbar' => false", $debugger);
    }

    public function testPublicRsvpPostIsRateLimited()
    {
        $controller = file_get_contents(path('app').'controllers'.DS.'theme.php');
        $this->assertContains("csrf|throttle:10,1", $controller);
    }
}
