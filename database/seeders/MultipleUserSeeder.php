<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class MultipleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for($i=1;$i<20;$i++){
        $this->call([
            UserSeeder::class,
            
        ]);
       }

    }
}
