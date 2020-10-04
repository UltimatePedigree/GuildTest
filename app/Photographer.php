<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photographer extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'bio',
        'profile_picture'
    ];

}
