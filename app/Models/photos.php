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
        'photos',
    ];

    public function annonces ()
    {
        return $this->belongsTo(Annonces::class, 'annonce_id');
    }

    public function bien()
    {
        return $this->belongsTo(Appartements::class, 'bien_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    
}
