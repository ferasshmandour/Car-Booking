<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Storage::disk('public')->put('images/car1.jpeg', file_get_contents('public/assets/car1.jpeg'));
        Storage::disk('public')->put('images/car2.jpeg', file_get_contents('public/assets/car2.jpeg'));
        Storage::disk('public')->put('images/car3.jpeg', file_get_contents('public/assets/car3.jpeg'));

        Category::create([
            'type' => 'Sport',
            'photo' => 'images/car2.jpeg',
        ]);

        Category::create([
            'type' => 'Sedan',
            'photo' => 'images/car3.jpeg',
        ]);

        Category::create([
            'type' => 'Four wheel car',
            'photo' => 'images/car1.jpeg',
        ]);
    }
}
