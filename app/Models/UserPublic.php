<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UserPublic extends Model
{
    use HasFactory;

    protected $table = 'user_public';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name_public',
        'email_public',
        'telephone_public',
        'ville_public',
        'nom_societe_public',
        'url_website_societe_public',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
