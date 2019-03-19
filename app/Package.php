<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Package extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'title', 'language', 'price', 'issues'
    ];

    /**
     * Attributes.
     *
     * @var array
     */
    protected $appends = [
        'is_purchased', 'purchased_issues', 'exist_issues'
    ];

    public function getIsPurchasedAttribute()
    {
        if (!Auth::check())
            return false;

        $purchases = Auth::user()->{'purchases_' . $this->language};

        return count(array_intersect($this->issues, $purchases)) == count($this->issues);
    }

    public function getPurchasedIssuesAttribute()
    {
        if (!Auth::check())
            return null;

        $purchases = Auth::user()->{'purchases_' . $this->language};

        return array_values(array_intersect($this->issues, $purchases));
    }

    public function getExistIssuesAttribute()
    {
        return Issue::where('language', $this->language)->whereIn('issue', $this->issues)->get();
    }

    /**
     * Accessor for issues.
     *
     * @param  string $value
     * @return array
     */
    public function getIssuesAttribute($value)
    {
        return json_decode($value, true);
    }

    /**
     * Mutator for issues.
     *
     * @param  string $value
     */
    public function setIssuesAttribute($value)
    {
        $this->attributes['issues'] = json_encode($value);
    }
}
