<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentoTicket extends Model
{
    use HasFactory;

    protected $table = 'sale_documents';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [];
}
