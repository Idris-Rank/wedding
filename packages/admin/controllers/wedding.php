<?php
defined('DS') or exit('No direct access.');

class Admin_Wedding_Controller extends Controller
{
    public $restful = true;
    public function get_index() { $wedding = Wedding::where('is_active', '=', 1)->order_by('id')->first(); return View::make('admin::wedding.index', ['wedding' => $wedding]); }
    public function post_update()
    {
        $wedding = Wedding::where('is_active', '=', 1)->order_by('id')->first();
        $validation = Validator::make(Input::all(), ['groom_name' => 'required|max:150', 'bride_name' => 'required|max:150', 'groom_parents' => 'nullable|max:255', 'bride_parents' => 'nullable|max:255', 'quote' => 'nullable|max:2000', 'quote_source' => 'nullable|max:100', 'hero_image' => 'nullable|max:255', 'audio_path' => 'nullable|max:255', 'whatsapp' => 'nullable|max:30']);
        if ($validation->fails()) { return Redirect::back()->with_input()->with_errors($validation); }
        DB::table('weddings')->where('id', '=', $wedding->id)->update($validation->validated());
        return Redirect::back()->with('admin_status', 'Data wedding berhasil diperbarui.');
    }
}
