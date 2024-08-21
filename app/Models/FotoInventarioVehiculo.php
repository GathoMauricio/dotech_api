<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoInventarioVehiculo extends Model
{
    use HasFactory;

    protected $table = 'inventario_vehiculo_fotos';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'autor_id',
        'inventario_id',
        'seccion',
        'foto',
        'descripcion',
        'source',
    ];
}
