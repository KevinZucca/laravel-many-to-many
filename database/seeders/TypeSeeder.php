<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 5; $i++) {
            $newType = new Type();

            $newType->name = $faker->word();
            $newType->description = $faker->paragraph(2);
            $newType->slug = Str::slug($newType->name, '-');

            $newType->save();
        }
    }
}
