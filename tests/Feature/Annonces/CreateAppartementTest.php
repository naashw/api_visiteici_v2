<?php

namespace Tests\Feature\Annonces;


use App\Models\Appartements;
use App\Models\User;
use App\Repositories\AppartementsRepository;
use Illuminate\Http\File;
use Tests\TestCase;
use Illuminate\Support\Facades\Event;

class CreateAppartementTest extends TestCase
{

    
    public function test_can_create_appartement_annonce()
    {
              

        $user = User::factory()->create();
  
        $appartements = Appartements::factory()->make();
        $photos = [new File('C:/Users/Naashw/Downloads/pexels-max-vakhtbovych-5997993.jpg') , new File('C:/Users/Naashw/Downloads/pexels-max-vakhtbovych-5997993.jpg')];

        $request = [
            'categories' => 1,
            'nom' => $appartements->nom,
            'description' => $appartements->description,
            'code_postal' => $appartements->code_postal,
            'ville' => $appartements->ville,
            'adresse' => $appartements->adresse,
            'prix' => $appartements->prix,
            'charges_comprises' => $appartements->charges_comprises,
            'meublé' => $appartements->meublé,
            'surface' => $appartements->surface,
            'nb_pieces' => $appartements->nb_pieces,
            'nb_chambres' => $appartements->nb_chambres,
            'fibre_optique' => $appartements->fibre_optique,
            'balcon' => $appartements->balcon,
            'terrasse' => $appartements->terrasse,
            'terrasse_surface' => 65,
            'cave' => $appartements->cave,
            'jardin' => $appartements->jardin,
            'jardin_surface' => $appartements->jardin_surface,
            'parking' => $appartements->parking,
            'garage' => $appartements->garage,
            'ascenseur' => $appartements->ascenseur,
            'classe_energie' => $appartements->classe_energie,
            'GES' => $appartements->GES,
            'photos' => $photos,
        ];

        $response = $this->actingAs($user)
        ->post('/api/appartements', $request);

        $response->assertOk();

        $this->assertDatabaseHas('biens_appartements', [
            'nom' => $appartements->nom,
            'description' => $appartements->description,
        ]);
    }

    public function test_can_not_create_appartement_annonce()
    {
        

        $user = User::factory()->create();
  
        $appartements = Appartements::factory()->make();
        $photos = [new File('C:/Users/Naashw/Downloads/pexels-max-vakhtbovych-5997993.jpg') , new File('C:/Users/Naashw/Downloads/pexels-max-vakhtbovych-5997993.jpg')];

        $request = [
            'categories' => "dza",
            'nom' => $appartements->nom,
            'description' => $appartements->description,
            'code_postal' => $appartements->code_postal,
            'ville' => $appartements->ville,
            'adresse' => $appartements->adresse,
            'prix' => $appartements->prix,
            'charges_comprises' => $appartements->charges_comprises,
            'meublé' => $appartements->meublé,
            'surface' => $appartements->surface,
            'nb_pieces' => $appartements->nb_pieces,
            'nb_chambres' => $appartements->nb_chambres,
            'fibre_optique' => $appartements->fibre_optique,
            'balcon' => $appartements->balcon,
            'terrasse' => $appartements->terrasse,
            'terrasse_surface' => 65,
            'cave' => $appartements->cave,
            'jardin' => $appartements->jardin,
            'jardin_surface' => $appartements->jardin_surface,
            'parking' => $appartements->parking,
            'garage' => $appartements->garage,
            'ascenseur' => $appartements->ascenseur,
            'classe_energie' => $appartements->classe_energie,
            'GES' => $appartements->GES,
            'photos' => $photos,
        ];

        $response = $this->actingAs($user)
        ->post('/api/appartements', $request);

        $response->assertInvalid(['categories' => 'Le champ categories doit contenir un nombre.']);

    }
}
