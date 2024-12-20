<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    // relasi category punya banyak post
    public function posts(): HasMany
    {
        // hasmany ambil dari class post
        return $this->hasMany(Post::class);
    }
}
