<?php
defined('DS') or exit('No direct access.');

class Admin_Gallery_Controller extends Controller
{
    public $restful = true;
    protected function wedding() { return Wedding::where('is_active', '=', 1)->order_by('id')->first(); }
    public function get_index() { $wedding = $this->wedding(); return View::make('admin::galleries.index', ['wedding' => $wedding, 'galleries' => DB::table('wedding_galleries')->where('wedding_id', '=', $wedding->id)->order_by('sort_order')->get()]); }
    public function post_store()
    {
        $wedding = $this->wedding(); $validation = Validator::make(Input::all(), ['image_path' => 'required|max:255', 'alt_text' => 'required|max:255', 'caption' => 'nullable|max:255']);
        if ($validation->fails()) { return Redirect::back()->with_input()->with_errors($validation); }
        $data = $validation->validated(); $data['wedding_id'] = $wedding->id; $data['sort_order'] = (int) DB::table('wedding_galleries')->where('wedding_id', '=', $wedding->id)->count() + 1; $data['is_visible'] = true;
        DB::table('wedding_galleries')->insert($data); return Redirect::back()->with('admin_status', 'Galeri berhasil ditambahkan.');
    }
    public function post_delete($id) { $wedding = $this->wedding(); DB::table('wedding_galleries')->where('id', '=', (int) $id)->where('wedding_id', '=', $wedding->id)->delete(); return Redirect::back()->with('admin_status', 'Galeri berhasil dihapus.'); }
}
