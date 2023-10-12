<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeguimientoTicket extends Model
{
    use HasFactory;

    protected $table = 'sale_follows';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [];

    public function autor()
    {
        return $this->belongsTo(
            'App\Models\User',
            'author_id',
            'id'
        )
            ->withDefault();
    }

    public function ticket()
    {
        return $this->belongsTo(
            'App\Models\Ticket',
            'sale_id',
            'id'
        )
            ->withDefault();
    }
}
