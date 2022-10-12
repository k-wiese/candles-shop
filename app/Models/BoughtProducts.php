<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoughtProducts extends Model
{
    use HasFactory;

    protected $fillable =[
        'name','price','qty','id','product_id','order_id'
    ];
}
