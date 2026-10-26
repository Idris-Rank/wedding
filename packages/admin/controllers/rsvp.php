<?php
defined('DS') or exit('No direct access.');

class Admin_Rsvp_Controller extends Controller
{
    public $restful = true;
    public function get_index() { $wedding = Wedding::where('is_active', '=', 1)->order_by('id')->first(); return View::make('admin::rsvps.index', ['wedding' => $wedding, 'rsvps' => DB::table('wedding_rsvps')->where('wedding_id', '=', $wedding->id)->order_by('created_at', 'desc')->get()]); }
    public function post_delete($id)
    {
        $wedding = Wedding::where('is_active', '=', 1)->order_by('id')->first();
        DB::table('wedding_rsvps')->where('id', '=', (int) $id)->where('wedding_id', '=', $wedding->id)->delete();
        return Redirect::back()->with('admin_status', 'RSVP berhasil dihapus.');
    }
}
