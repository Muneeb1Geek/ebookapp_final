<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostLikes extends Model
{
    use HasFactory;

    protected $table = "posts_likes";
    protected $fillable = [
        "post_id",
        "user_id",
        "like",
    ];
}
