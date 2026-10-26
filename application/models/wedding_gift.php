<?php

defined('DS') or exit('No direct access.');

class Wedding_Gift extends Facile
{
    public static $fillable = [
        'wedding_id', 'provider', 'account_name', 'account_number', 'sort_order', 'is_visible',
    ];

    public static $casts = [
        'wedding_id' => 'integer',
        'sort_order' => 'integer',
        'is_visible' => 'boolean',
    ];

    public static $hidden = [
        'account_number',
    ];

    public function wedding()
    {
        return $this->belongs_to('Wedding');
    }
}
