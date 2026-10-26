<?php

defined('DS') or exit('No direct access.');

class Seed_Default_Wedding_Data
{
    public function up()
    {
        $existing = DB::table('weddings')->where('slug', '=', 'ratri-jatmiko')->first();

        if ($existing) {
            return;
        }

        DB::connection()->transaction(function ($connection) {
            $connection->table('weddings')->insert([
                'slug' => 'ratri-jatmiko',
                'groom_name' => 'Jatmiko Pradana',
                'bride_name' => 'Ratri Ayuningtyas',
                'groom_parents' => 'Bapak Haryanto & Ibu Wulandari',
                'bride_parents' => 'Bapak Suyatno & Ibu Sri Lestari',
                'quote' => 'Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu pasangan hidup dari jenismu sendiri, supaya kamu merasa tenteram kepadanya.',
                'quote_source' => 'QS. Ar-Rum: 21',
                'hero_image' => 'images/hero.jpg',
                'audio_path' => 'audio/wedding-song.mp3',
                'whatsapp' => '6281234567890',
                'is_active' => true,
            ]);

            $wedding = $connection->table('weddings')->where('slug', '=', 'ratri-jatmiko')->first();

            $connection->table('wedding_events')->insert([
                [
                    'wedding_id' => $wedding->id,
                    'event_type' => 'akad',
                    'title' => 'Akad Nikah',
                    'event_date' => '2026-09-20',
                    'start_time' => '08:00:00',
                    'end_time' => '10:00:00',
                    'venue' => 'Masjid Gedhe Kauman',
                    'address' => 'Yogyakarta',
                    'maps_url' => 'https://maps.google.com/?q=Masjid+Gedhe+Kauman+Yogyakarta',
                    'sort_order' => 1,
                ],
                [
                    'wedding_id' => $wedding->id,
                    'event_type' => 'resepsi',
                    'title' => 'Resepsi',
                    'event_date' => '2026-09-21',
                    'start_time' => '11:00:00',
                    'end_time' => '14:00:00',
                    'venue' => 'Pendopo Royal Ambarrukmo',
                    'address' => 'Yogyakarta',
                    'maps_url' => 'https://maps.google.com/?q=Royal+Ambarrukmo+Yogyakarta',
                    'sort_order' => 2,
                ],
            ]);

            $connection->table('wedding_galleries')->insert([
                ['wedding_id' => $wedding->id, 'image_path' => 'images/gallery-01.jpg', 'alt_text' => 'Momen kebersamaan Ratri dan Jatmiko', 'caption' => 'Momen kebersamaan', 'sort_order' => 1, 'is_visible' => true],
                ['wedding_id' => $wedding->id, 'image_path' => 'images/gallery-02.jpg', 'alt_text' => 'Dekorasi pernikahan', 'caption' => 'Dekorasi', 'sort_order' => 2, 'is_visible' => true],
                ['wedding_id' => $wedding->id, 'image_path' => 'images/gallery-03.jpg', 'alt_text' => 'Buket bunga', 'caption' => 'Buket bunga', 'sort_order' => 3, 'is_visible' => true],
                ['wedding_id' => $wedding->id, 'image_path' => 'images/gallery-04.jpg', 'alt_text' => 'Cincin pernikahan', 'caption' => 'Cincin pernikahan', 'sort_order' => 4, 'is_visible' => true],
            ]);

            $connection->table('wedding_gifts')->insert([
                ['wedding_id' => $wedding->id, 'provider' => 'BCA', 'account_name' => 'Ratri Ayuningtyas', 'account_number' => '1234567890', 'sort_order' => 1, 'is_visible' => true],
                ['wedding_id' => $wedding->id, 'provider' => 'DANA', 'account_name' => 'Jatmiko Pradana', 'account_number' => '081234567890', 'sort_order' => 2, 'is_visible' => true],
            ]);
        });
    }

    public function down()
    {
        $wedding = DB::table('weddings')->where('slug', '=', 'ratri-jatmiko')->first();

        if ($wedding) {
            DB::table('weddings')->where('id', '=', $wedding->id)->delete();
        }
    }
}
