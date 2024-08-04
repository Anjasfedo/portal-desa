<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommentReply extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
