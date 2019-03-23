<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'country_id', 'job', 'is_banned', 'is_admin', 'language', 'purchases_tr', 'purchases_en'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Attributes.
     *
     * @var array
     */
    protected $appends = [
        'total_tl', 'total_usd'
    ];

    public function country()
    {
        return $this->belongsTo('App\Country', 'country_id');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    /**
     * Accessor for purchases_tr.
     *
     * @param  string $value
     * @return array
     */
    public function getPurchasesTrAttribute($value)
    {
        return json_decode($value, true);
    }

    /**
     * Mutator for purchases_tr.
     *
     * @param  array $value
     */
    public function setPurchasesTrAttribute($value)
    {
        $value = array_map(function ($val) {
            return (int)$val;
        }, $value);

        $this->attributes['purchases_tr'] = json_encode($value);
    }

    /**
     * Accessor for purchases_en.
     *
     * @param  string $value
     * @return array
     */
    public function getPurchasesEnAttribute($value)
    {
        return json_decode($value, true);
    }

    /**
     * Mutator for purchases_en.
     *
     * @param  array $value
     */
    public function setPurchasesEnAttribute($value)
    {
        $value = array_map(function ($val) {
            return (int)$val;
        }, $value);

        $this->attributes['purchases_en'] = json_encode($value);
    }

    public function getTotalTlAttribute()
    {
        return $this->orders()->where('language', 'tr')->sum('total');
    }

    public function getTotalUsdAttribute()
    {
        return $this->orders()->where('language', 'en')->sum('total');
    }
}
