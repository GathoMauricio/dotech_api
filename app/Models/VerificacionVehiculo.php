<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificacionVehiculo extends Model
{
    use HasFactory;

    protected $table = 'vehicle_verifications';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'author_id',
        'vehicle_id',
        'date',
        'kilometers',
        'type',
        'image',
        'source',
        'created_at',
        'updated_al',
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

    public function vehiculo()
    {
        return $this->belongsTo(
            'App\Models\Vehiculo',
            'vehicle_id',
            'id'
        )
            ->withDefault();
    }

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->setTimezone('America/Mexico_City')->format('Y-m-d H:i:s');
    }
}
