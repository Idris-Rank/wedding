<?php

defined('DS') or exit('No direct access.');

class Wedding_Gallery extends Facile
{
    public static $fillable = [
        'wedding_id', 'image_path', 'alt_text', 'caption', 'sort_order', 'is_visible',
    ];

    public static $casts = [
        'wedding_id' => 'integer',
        'sort_order' => 'integer',
        'is_visible' => 'boolean',
    ];

    public function wedding()
    {
        return $this->belongs_to('Wedding');
    }
}
