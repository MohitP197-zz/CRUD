<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	protected $table = 'customerinfo';
    protected $fillable = ['customerName', 'address','organization','email','mobileNumber','image'];
    public $timestamps = false;
}
