<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'admin_id',
        'images',
        'youtube_id',
        'logline',
        'type',
        'beds',
        'baths',
        'footprint',
        'lot',
        'year',
        'price',
        'latitude',
        'longitude',
        'subcity',
        'wereda',
        'houseno',
        'featured',
        'openhouse',
        'newconstruction',
        'foreclosure'
    ];

    /**
     * Get the user related to this data
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the admin who posted the listing
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    /**
     * Scope a query to join and include subcity
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    function scopeSubcity($query)
    {
        return $query->join('states', 'uploads.subcity', '=', 'states.id');
    }
}
