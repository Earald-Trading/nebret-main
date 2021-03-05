<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
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
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'is_admin',
        'is_agent'
    ];

    /**
     * Is this user an admin
     *
     * @param string value
     * @return bool
     */
    public function getIsAdminAttribute()
    {
        return $this->role == 'admin';
    }

    /**
     * Set this user as admin
     *
     * @param bool $value
     * @return void
     */
    public function setIsAdminAttribute()
    {
        $this->role = 'admin';
    }

    /**
     * Is this user an agent
     *
     * @param string value
     * @return bool
     */
    public function getIsAgentAttribute()
    {
        return $this->is_admin || $this->role == 'agent';
    }

    /**
     * Set this user as agent
     *
     * @param bool $value
     * @return void
     */
    public function setIsAgentAttribute()
    {
        $this->role = 'agent';
    }

    /**
     * Get the likes of the user
     */
    public function likes()
    {
        return $this->hasMany(Like::class, 'user_id');
    }

    public function uploadRequests()
    {
        $this->hasMany(UploadRequest::class, 'user_id');
    }
}
