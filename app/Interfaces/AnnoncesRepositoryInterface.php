<?php

namespace App\Interfaces;

Interface AnnoncesRepositoryInterface
{
    public function getAllAnnonces();
    public function getAnnoncesByParams($params);
    public function getAnnonceById($id);
    public function createAnnonce($data);
    public function updateAnnonce($id, $data);
    public function deleteAnnonce($id);

}