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
        'slug', 'title', 'issue', 'price', 'month', 'language', 'content'
    ];

    /**
     * The attributes that are custom model variables.
     *
     * @var array
     */
    protected $appends = [
        'is_purchased'
    ];

    /**
     * Check user-issue relation.
     *
     * @return boolean
     */
    public function getIsPurchasedAttribute()
    {
        if (!Auth::check())
            return false;

        $user = Auth::user();
        $purchases_tr = json_decode($user->purchases_tr, true);
        $purchases_en = json_decode($user->purchases_en, true);

        return in_array($this->id, ${'purchases_' . $this->language});
    }
}
