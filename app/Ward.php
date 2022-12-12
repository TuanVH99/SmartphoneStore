<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['xaid','name','type','maqh'];
    protected $table = "wards";
}
