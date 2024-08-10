<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MantenimientoVehiculo extends Model
{
    use HasFactory;

    protected $table = 'maintenances';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'author_id',
        'maintenance_type_id',
        'vehicle_id',
        'kilometers',
        'date',
        'amount',
        'description',
        'source',
        'other',
        'created_at',
        'updated_at',
    ];

    public function autor()
    {
        return $this->belongsTo(
            'App\Models\User',
            'author_id',
            'id'
        )
            ->withDefault();
    }

    public function tipo()
    {
        return $this->belongsTo(
            'App\Models\TipoMantenimientoVehiculo',
            'maintenance_type_id',
            'id'
        )
            ->withDefault();
    }

    public function vehiculo()
    {
        return $this->belongsTo(
            'App\Models\Vehiculo',
            'vehicle_id',
            'id'
        )
            ->withDefault();
    }

    public function fotos()
    {
        return $this->hasMany(FotoMantenimientoVehiculo::class, 'maintenance_id', 'id');
    }
}
