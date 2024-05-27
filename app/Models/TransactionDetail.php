<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'transactions_id',
        'products_id',
        'full_name',
        'address', 
        'city', 
        'country' , 
        'zip_code',
        'phone',
    ];
    protected $hidden = [];
}
