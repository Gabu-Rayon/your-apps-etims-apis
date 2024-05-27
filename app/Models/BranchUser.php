<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class BranchUser extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        "branchUserId",
        "branchUserName",
        "password",
        "address",
        "contactNo",
        "authenticationCode",
        "remark",
        "isUsed"
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
