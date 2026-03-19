<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Like;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
{
    $attempts = 0;
    $created = 0;
    while ($created < 50 && $attempts < 200) {
        try {
            Like::factory()->create();
            $created++;
        } catch (\Exception $e) {
            // doublon ignoré
        }
        $attempts++;
    }
}
}
