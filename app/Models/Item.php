<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'item_number',
        'category_id',
        'total_quantity',
        'available_quantity',
        'item_status'
    ];
}
