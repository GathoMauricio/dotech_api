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
}
