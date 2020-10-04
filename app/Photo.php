<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'gallery_id',
        'title',
        'description',
        'img',
        'date',
        'featured'
    ];

    protected $casts = [
        'gallery_id' => 'integer',
        'featured' => 'boolean'
    ];
}