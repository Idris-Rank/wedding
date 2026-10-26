<?php

defined('DS') or exit('No direct access.');

class Wedding_Event extends Facile
{
    public static $fillable = [
        'wedding_id', 'event_type', 'title', 'event_date', 'start_time', 'end_time',
        'venue', 'address', 'maps_url', 'sort_order',
    ];

    public static $casts = [
        'wedding_id' => 'integer',
        'sort_order' => 'integer',
    ];

    public function wedding()
    {
        return $this->belongs_to('Wedding');
    }
}
