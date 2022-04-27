<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class photos extends Model
{
    use HasFactory;

    protected $table = 'photos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'biens_id',
        'annonces_id',
        'photos',
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
