<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // data isi manual
        // User::create([
        //     'name' => 'Nabil Fadilah',
        //     'username' => 'abil',
        //     'email' => 'nabilfadilah.gmail',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10)
        // ]);

        // kalau ingin memasukan data user yang di recycke
        // $nabil = User::create([
        //     'name' => 'Nabil Fadilah',
        //     'username' => 'abil',
        //     'email' => 'nabilfadilah.gmail',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10)
        // ]);

        // Category::create([
        //     'name' => 'Web Design',
        //     'slug' => 'web-design'
        // ]);

        // Post::create([
        //     'title' => 'Judul Artikel 1',
        //     'author_id' => 1,
        //     'category_id' => 1,
        //     'slug' => 'judul-artikel-1',
        //     'body' => 'Non sapiente voluptas itaque nemo nemo. Aliquid quia 
        //     dolorem omnis ullam. Eos ut quisquam repudianda.'
        // ]);

        // panggil seeder nya:
        $this->call([CategorySeeder::class, UserSeeder::class]);

        // siding database
        Post::factory(50)->recycle([
            // $nabil, // ikut sertakan variabelnya 
            // Recycle, dengan cara dipisahkan class nya
            Category::all(),
            User::all()
        ])->create();
    }
}
