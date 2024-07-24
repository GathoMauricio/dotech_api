<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriaVehiculo extends Model
{
    use HasFactory;

    protected $table = 'vehicle_histories';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'author_id',
        'vehicle_id',
        'kilometers',
        'description',
        'observation',
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

    public function fotos()
    {
        return $this->hasMany(FotoHistoriaVehiculo::class, 'vehicle_history_id', 'id');
    }
}
