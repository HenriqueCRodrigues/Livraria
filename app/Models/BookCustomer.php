<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookCustomer extends Model
{
    protected $table = "bookcustomers";

    protected $fillable = [
        "custID",
        "fname",
        "lname",
        "email",
        "street",
        "city",
        "state",
        "zip",
        "password",
    ];

    public $timestamps = false;

    protected $primaryKey = 'custID';
}
