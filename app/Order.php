<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'language', 'issues', 'status', 'total'
    ];

    /**
     * Attributes.
     *
     * @var array
     */
    protected $appends = [
        'product'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function getProductAttribute()
    {
        if ($this->language == 'tr')
            return 'Arka Kapı Dergi';
        return 'Arka Kapı Magazine';
    }

    /**
     * Accessor for issues.
     *
     * @param string $value
     * @return array
     */
    public function getIssuesAttribute($value)
    {
        return json_decode($value, true);
    }

    /**
     * Mutator for issues.
     *
     * @param array $value
     */
    public function setIssuesAttribute($value)
    {
        $value = array_map(function ($val) {
            return (int)$val;
        }, $value);

        $this->attributes['issues'] = json_encode($value);
    }
}
