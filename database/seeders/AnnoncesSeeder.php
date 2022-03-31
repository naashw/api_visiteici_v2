<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Annonces;
use App\Models\Appartements;
use App\Models\User;

class AnnoncesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* Annonces::factory()
            ->has(Appartements::factory()->count(1), 'id_bien')
            ->create(); */
    }
}
