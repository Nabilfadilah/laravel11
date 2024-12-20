<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

use function Pest\Laravel\post;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['name' => 'Nabil Nesta', 'title' => 'About']);
});

// buat route baru ke halamanblog yang ad judul, list
// ontact, email, password
Route::get('/posts', function () {

    // katau tidak ada, maka tampilkan semua datanya
    return view('posts', ['title' => 'Blog', 'posts' => Post::filter(request([
        'search',
        'category',
        'author'
    ]))->latest()->paginate(10)->withQueryString()]);
});

// pakai slug untuk membandinkan 
// Route::get('/posts/{slug}', function ($slug) {
//     $post = Post::find($slug);
//     return view('post', ['title' => 'Single Post', 'post' => $post]);
// });

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

// untuk melihat post dari satu user apa aja
Route::get('/authors/{user:username}', function (User $user) {
    // ----------------------
    // lazy eager loading
    // $posts = $user->posts->load('category', 'author');
    // return view('posts', [
    //     'title' => count($posts) . ' Articles By ' . $user->name,
    //     'posts' => $posts
    // ]);
    // -----------------------

    return view('posts', [
        'title' => count($user->posts) . ' Articles By ' . $user->name,
        'posts' =>
        $user->posts
    ]);
});

// untuk melihat post berdasarkan category
Route::get('/categories/{category:slug}', function (Category $category) {
    // --------------------
    // lazy eager loading
    // $posts = $category->posts->load('category', 'author');
    // return view('posts', [
    //     'title' => 'Articles In : ' . $category->name,
    //     'posts' => $posts
    // ]);
    // --------------------

    return view('posts', [
        'title' => 'Articles In : ' . $category->name,
        'posts' => $category->posts
    ]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => "Contact"]);
});
