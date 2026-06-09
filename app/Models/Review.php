<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $table = 'reviews';

    protected $fillable = [
        'user_name',
        'email',
        'company_name',
        'position',
        'review',
        'rating',
        'is_approved',
    ];
}
