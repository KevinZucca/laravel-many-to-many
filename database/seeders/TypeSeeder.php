<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Front-end', 'Back-end', 'Full-stack'];
        foreach ($types as $singleType) {
            $newType = new Type();

            $newType->name = $singleType;
            $newType->description = $singleType;
            $newType->slug = Str::slug($newType->name, '-');

            $newType->save();
        }
    }
}
