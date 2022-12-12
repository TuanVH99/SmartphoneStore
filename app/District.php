<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['maqh','name','type','matp'];
    protected $table = "districts";
}
