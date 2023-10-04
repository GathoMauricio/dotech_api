<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstatusUsuario extends Model
{
    use HasFactory;

    protected $table = 'status_users';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['name'];
}
