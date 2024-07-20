<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMantenimientoVehiculo extends Model
{
    use HasFactory;

    protected $table = 'maintenance_types';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'type',
        'created_at',
        'updated_at',
    ];
}
