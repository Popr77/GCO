<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'address',
        'postal_code',
        'city',
        'phone',
        'nif',
        'photo',
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
