<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeptoRetiro extends Model
{
    use HasFactory;

    protected $table = 'whitdrawal_departments';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [];
}
