<?php
defined('DS') or exit('No direct access.');

class Admin_Rsvp_Controller extends Controller
{
    public $restful = true;
    public function get_index() { $wedding = Wedding::where('is_active', '=', 1)->order_by('id')->first(); $query = DB::table('wedding_rsvps')->where('wedding_id', '=', $wedding->id); $attendance = Input::get('attendance'); $search = trim((string) Input::get('search')); if (in_array($attendance, ['yes', 'no'])) { $query->where('attendance', '=', $attendance); } if ($search !== '') { $query->where('guest_name', 'like', '%'.$search.'%'); } $filtered_total = $query->count(); $per_page = 15; $page = max(1, (int) Input::get('page', 1)); $rsvps = $query->order_by('created_at', 'desc')->skip(($page - 1) * $per_page)->take($per_page)->get(); $all = DB::table('wedding_rsvps')->where('wedding_id', '=', $wedding->id)->get(); return View::make('admin::rsvps.index', ['wedding' => $wedding, 'rsvps' => $rsvps, 'attendance_filter' => $attendance, 'search' => $search, 'page' => $page, 'per_page' => $per_page, 'filtered_total' => $filtered_total, 'rsvp_total' => count($all), 'rsvp_yes' => count($all->where('attendance', '=', 'yes')), 'rsvp_no' => count($all->where('attendance', '=', 'no')), 'guest_total' => $all->sum('guest_count')]); }
    public function post_delete($id)
    {
        $wedding = Wedding::where('is_active', '=', 1)->order_by('id')->first();
        $rsvp = DB::table('wedding_rsvps')->where('id', '=', (int) $id)->where('wedding_id', '=', $wedding->id)->first();
        if ($rsvp) { DB::table('wedding_rsvps')->where('id', '=', (int) $id)->where('wedding_id', '=', $wedding->id)->delete(); }
        return Redirect::back()->with('admin_status', 'RSVP berhasil dihapus.');
    }
}
