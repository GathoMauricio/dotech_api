<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retiro extends Model
{
    use HasFactory;

    protected $table = 'whitdrawals';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'sale_id',
        'author_id',
        'folio',
        'emisor',
        'codigo_estatus',
        'es_cancelable',
        'estado_cfdi',
        'estatus_cancelacion',
        'whitdrawal_provider_id',
        'whitdrawal_account_id',
        'whitdrawal_department_id',
        'status',
        'type',
        'description',
        'quantity',
        'invoive',
        'document',
        'paid',
        'created_at',
        'updated_at'
    ];

    public function proyecto()
    {
        return $this->belongsTo(
            'App\Models\Ticket',
            'sale_id',
            'id'
        )
            ->withDefault();
    }

    public function autor()
    {
        return $this->belongsTo(
            'App\Models\User',
            'author_id',
            'id'
        )
            ->withDefault();
    }
    public function proveedor()
    {
        return $this->belongsTo(
            'App\Models\Proveedor',
            'whitdrawal_provider_id',
            'id'
        )
            ->withDefault();
    }
}
