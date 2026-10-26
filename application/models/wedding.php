<?php

defined('DS') or exit('No direct access.');

class Wedding extends Facile
{
    public static $table = 'weddings';

    public static $fillable = [
        'slug', 'groom_name', 'bride_name', 'groom_parents', 'bride_parents',
        'quote', 'quote_source', 'hero_image', 'audio_path', 'whatsapp', 'is_active',
    ];

    public static $casts = [
        'is_active' => 'boolean',
    ];

    public function events()
    {
        return $this->has_many('Wedding_Event');
    }

    public function galleries()
    {
        return $this->has_many('Wedding_Gallery');
    }

    public function rsvps()
    {
        return $this->has_many('Wedding_Rsvp');
    }

    public function gifts()
    {
        return $this->has_many('Wedding_Gift');
    }
}
