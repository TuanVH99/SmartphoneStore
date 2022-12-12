<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = 
    ['username','password','email','phone','sex','city_id','district_id','ward_id','admin','status'];
    protected $table = "customers";
}
