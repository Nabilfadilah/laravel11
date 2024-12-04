<?php

namespace App\Models;

// use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model // tabel post
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'slug', 'body'];

    // eager loading by Default = INI PALING BENER!!!!!!!!, paling mudah, agar query tidak banyak!!!
    protected $with = ['author', 'category'];

    // relasi
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // relasi model post menghubungkan class category model
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // untuk model scope filter pencarian
    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when(
            $filters['search'] ?? false,
            fn($query, $search) =>
            $query->where('title', 'like', '%' . $search . '%')
        );

        $query->when(
            $filters['category'] ?? false,
            fn($query, $category) =>
            $query->whereHas('category', fn($query) => $query->where('slug', $category))
        );

        $query->when(
            $filters['author'] ?? false,
            fn($query, $author) =>
            $query->whereHas('author', fn($query) => $query->where('username', $author))
        );

        // if ($filters['search'] ?? false) {
        //     $query->where('title', 'like', '%' . request('search') . '%');
        // }

        // if (!empty($filters['search'])) {
        //     $query->where('title', 'like', '%' . $filters['search'] . '%');
        // }
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
