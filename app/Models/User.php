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
        'email',
        'password',
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

    public function courses() {
        return $this->belongsToMany(Course::class, 'enrollments')
            ->withTimestamps()
            ->withPivot(['payment_status', 'feedback_stars', 'feedback_comment']);
    }

    public function type() {
        return $this->belongsTo(UserType::class, 'user_type_id');
    }

    public function userData(){
        return $this->hasOne(UserData::class, 'user_id');
    }

}
