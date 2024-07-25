<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentoVehiculo extends Model
{
    use HasFactory;

    protected $table = 'vehicle_documents';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'author_id',
        'vehicle_id',
        'file',
        'description',
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
}
