<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [];

    public function departamentos()
    {
        return $this->hasMany(DeptoCliente::class, 'company_id', 'id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'company_id', 'id');
    }
}
