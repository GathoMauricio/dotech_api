<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table = 'sales';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [];

    public function cliente()
    {
        return $this->belongsTo(
            'App\Models\Cliente',
            'company_id',
            'id'
        )
            ->withDefault();
    }

    public function departamento()
    {
        return $this->belongsTo(
            'App\Models\DeptoCliente',
            'department_id',
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

    public function productos()
    {
        return $this->hasMany(ProductoTicket::class, 'sale_id', 'id');
    }

    public function pagos()
    {
        return $this->hasMany(PagoTicket::class, 'sale_id', 'id');
    }

    public function documentos()
    {
        return $this->hasMany(DocumentoTicket::class, 'sale_id', 'id');
    }

    public function retiros()
    {
        return $this->hasMany(Retiro::class, 'sale_id', 'id');
    }

    public function bitacoras()
    {
        return $this->hasMany(Bitacora::class, 'sale_id', 'id');
    }

    public function seguimientos()
    {
        return $this->hasMany(SeguimientoTicket::class, 'sale_id', 'id');
    }

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->setTimezone('America/Mexico_City')->format('Y-m-d H:i:s');
    }
}
