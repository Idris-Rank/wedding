<?php
defined('DS') or exit('No direct access.');

class Admin_Wedding_Controller extends Controller
{
    public $restful = true;
    public function get_index() { $wedding = Wedding::where('is_active', '=', 1)->order_by('id')->first(); return View::make('admin::wedding.index', ['wedding' => $wedding]); }
    public function post_update()
    {
        $wedding = Wedding::where('is_active', '=', 1)->order_by('id')->first();
        $validation = Validator::make(Input::all(), ['groom_name' => 'required|max:150', 'bride_name' => 'required|max:150', 'groom_parents' => 'nullable|max:255', 'bride_parents' => 'nullable|max:255', 'quote' => 'nullable|max:2000', 'quote_source' => 'nullable|max:100', 'hero_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240', 'bride_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240', 'groom_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240', 'audio_path' => 'nullable|mimes:mp3,wav,ogg|max:10240', 'whatsapp' => 'nullable|max:30']);
        if ($validation->fails()) { return Redirect::back()->with_input()->with_errors($validation); }
        $data = $validation->validated(); unset($data['hero_image'], $data['bride_image'], $data['groom_image'], $data['audio_path']); $new_files = [];
        try {
            if (Input::has_file('hero_image')) { $new_files['hero_image'] = Wedding_Upload::store(Input::file('hero_image'), 'images/wedding'); $data['hero_image'] = $new_files['hero_image']; }
            if (Input::has_file('bride_image')) { $new_files['bride_image'] = Wedding_Upload::store(Input::file('bride_image'), 'images/wedding'); $data['bride_image'] = $new_files['bride_image']; }
            if (Input::has_file('groom_image')) { $new_files['groom_image'] = Wedding_Upload::store(Input::file('groom_image'), 'images/wedding'); $data['groom_image'] = $new_files['groom_image']; }
            if (Input::has_file('audio_path')) { $new_files['audio_path'] = Wedding_Upload::store(Input::file('audio_path'), 'audio/wedding'); $data['audio_path'] = $new_files['audio_path']; }
            DB::table('weddings')->where('id', '=', $wedding->id)->update($data);
        } catch (Exception $exception) {
            foreach ($new_files as $path) { Wedding_Upload::remove($path, ['images/wedding', 'audio/wedding'], ['jpg', 'jpeg', 'png', 'webp', 'mp3', 'wav', 'ogg']); }
            throw $exception;
        }
        if (isset($new_files['hero_image'])) { Wedding_Upload::remove($wedding->hero_image, ['images/wedding', 'audio/wedding'], ['jpg', 'jpeg', 'png', 'webp', 'mp3', 'wav', 'ogg']); }
        if (isset($new_files['bride_image'])) { Wedding_Upload::remove($wedding->bride_image, ['images/wedding'], ['jpg', 'jpeg', 'png', 'webp']); }
        if (isset($new_files['groom_image'])) { Wedding_Upload::remove($wedding->groom_image, ['images/wedding'], ['jpg', 'jpeg', 'png', 'webp']); }
        if (isset($new_files['audio_path'])) { Wedding_Upload::remove($wedding->audio_path, ['images/wedding', 'audio/wedding'], ['jpg', 'jpeg', 'png', 'webp', 'mp3', 'wav', 'ogg']); }
        return Redirect::back()->with('admin_status', 'Data wedding berhasil diperbarui.');
    }
    public function post_delete_media($field)
    {
        $wedding = Wedding::where('is_active', '=', 1)->order_by('id')->first();
        if (!in_array($field, ['hero_image', 'bride_image', 'groom_image'])) { return Redirect::back(); }
        $path = $wedding->{$field};
        DB::table('weddings')->where('id', '=', $wedding->id)->update([$field => null]);
        Wedding_Upload::remove($path, ['images/wedding'], ['jpg', 'jpeg', 'png', 'webp']);
        return Redirect::back()->with('admin_status', 'Media berhasil dihapus.');
    }
}
