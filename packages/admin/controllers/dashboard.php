<?php
defined('DS') or exit('No direct access.');

class Admin_Dashboard_Controller extends Controller
{
    public $restful = true;

    public function get_index()
    {
        $wedding = Wedding::where('is_active', '=', 1)->order_by('id')->first();
        if (! $wedding) { return Response::error(404); }
        return View::make('admin::home', [
            'wedding' => $wedding,
            'events_count' => DB::table('wedding_events')->where('wedding_id', '=', $wedding->id)->count(),
            'galleries_count' => DB::table('wedding_galleries')->where('wedding_id', '=', $wedding->id)->count(),
            'gifts_count' => DB::table('wedding_gifts')->where('wedding_id', '=', $wedding->id)->count(),
            'rsvps' => DB::table('wedding_rsvps')->where('wedding_id', '=', $wedding->id)->order_by('created_at', 'desc')->take(100)->get(),
        ]);
    }
}
