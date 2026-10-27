<?php

defined('DS') or exit('No direct access.');

class Adminpassword_Command extends Command
{
    /**
     * Putar (reset) password admin dengan password acak baru, lalu tampilkan
     * kredensial sekali di terminal.
     *
     * Usage:
     *   php rakit adminpassword --email=admin@example.com
     *   php rakit adminpassword --new-email=owner@example.com
     *
     * Opsi --password=xxx tersedia, tetapi menghindarilah: password yang
     * diketik di CLI tersimpan di history shell.
     *
     * @param array $arguments
     *
     * @return void
     */
    public function run(array $arguments = [])
    {
        $email = get_cli_option('email');

        if (is_null($email) || '' === trim($email)) {
            echo $this->error('Opsi --email wajib diisi untuk menentukan user admin.');
            return;
        }

        $user = DB::table('users')->where('email', '=', trim($email))->first();

        if (is_null($user)) {
            echo $this->error('User dengan email '.$email.' tidak ditemukan.');
            return;
        }

        $password = get_cli_option('password');

        if (is_null($password) || '' === trim($password)) {
            $password = Str::random(16);
        }

        $update = ['password' => Hash::make($password)];

        $new_email = get_cli_option('new-email');
        if (! is_null($new_email) && '' !== trim($new_email)) {
            $update['email'] = trim($new_email);
        }

        DB::table('users')->where('id', '=', $user->id)->update($update);

        $shown_email = isset($update['email']) ? $update['email'] : $user->email;

        echo $this->info('Kredensial admin diperbarui.');
        echo $this->info('Email: '.$shown_email);
        echo $this->info('Password: '.$password);
        echo $this->warning('Simpan password ini sekarang; ia tidak akan ditampilkan lagi.');
    }
}
