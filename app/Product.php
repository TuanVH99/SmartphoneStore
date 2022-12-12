<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','price','category_id','image_path','producer_id','description','brand_id','quantity','status','sku'];
    protected $table = "products";
}
