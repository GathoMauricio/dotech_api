<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuentaRetiro extends Model
{
    use HasFactory;

    protected $table = 'whitdrawal_accounts';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [];
}
