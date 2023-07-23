<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testament extends Model
{
    use HasFactory;

    protected $fillable = [
        'batch_id',
        'testament_number',
        'item_id',
        'item_quantity',
        'unit_id',
        'testament_status',
        'description',
        'return_testament_date',
    ];

    protected $casts = [
        'return_testament_date' => 'date',
    ];
}
