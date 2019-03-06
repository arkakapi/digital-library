<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'title', 'issue', 'price', 'month', 'language', 'content'
    ];
}
