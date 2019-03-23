<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'action', 'ip_address'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
