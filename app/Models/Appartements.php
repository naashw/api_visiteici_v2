<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appartements extends Model
{
    use HasFactory;

    protected $table = 'biens_appartements';

    /**
     * The attributes that should be hidden for arrays.
     */
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string, boolean>
     */
    protected $fillable = [
        'categories',
        'nom',
        'description',
        'code_postal',
        'ville',
        'adresse',
        'prix',
        'charges_comprises',
        'meublé',
        'surface',
        'nb_pieces',
        'nb_chambres',
        'fibre_optique',
        'balcon',
        'terrasse',
        'terasse_surface',
        'cave',
        'jardin',
        'jardin_surface',
        'parking',
        'garage',
        'ascenseur',
        'classe_energie',
        'GES',

    ];

    public function annonces()
    {
        return $this->belongsTo(Annonces::class);
    }

    public function photos ()
    {
        return $this->hasOne(Photos::class);
    }
}
