<?php

namespace Application\Tests;

defined('DS') or exit('No direct access.');

class AdminRsvpTest extends \PHPUnit_Framework_TestCase
{
    /**
     * RSVP management must preserve the current admin UI contract.
     *
     * @group application
     */
    public function testRsvpViewHasConsistentStateAndDeleteAction()
    {
        $view = file_get_contents(path('package').'admin'.DS.'views'.DS.'partials'.DS.'rsvps.blade.php');

        $this->assertContains('rounded-lg', $view);
        $this->assertContains('@if (count($rsvps))', $view);
        $this->assertContains('Belum ada RSVP', $view);
        $this->assertContains("confirm('Hapus RSVP ini?')", $view);
    }
}
