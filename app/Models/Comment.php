<?php

namespace App\Models;

use App\Models\Berita;
use App\Models\CommentReply;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function berita()
    {
        return $this->belongsTo(Berita::class);
    }

    public function replies()
    {
        return $this->hasMany(CommentReply::class);
    }
}
