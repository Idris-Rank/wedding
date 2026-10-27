<?php
defined('DS') or exit('No direct access.');

class Admin_Gallery_Controller extends Controller
{
    public $restful = true;
    protected function wedding()
    {
        return Wedding::where('is_active', '=', 1)->order_by('id')->first();
    }
    public function get_index()
    {
        $wedding = $this->wedding();
        return View::make('admin::galleries.index', ['wedding' => $wedding, 'galleries' => DB::table('wedding_galleries')->where('wedding_id', '=', $wedding->id)->order_by('sort_order')->get()]);
    }
    public function get_create()
    {
        return View::make('admin::galleries.create', ['wedding' => $this->wedding()]);
    }
    public function post_store()
    {
        $wedding = $this->wedding();
        $validation = Validator::make(Input::all(), ['image_path' => 'required|image|mimes:jpg,jpeg,png,webp|max:10240', 'alt_text' => 'required|max:255', 'caption' => 'nullable|max:255', 'sort_order' => 'nullable|integer|min:1']);
        if ($validation->fails()) {
            return Redirect::back()->with_input()->with_errors($validation);
        }
        $data = $validation->validated();
        $new_image = Wedding_Upload::store(Input::file('image_path'), 'images/gallery');
        $data['image_path'] = $new_image;
        $data['wedding_id'] = $wedding->id;
        $data['sort_order'] = isset($data['sort_order']) ? (int) $data['sort_order'] : (int) DB::table('wedding_galleries')->where('wedding_id', '=', $wedding->id)->count() + 1;
        $data['is_visible'] = true;
        try {
            DB::table('wedding_galleries')->insert($data);
        } catch (Exception $exception) {
            Wedding_Upload::remove($new_image, ['images/gallery'], ['jpg', 'jpeg', 'png', 'webp']);
            throw $exception;
        }
        return Redirect::to('admin/galleries')->with('admin_status', 'Galeri berhasil ditambahkan.');
    }
    public function get_edit($id)
    {
        $wedding = $this->wedding();
        $gallery = DB::table('wedding_galleries')->where('id', '=', (int) $id)->where('wedding_id', '=', $wedding->id)->first();
        if (!$gallery) {
            return Redirect::to('admin/galleries');
        }
        return View::make('admin::galleries.edit', ['wedding' => $wedding, 'gallery' => $gallery]);
    }
    public function post_update($id)
    {
        $wedding = $this->wedding();
        $gallery = DB::table('wedding_galleries')->where('id', '=', (int) $id)->where('wedding_id', '=', $wedding->id)->first();
        if (!$gallery) {
            return Redirect::to('admin/galleries');
        }
        $validation = Validator::make(Input::all(), ['image_path' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240', 'alt_text' => 'required|max:255', 'caption' => 'nullable|max:255', 'sort_order' => 'nullable|integer|min:1']);
        if ($validation->fails()) {
            return Redirect::back()->with_input()->with_errors($validation);
        }
        $data = $validation->validated();
        unset($data['image_path']);
        $new_image = null;
        if (Input::has_file('image_path')) {
            $new_image = Wedding_Upload::store(Input::file('image_path'), 'images/gallery');
            $data['image_path'] = $new_image;
        }
        try {
            DB::table('wedding_galleries')->where('id', '=', (int) $id)->where('wedding_id', '=', $wedding->id)->update($data);
        } catch (Exception $exception) {
            if ($new_image) { Wedding_Upload::remove($new_image, ['images/gallery'], ['jpg', 'jpeg', 'png', 'webp']); }
            throw $exception;
        }
        if ($new_image) { Wedding_Upload::remove($gallery->image_path, ['images/gallery'], ['jpg', 'jpeg', 'png', 'webp']); }
        return Redirect::to('admin/galleries')->with('admin_status', 'Galeri berhasil diperbarui.');
    }
    public function post_delete($id)
    {
        $wedding = $this->wedding();
        $gallery = DB::table('wedding_galleries')->where('id', '=', (int) $id)->where('wedding_id', '=', $wedding->id)->first();
        if ($gallery) {
            DB::table('wedding_galleries')->where('id', '=', (int) $id)->where('wedding_id', '=', $wedding->id)->delete();
            Wedding_Upload::remove($gallery->image_path, ['images/gallery'], ['jpg', 'jpeg', 'png', 'webp']);
        }
        return Redirect::back()->with('admin_status', 'Galeri berhasil dihapus.');
    }
}
