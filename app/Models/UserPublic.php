<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UserPublic extends Model
{
    use HasFactory;

    protected $table = 'user_public';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'id',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name_public',
        'email_public',
        'telephone_public',
        'ville_public',
        'nom_societe_public',
        'url_website_societe_public',
        'photo_public',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
