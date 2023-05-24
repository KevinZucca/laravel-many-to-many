<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $newProject = new Project();

            $newProject->name = $faker->word();
            $newProject->description = $faker->paragraph(2);
            $newProject->github_link = $faker->url();
            $newProject->languages = $faker->randomElement(['Javascript', 'PHP']);
            $newProject->slug = Str::slug($newProject->name, '-');
            $newProject->save();
        }
    }
}
