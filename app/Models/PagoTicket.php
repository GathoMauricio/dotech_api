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
}
