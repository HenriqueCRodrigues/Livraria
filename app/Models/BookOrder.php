<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookOrder extends Model
{
    protected $table = "bookorders";

    protected $fillable = [
        "orderID",
        "custID",
        "orderdate"
    ];

    public $timestamps = false;

    protected $primaryKey = 'orderID';
}
