<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoMantenimientoVehiculo extends Model
{
    use HasFactory;

    protected $table = 'maintenance_images';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'maintenance_id',
        'image',
        'description',
        'source',
        'created_at',
        'updated_at',
    ];
}
