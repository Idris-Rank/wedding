<?php
defined('DS') or exit('No direct access.');

class Admin_Gift_Controller extends Controller
{
    public $restful = true;
    protected function wedding()
    {
        return Wedding::where('is_active', '=', 1)->order_by('id')->first();
    }
    public function get_index()
    {
        $wedding = $this->wedding();
        return View::make('admin::gifts.index', ['wedding' => $wedding, 'gifts' => DB::table('wedding_gifts')->where('wedding_id', '=', $wedding->id)->order_by('sort_order')->get()]);
    }
    public function get_create()
    {
        return View::make('admin::gifts.create', ['wedding' => $this->wedding()]);
    }
    public function post_store()
    {
        $wedding = $this->wedding();
        $validation = Validator::make(Input::all(), ['provider' => 'required|max:50', 'account_name' => 'nullable|max:150', 'account_number' => 'required|max:100']);
        if ($validation->fails()) {
            return Redirect::back()->with_input()->with_errors($validation);
        }
        $data = $validation->validated();
        $data['wedding_id'] = $wedding->id;
        $data['sort_order'] = (int) DB::table('wedding_gifts')->where('wedding_id', '=', $wedding->id)->count() + 1;
        $data['is_visible'] = true;
        DB::table('wedding_gifts')->insert($data);
        return Redirect::to('admin/gifts')->with('admin_status', 'Rekening berhasil ditambahkan.');
    }
    public function get_edit($id)
    {
        $wedding = $this->wedding();
        $gift = DB::table('wedding_gifts')->where('id', '=', (int) $id)->where('wedding_id', '=', $wedding->id)->first();
        if (!$gift) {
            return Redirect::to('admin/gifts');
        }
        return View::make('admin::gifts.edit', ['wedding' => $wedding, 'gift' => $gift]);
    }
    public function post_update($id)
    {
        $wedding = $this->wedding();
        $gift = DB::table('wedding_gifts')->where('id', '=', (int) $id)->where('wedding_id', '=', $wedding->id)->first();
        if (!$gift) { return Redirect::to('admin/gifts'); }
        $validation = Validator::make(Input::all(), ['provider' => 'required|max:50', 'account_name' => 'nullable|max:150', 'account_number' => 'required|max:100']);
        if ($validation->fails()) {
            return Redirect::back()->with_input()->with_errors($validation);
        }
        DB::table('wedding_gifts')->where('id', '=', (int) $id)->where('wedding_id', '=', $wedding->id)->update($validation->validated());
        return Redirect::to('admin/gifts')->with('admin_status', 'Rekening berhasil diperbarui.');
    }
    public function post_delete($id)
    {
        $wedding = $this->wedding();
        $gift = DB::table('wedding_gifts')->where('id', '=', (int) $id)->where('wedding_id', '=', $wedding->id)->first();
        if ($gift) { DB::table('wedding_gifts')->where('id', '=', (int) $id)->where('wedding_id', '=', $wedding->id)->delete(); }
        return Redirect::back()->with('admin_status', 'Rekening berhasil dihapus.');
    }
}
