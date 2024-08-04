<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    use Sluggable;
    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug'  => [
                'source'    => 'kategori'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function beritas()
    {
        return $this->hasMany(Berita::class);
    }
}
