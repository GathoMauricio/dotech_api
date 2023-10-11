<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeptoCliente extends Model
{
    use HasFactory;

    protected $table = 'company_department';
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
}
