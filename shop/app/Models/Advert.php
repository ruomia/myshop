<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    protected $fillable = ['cat_id','title','url','logo','state','sort'];
}
