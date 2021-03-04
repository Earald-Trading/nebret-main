<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'house_type',
        'phone',
        'purchase_type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
