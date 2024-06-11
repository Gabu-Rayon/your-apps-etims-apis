<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;

    protected $fillable = [
        'insuranceCode',
        'insuranceName',
        'premiumRate',
        'isUsed',
        // TODO: Add a branch id column
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    // TODO: Add a branches function to get the branch that the insurance belongs to
}