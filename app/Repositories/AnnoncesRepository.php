<?php

namespace App\Repositories;

use App\Interfaces\AnnoncesRepositoryInterface;
use App\Models\Annonces;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\JsonResource;
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
        //On récupère les url des photos de la table photos
        $photos = DB::table('photos')->select('biens_id', DB::raw("GROUP_CONCAT(photos) photos "))
            ->groupBy('annonces_id');

        // On récupère toutes les appartements de la table annonces
        $appartements = DB::table('biens_appartements')->select('*', 'id as app_id');

        // On join les appartements et les photos avec la table annonces
        $annonces = DB::table('annonces')
            ->leftJoinSub($appartements, 'biens_appartements', function ($join) {
                $join->on('annonces.biens_id', '=', 'biens_appartements.app_id');
            })
            ->leftjoinSub($photos, 'photos', function ($join) {
                $join->on('annonces.biens_id', '=', 'photos.biens_id');
            })
            ->select('photos.photos', 'biens_appartements.*', 'annonces.*')
            ->orderBy('annonces.id', 'desc');


        //On filtre les annonces en fonction des critères de recherche si il y en à.
        isset($params["text"]) ? $annonces = $annonces->where('biens_appartements.nom', 'like', '%' . $params["text"] . '%') : '';
        isset($params["userId"]) ? $annonces = $annonces->where('annonces.user_id', '=', $params["userId"]) : 'rien trouvé';
        isset($params["page"]) ? $annonces = $annonces->skip($params["page"]*$nombresAnnoncesParPage) : '';
        isset($params["nb"]) ? $annonces = $annonces->take($params["nb"]) : $annonces = $annonces->take($nombresAnnoncesParPage);

        $annonces = $annonces->get();

        //On retourne les annonces à la vue
        return $annonces;
    }

    public function getAnnonceById($id): SupportCollection
    {
        //On récupère les url des photos de la table photos
        $photos = DB::table('photos')->select('biens_id', DB::raw("GROUP_CONCAT(photos) photos "))
            ->groupBy('annonces_id');

        //On récupère tous les annonces de la table annonces
        $annonces = DB::table('annonces')
            ->where('annonces.id', '=', $id)
            ->leftJoin('biens_appartements', 'annonces.biens_id', '=', 'biens_appartements.id')
            ->leftJoinSub($photos, 'photos', function ($join) {
                $join->on('annonces.biens_id', '=', 'photos.biens_id');
            })
            ->get();

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
