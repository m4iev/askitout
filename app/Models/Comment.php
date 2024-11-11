<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'commentable_id',
        'commentable_type',
        'user_id',
        'body'
    ];
}
