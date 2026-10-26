<?php

defined('DS') or exit('No direct access.');

class Wedding_Rsvp extends Facile
{
    public static $fillable = [
        'wedding_id', 'guest_name', 'phone', 'attendance', 'guest_count', 'message',
    ];

    public static $casts = [
        'wedding_id' => 'integer',
        'guest_count' => 'integer',
    ];

    public function wedding()
    {
        return $this->belongs_to('Wedding');
    }
}
