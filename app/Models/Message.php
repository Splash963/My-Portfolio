<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $table = 'messages';

    protected $fillable = [
        'user_name',
        'email',
        'subject',
        'message',
        'status',
    ];
}
