<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grn extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_no',
        'material_name',
        'batch_number',
        'quantity',
        'supplier',
        'manufacture_date',
        'expiry_date',
    ];
}
