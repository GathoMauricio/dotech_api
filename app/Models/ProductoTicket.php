<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoTicket extends Model
{
    use HasFactory;

    protected $table = 'product_sale';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->setTimezone('America/Mexico_City')->format('Y-m-d H:i:s');
    }
}
