<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','image_path','sort_order','status'];
    protected $table = "slides";
}
