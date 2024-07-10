<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $table = 'vehicles';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'vehicle_type_id',
        'brand',
        'model',
        'fuel',
        'kilometers',
        'enrollment',
        'year',
        'displacement',
        'power',
        'color',
        'visibility',
        'created_at',
        'updated_at',
    ];

    public function tipo()
    {
        return $this->belongsTo(
            'App\Models\TipoVehiculo',
            'vehicle_type_id',
            'id'
        )
            ->withDefault();
    }
}
