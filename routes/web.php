<?php

use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['name' => 'Nabil Nesta', 'title' => 'About']);
});

// buat route baru ke halamanblog yang ad judul, list
// ontact, email, password
Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'posts' => Post::all()]);
});

// pakai slug untuk membandinkan 
// Route::get('/posts/{slug}', function ($slug) {

//     $post = Post::find($slug);

//     return view('post', ['title' => 'Single Post', 'post' => $post]);
// });

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => "Contact"]);
});
