<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoVehiculo extends Model
{
    use HasFactory;

    protected $table = 'vehicle_images';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'vehicle_id',
        'image',
        'description',
        'created_at',
        'updated_at',
    ];

    public function vehiculo()
    {
        return $this->belongsTo(
            'App\Models\Vehiculo',
            'vehicle_id',
            'id'
        )
            ->withDefault();
    }
}
