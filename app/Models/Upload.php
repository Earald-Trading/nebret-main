<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

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
        'description',
        'description_am',
        'comparative_analysis',
        'comparative_analysis_am',
        'house_type',
        'listing_type',
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
        'reduced_price',
        'job_finished'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'beds' => 'int',
        'baths' => 'int',
        'footprint' => 'int',
        'lot' => 'int',
        'year' => 'int',
        'price' => 'int',
        'featured' => 'bool',
        'reduced_price' => 'bool',
        'openhouse' => 'bool',
        'newconstruction' => 'bool',
        'job_finished' => 'bool'
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::deleted(function ($upload) {
            $dir = storage_path("app/{$upload->images}");
            File::deleteDirectory($dir);
        });
    }

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
     * Get the likes of this upload
     */
    public function likes()
    {
        return $this->hasMany(Like::class, 'upload_id');
    }
}
