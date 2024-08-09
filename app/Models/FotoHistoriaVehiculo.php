<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoHistoriaVehiculo extends Model
{
    use HasFactory;

    protected $table = 'vehicle_history_images';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'author_id',
        'vehicle_history_id',
        'image',
        'description',
        'source',
        'created_at',
        'updated_at',
    ];
}
