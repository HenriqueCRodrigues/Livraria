<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookOrderItem extends Model
{
    protected $table = "bookorderitems";

    protected $fillable = [
        "orderID",
        "ISBN",
        "qty",
        "price"
    ];

    public $timestamps = false;
}
