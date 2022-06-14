<?php

namespace App\Repositories;

use App\Interfaces\AnnoncesRepositoryInterface;
use App\Models\Annonces;
use App\Models\Appartements;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Support\Facades\DB;

class AnnoncesRepository implements AnnoncesRepositoryInterface
{
    public function getAllAnnonces()
    {
      return Annonces::latest();
    }

    public function getAnnoncesByParams($params): SupportCollection
    {
        $nombresAnnoncesParPage = 25;

        // Récuperer les annonces avec leurs relations enfants appartement et photos.
        $annonces = Annonces::with('appartement', 'photos')->orderByDesc('id');

        //On filtre les annonces en fonction des critères de recherche si il y en à.
        isset($params["text"]) ? $annonces = $annonces->where('biens_appartements.nom', 'like', '%' . $params["text"] . '%') : '';
        isset($params["userId"]) ? $annonces = $annonces->where('annonces.user_id', '=', $params["userId"]) : 'rien trouvé';
        isset($params["page"]) ? $annonces = $annonces->skip($params["page"]*$nombresAnnoncesParPage) : '';
        isset($params["nb"]) ? $annonces = $annonces->take($params["nb"]) : $annonces = $annonces->take($nombresAnnoncesParPage);

        return $annonces->get();
    }

    public function getAnnonceById($id)
    {
      
        $annonces = Annonces::where('id', '=', $id)->with('appartement', 'photos')->first();
        return $annonces;

    }

    public function createAnnonce($data)
    {
        //à compléter
        return null;
    }

    public function updateAnnonce($id, $data)
    {
        //à compléter
        return null;
    }

    public function deleteAnnonce($id)
    {
        //à compléter
        return null;
    }
}
