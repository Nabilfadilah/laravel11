<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model // tabel post
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'slug', 'body'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // kalau mau rubah nama tabel, banyak docs di laravel
    // protected $table = 'blog_post';

    // public static function all()
    // {
    //     return [
    //         [
    //             'id' => '1',
    //             'slug' => 'judul-artikel-1',
    //             'title' => 'Judul Artikel 1',
    //             'author' => 'Nabil Fadilah',
    //             'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit, aspernatur, id odit obcaecati dolor in eaque, repudiandae mollitia animi ipsum magnam quaerat maiores assumenda sequi quos culpa vitae. Veritatis, maxime?'
    //         ],
    //         [
    //             'id' => '2',
    //             'slug' => 'judul-artikel-2',
    //             'title' => 'Judul Artikel 2',
    //             'author' => 'Zakarya Sulaiman',
    //             'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit, aspernatur, id odit obcaecati dolor in eaque, repudiandae mollitia animi ipsum magnam quaerat maiores assumenda sequi quos culpa vitae. Veritatis, maxime?'
    //         ]
    //     ];
    // }

    // public static function find($slug): array
    // {
    //     // return Arr::first(static::all(), function ($post) use ($slug) {
    //     //     return $post['slug'] == $slug;
    //     // });

    //     $post = Arr::first(static::all(), fn($post) => $post['slug'] == $slug);

    //     if (!$post) {
    //         abort(404);
    //     }

    //     return $post;
    // }
}
