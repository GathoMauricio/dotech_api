<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagoTicket extends Model
{
    use HasFactory;

    protected $table = 'sale_payments';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'sale_id', 'id');
    }

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->setTimezone('America/Mexico_City')->format('Y-m-d H:i:s');
    }
}
