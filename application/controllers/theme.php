<?php

defined('DS') or exit('No direct access.');

class Theme_Controller extends Controller
{
    public function __construct()
    {
        // $this->middleware('before', 'csrf|throttle:60,1')->on('post');
    }

    public function action_index()
    {
        $record = Wedding::where('is_active', '=', 1)->order_by('id')->first();

        if (! $record) {
            return Response::error('404');
        }

        $events = DB::table('wedding_events')->where('wedding_id', '=', $record->id)->order_by('sort_order')->get();
        $galleries = DB::table('wedding_galleries')->where('wedding_id', '=', $record->id)->where('is_visible', '=', 1)->order_by('sort_order')->get();
        $gifts = DB::table('wedding_gifts')->where('wedding_id', '=', $record->id)->where('is_visible', '=', 1)->order_by('sort_order')->get();
        $first_event = $events->first();

        $wedding = [
            'bride' => $record->bride_name,
            'groom' => $record->groom_name,
            'short_names' => $record->bride_name.' & '.$record->groom_name,
            'date' => $first_event ? date('d F Y', strtotime($first_event->event_date)) : '',
            'date_iso' => $first_event ? date('c', strtotime($first_event->event_date.' '.$first_event->start_time)) : date('c'),
            'city' => $first_event ? $first_event->address : '',
            'bride_parents' => $record->bride_parents,
            'groom_parents' => $record->groom_parents,
            'quote' => $record->quote,
            'quote_source' => $record->quote_source,
            'whatsapp' => $record->whatsapp,
            'hero_image' => $this->asset_or_null($record->hero_image, 'image'),
            'bride_image' => $this->asset_or_null($record->bride_image, 'image'),
            'groom_image' => $this->asset_or_null($record->groom_image, 'image'),
            'audio_path' => $this->asset_or_null($record->audio_path, 'audio'),
            'story' => [
                'eyebrow' => 'Cerita kami',
                'title' => 'Dari sebuah pertemuan, menuju selamanya.',
                'body' => 'Berawal dari pertemuan sederhana di Yogyakarta, dua keluarga dan dua perjalanan hidup akhirnya dipertemukan dalam satu niat baik. Dengan doa orang tua dan restu keluarga, kami memilih untuk berjalan bersama.',
                'quote' => 'Rukun agawe santosa, crah agawe bubrah.',
                'image' => $this->asset_or_null($record->hero_image, 'image'),
            ],
            'events' => $events->map(function ($event) {
                return [
                    'day' => date('l', strtotime($event->event_date)),
                    'title' => $event->title,
                    'date' => date('d F Y', strtotime($event->event_date)),
                    'time' => date('H.i', strtotime($event->start_time)).' - '.date('H.i', strtotime($event->end_time)).' WIB',
                    'venue' => $event->venue,
                    'address' => $event->address,
                    'map' => $event->maps_url,
                ];
            })->all(),
            'galleries' => $galleries,
            'gifts' => $gifts,
        ];

        return View::make('home', compact('wedding'));
    }

    protected function asset_or_null($asset, $type)
    {
        return ($asset && is_file(path('assets').str_replace('/', DS, $asset))) ? $asset : null;
    }

    public function action_rsvp()
    {
        $validation = Validator::make(Input::all(), [
            'name' => 'required|max:150',
            'attendance' => 'required|in:yes,no',
            'guest_count' => 'required|integer|min:1|max:10',
            'message' => 'nullable|max:1000',
        ]);

        if ($validation->fails()) {
            return Response::json(['message' => 'Periksa kembali data RSVP.', 'errors' => $validation->errors->all()], 422);
        }

        $wedding = DB::table('weddings')->where('is_active', '=', 1)->order_by('id')->first();

        if (! $wedding) {
            return Response::json(['message' => 'Undangan tidak tersedia.'], 404);
        }

        $data = $validation->validated();
        DB::table('wedding_rsvps')->insert([
            'wedding_id' => $wedding->id,
            'guest_name' => $data['name'],
            'attendance' => $data['attendance'],
            'guest_count' => (int) $data['guest_count'],
            'message' => isset($data['message']) ? $data['message'] : null,
        ]);

        return Response::json(['message' => 'Terima kasih, konfirmasi kehadiran Panjenengan sudah diterima.'], 201);
    }
}
