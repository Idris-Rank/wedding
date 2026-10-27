<?php

namespace Application\Tests;

defined('DS') or exit('No direct access.');

class AdminCredentialsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * The seed must not ship a usable credential in source control.
     *
     * @group application
     */
    public function testSeedShipsNoUsablePassword()
    {
        $seed = file_get_contents(path('app').'migrations'.DS.'2026_10_26_000006_seed_admin_user.php');
        $this->assertNotContains('$2y$', $seed, 'Seed must not contain a committed password hash');
        $this->assertContains('admin@gmail.com', $seed, 'The historical migration must remain immutable');
        $this->assertContains('Str::random', $seed);
        $this->assertContains('Hash::make', $seed);
        $migration = file_get_contents(path('app').'migrations'.DS.'2026_10_27_000007_migrate_admin_email.php');
        $this->assertContains('admin@gmail.com', $migration);
        $this->assertContains('admin@example.com', $migration);
    }

    /**
     * Rotation command must hash random passwords via the framework APIs.
     *
     * @group application
     */
    public function testPasswordRotationCommandUsesFrameworkApis()
    {
        $command = file_get_contents(path('app').'commands'.DS.'adminpassword.php');
        $this->assertContains('class Adminpassword_Command', $command);
        $this->assertContains('Str::random', $command);
        $this->assertContains('Hash::make', $command);
        $this->assertContains('get_cli_option', $command);
        $this->assertContains('Opsi --email wajib diisi', $command);
        $this->assertNotContains("order_by('id')->first()", $command);
    }
}
