<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VirtualHotspot extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'virtual_room_id',
        'data_room',
        'data_target_room',
        'data_yaw',
        'data_pitch',
    ];

    public function virtualRoom()
    {
        return $this->belongsTo(virtualRoom::class);
    }
}
