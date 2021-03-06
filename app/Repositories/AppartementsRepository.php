<?php

namespace App\Repositories;

use App\Http\Requests\StoreAppartementRequest;
use App\Interfaces\AppartementsRepositoryInterface;
use App\Models\Annonces;
use App\Models\Appartements;
use App\Models\Photos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AppartementsRepository implements AppartementsRepositoryInterface
{

   public function createAppartement(StoreAppartementRequest $request): int
   {
 
      $appartements = Appartements::create([
         'categories' => $request['categories'],
         'nom' => $request['nom'],
         'description' => $request['description'],
         'code_postal' => $request['code_postal'],
         'ville' => $request['ville'],
         'adresse' => $request['adresse'],
         'prix' => $request['prix'],
         'charges_comprises' => $request['charges_comprises'],
         'meublé' => $request['meublé'],
         'surface' => $request['surface'],
         'nb_pieces' => $request['nb_pieces'],
         'nb_chambres' => $request['nb_chambres'],
         'fibre_optique' => $request['fibre_optique'],
         'balcon' => $request['balcon'],
         'terrasse' => $request['terrasse'],
         'terrasse_surface' => $request['terrasse_surface']?? "",
         'cave' => $request['cave'],
         'jardin' => $request['jardin'],
         'jardin_surface' => $request['jardin_surface']?? "",
         'parking' => $request['parking'],
         'garage' => $request['garage'],
         'ascenseur' => $request['ascenseur'],
         'classe_energie' => $request['classe_energie'],
         'GES' => $request['GES'],
     ]);
     
     $annonce = Annonces::create([
         'user_id' => Auth::id(),
         'biens_id' => $appartements->id,
         'biens_type' => $appartements->categories,
     ]);        
     
     $files = $request['photos'];
     
     if($files)
     {
         foreach($files as $file)
         {
             $fileUploaded = Storage::disk('public')->put('photos',$file);
             $url = Storage::url($fileUploaded);
             
             Photos::create([
                 'user_id' => Auth::id(),
                 'biens_id' => $appartements->id,
                 'annonces_id' => $annonce->id,
                 'url' => asset($url),
             ]);
         }
     }
     return $annonce->id;
   }
}
