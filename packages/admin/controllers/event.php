<?php
defined('DS') or exit('No direct access.');

class Admin_Event_Controller extends Controller
{
    public $restful = true;
    protected function wedding() { return Wedding::where('is_active', '=', 1)->order_by('id')->first(); }
    public function get_index() { $wedding = $this->wedding(); return View::make('admin::events.index', ['wedding' => $wedding, 'events' => DB::table('wedding_events')->where('wedding_id', '=', $wedding->id)->order_by('sort_order')->get()]); }
    public function get_create() { return View::make('admin::events.create', ['wedding' => $this->wedding()]); }
    public function post_store()
    {
        $wedding = $this->wedding();
        $validation = Validator::make(Input::all(), ['event_type' => 'required|max:30', 'title' => 'required|max:100', 'event_date' => 'required|date', 'start_time' => 'required', 'end_time' => 'nullable', 'venue' => 'required|max:180', 'address' => 'nullable|max:255', 'maps_url' => 'nullable|url|max:500']);
        if ($validation->fails()) { return Redirect::back()->with_input()->with_errors($validation); }
        if (Input::get('end_time') && Input::get('end_time') <= Input::get('start_time')) { return Redirect::back()->with_input()->with('error', 'Waktu selesai harus setelah waktu mulai.'); }
        $data = $validation->validated(); $data['wedding_id'] = $wedding->id; $data['sort_order'] = (int) DB::table('wedding_events')->where('wedding_id', '=', $wedding->id)->count() + 1;
        DB::table('wedding_events')->insert($data);
        return Redirect::to('admin/events')->with('admin_status', 'Acara berhasil ditambahkan.');
    }
    public function get_edit($id)
    {
        $wedding = $this->wedding();
        $event = DB::table('wedding_events')->where('id', '=', (int) $id)->where('wedding_id', '=', $wedding->id)->first();
        if (!$event) { return Redirect::to('admin/events'); }
        return View::make('admin::events.edit', ['wedding' => $wedding, 'event' => $event]);
    }
    public function post_update($id)
    {
        $wedding = $this->wedding();
        $event = DB::table('wedding_events')->where('id', '=', (int) $id)->where('wedding_id', '=', $wedding->id)->first();
        if (!$event) { return Redirect::to('admin/events'); }
        $validation = Validator::make(Input::all(), ['event_type' => 'required|max:30', 'title' => 'required|max:100', 'event_date' => 'required|date', 'start_time' => 'required', 'end_time' => 'nullable', 'venue' => 'required|max:180', 'address' => 'nullable|max:255', 'maps_url' => 'nullable|url|max:500']);
        if ($validation->fails()) { return Redirect::back()->with_input()->with_errors($validation); }
        if (Input::get('end_time') && Input::get('end_time') <= Input::get('start_time')) { return Redirect::back()->with_input()->with('error', 'Waktu selesai harus setelah waktu mulai.'); }
        DB::table('wedding_events')->where('id', '=', (int) $id)->where('wedding_id', '=', $wedding->id)->update($validation->validated());
        return Redirect::to('admin/events')->with('admin_status', 'Acara berhasil diperbarui.');
    }
    public function post_delete($id) { $wedding = $this->wedding(); $event = DB::table('wedding_events')->where('id', '=', (int) $id)->where('wedding_id', '=', $wedding->id)->first(); if ($event) { DB::table('wedding_events')->where('id', '=', (int) $id)->where('wedding_id', '=', $wedding->id)->delete(); } return Redirect::back()->with('admin_status', 'Acara berhasil dihapus.'); }
}
