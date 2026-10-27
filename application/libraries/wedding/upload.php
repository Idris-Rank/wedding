<?php
defined('DS') or exit('No direct access.');

class Wedding_Upload
{
    public static function store($file, $directory)
    {
        if (!isset($file['tmp_name'], $file['name']) || !is_uploaded_file($file['tmp_name'])) { throw new Exception('File upload tidak valid.'); }
        if (@getimagesize($file['tmp_name']) && ($dimensions = @getimagesize($file['tmp_name'])) && ($dimensions[0] > 10000 || $dimensions[1] > 10000)) { throw new Exception('Dimensi gambar terlalu besar. Maksimal 10.000px pada salah satu sisi.'); }
        $target = path('assets').str_replace('/', DS, $directory);
        if (!is_dir($target) && !@mkdir($target, 0755, true)) { throw new Exception('Direktori upload tidak dapat dibuat.'); }
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $filename = sha1(uniqid('', true).mt_rand()).'.'.$extension;
        $upload = new \System\Foundation\Http\Upload($file['tmp_name'], $file['name'], $file['type'], $file['size'], $file['error']);
        $upload->move($target, $filename);
        return $directory.'/'.$filename;
    }

    public static function remove($asset_path, $directories, $extensions)
    {
        foreach ((array) $directories as $directory) {
            if (strpos((string) $asset_path, $directory.'/') !== 0) { continue; }
            $filename = basename($asset_path);
            $pattern = '/^[a-f0-9]{40}\.('.implode('|', (array) $extensions).')$/i';
            if (!preg_match($pattern, $filename)) { return; }
            $path = path('assets').str_replace('/', DS, $asset_path);
            if (is_file($path)) { @unlink($path); }
            return;
        }
    }
}
