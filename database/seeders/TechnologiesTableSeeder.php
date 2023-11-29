<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use Illuminate\Support\Str;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //HTML CSS JAVASCRIPT LARAVEL TYPESCRIPT VUEJS PHP
        $data = ['HTML', 'CSS', 'JavaScript', 'Laravel', 'TypeScript', 'VueJs', 'Php', 'C++'];

        foreach($data as $technology){
            $new_technology = new Technology();
            $new_technology -> name = $technology;
            $new_technology -> slug = Str::slug($technology, '-');
            $new_technology -> save();
        }
    }
}
