<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'title', 'language', 'price'
    ];

    /**
     * Attributes.
     *
     * @var array
     */
    protected $appends = [
        'exist_issues'
    ];

    public function getExistIssuesAttribute()
    {
        $issue_numbers = json_decode($this->issues);
        return Issue::where('language', $this->language)->whereIn('issue', $issue_numbers)->get();
    }
}
