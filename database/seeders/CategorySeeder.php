<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory(3)->create()
        Category::create([
            'name' => 'Programming',
            'slug' => 'web-programming',
            'color' => 'green'
        ]);

        Category::create([
            'name' => 'UI/UX',
            'slug' => 'ui-ux',
            'color' => 'red'
        ]);

        Category::create([
            'name' => 'Cyber Scurity',
            'slug' => 'cyber-scurity',
            'color' => 'blue'
        ]);

        Category::create([
            'name' => 'Data Analisy',
            'slug' => 'data-analisy',
            'color' => 'yellow'
        ]);
    }
}
