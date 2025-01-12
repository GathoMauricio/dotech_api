<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoVehiculo extends Model
{
    use HasFactory;

    protected $table = 'vehicle_types';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'type',
        'created_at',
        'updated_at,'
    ];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->setTimezone('America/Mexico_City')->format('Y-m-d H:i:s');
    }
}
