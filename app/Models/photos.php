<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    use HasFactory;

    protected $table = 'photos';

    /**
     * The attributes that should be hidden for arrays.
     */
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'user_id',
        'biens_id',
        'annonces_id',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'biens_id',
        'annonces_id',
        'url',
    ];

    public function annonces ()
    {
        return $this->belongsTo(Annonces::class, 'annonces_id');
    }

    public function biens()
    {
        return $this->belongsTo(Appartements::class, 'biens_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    
}
