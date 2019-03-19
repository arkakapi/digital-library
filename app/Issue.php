<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Issue extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'title', 'issue', 'price', 'month', 'language', 'preamble', 'content'
    ];

    /**
     * The attributes that are custom model variables.
     *
     * @var array
     */
    protected $appends = [
        'is_purchased'
    ];

    public function getIsPurchasedAttribute()
    {
        if (!Auth::check())
            return false;

        $purchases = Auth::user()->{'purchases_' . $this->language};

        return in_array($this->id, $purchases);
    }
}
