<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VirtualRoom extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'virtual_tour_id',
        'room_name',
        'image',
    ];

    public function virtualHotspot()
    {
        return $this->hasMany(virtualHotspot::class);
    }

    public function virtualTour()
    {
        return $this->belongsTo(virtualTour::class);
    }
}
