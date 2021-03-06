<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonces extends Model
{
    use HasFactory;

    /**
     * The attributes that should be hidden for arrays.
     */
    protected $hidden = [
        'updated_at',
        'biens_id',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'biens_id',
        'categories',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function appartement()
    {
        return $this->belongsTo(Appartements::class,'biens_id');
    }

    public function photos()
    {
        return $this->hasMany(Photos::class);
    }
    
}
