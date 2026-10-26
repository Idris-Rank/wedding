<?php

defined('DS') or exit('No direct access.');

class Home_Controller extends Controller
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        // $this->middleware('before', 'csrf|throttle:60,1')->on('post');
    }

    /**
     * Handle GET /.
     *
     * @return View
     */
    public function action_index()
    {
        $wedding = [
            'bride' => 'Ratri Ayuningtyas',
            'groom' => 'Jatmiko Pradana',
            'short_names' => 'Ratri & Jatmiko',
            'date' => '21 September 2025',
            'date_iso' => '2025-09-21T11:00:00+07:00',
            'city' => 'Yogyakarta, Indonesia',
            'bride_parents' => 'Bapak Suyatno & Ibu Sri Lestari',
            'groom_parents' => 'Bapak Haryanto & Ibu Wulandari',
            'quote' => 'Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu pasangan hidup dari jenismu sendiri, supaya kamu merasa tenteram kepadanya.',
            'quote_source' => 'QS. Ar-Rum: 21',
            'whatsapp' => '6281234567890',
            'story' => [
                'eyebrow' => 'Cerita kami',
                'title' => 'Dari sebuah pertemuan, menuju selamanya.',
                'body' => 'Berawal dari pertemuan sederhana di Yogyakarta, dua keluarga dan dua perjalanan hidup akhirnya dipertemukan dalam satu niat baik. Dengan doa orang tua dan restu keluarga, kami memilih untuk berjalan bersama.',
                'quote' => 'Rukun agawe santosa, crah agawe bubrah.',
                'image' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=1000&q=85',
            ],
            'events' => [
                [
                    'day' => 'Sabtu',
                    'title' => 'Akad Nikah',
                    'date' => '20 September 2025',
                    'time' => '08.00 - 10.00 WIB',
                    'venue' => 'Masjid Gedhe Kauman',
                    'address' => 'Yogyakarta',
                    'map' => 'https://maps.google.com/?q=Masjid+Gedhe+Kauman+Yogyakarta',
                ],
                [
                    'day' => 'Minggu',
                    'title' => 'Resepsi',
                    'date' => '21 September 2025',
                    'time' => '11.00 - 14.00 WIB',
                    'venue' => 'Pendopo Royal Ambarrukmo',
                    'address' => 'Yogyakarta',
                    'map' => 'https://maps.google.com/?q=Royal+Ambarrukmo+Yogyakarta',
                ],
            ],
        ];

        return View::make('home', compact('wedding'));
    }
}
