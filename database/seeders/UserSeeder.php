<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserPublic;
use App\Models\Annonces;
use App\Models\photos;
use Illuminate\Support\Collection;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $users = User::factory()
                ->hasUser_Public(1, 
                    function (array $attributes, User $user) {
                    return ['name_public' => $user->name, 'email_public' => $user->email];
                    })
                ->count(1)->create();
         

        foreach($users as $user)
        {
           $this->seedAnnonces($user);
         //  $this->seedUserPublic($user);
        }    

     
        
    }

    // function seeding user_public for each user
    public function seedUserPublic($user)
    {
        UserPublic::factory()
        ->for($user)
        ->state('user_public' )
        ->create();
    }   

    // function seeding annonces for each user randomly between 1 and 5
    private function seedAnnonces(User $user)
    {
        $Annonces = Annonces::factory()
                        ->count(rand(1,5)) 
                        ->for($user)
                        ->create();

        
        
        
        foreach ($Annonces as $Annonce)
        {
            
            $this->seedPhotos($Annonce, $user);
        }

        
    }

    // function seeding photos for each annonce randomly between 1 and 12
    private function seedPhotos(Annonces $Annonce, User $user)
    {
        photos::factory()
            ->count(rand(1,12))
            ->for($Annonce)
            ->state(['user_id' => $user->id,
                    'bien_id' => $Annonce->bien_id,])
            ->create();
    }
}
