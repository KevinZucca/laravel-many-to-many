<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['HTML', 'CSS', 'Bootstrap', 'SASS', 'Vue', 'MySQL', 'Laravel'];

        foreach ($technologies as $newTechnology) {
            $technology = new Technology();

            $technology->name = $newTechnology;
            $technology->slug =  Str::slug($technology->name, '-');

            $technology->save();
        }
    }
}
