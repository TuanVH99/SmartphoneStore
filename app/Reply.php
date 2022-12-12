<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['comment_id','customer_id','name','reply_content'];
    protected $table = "replies";
}
