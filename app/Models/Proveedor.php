<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'whitdrawal_providers';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [];
}
