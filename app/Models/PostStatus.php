<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostStatus extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function beritas()
    {
        return $this->hasMany(Berita::class);
    }
}
