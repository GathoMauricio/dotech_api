<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolUsuario extends Model
{
    use HasFactory;

    protected $table = 'rols_users';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['name'];
}
