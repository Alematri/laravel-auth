<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Str;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //FRONT-END BACK-END DESIGN UX UI
        $data = ['Front-end', 'Back-end', 'Design', 'UX', 'UI'];

        foreach($data as $type){
            $new_type = new Type();
            $new_type -> name = $type;
            $new_type -> slug = Str::slug($type, '-');
            $new_type -> save();
        }
    }
}
