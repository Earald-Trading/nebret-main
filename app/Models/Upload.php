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
        'price',
        'latitude',
        'longitude',
        'subcity',
        'wereda',
        'houseno',
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
}
