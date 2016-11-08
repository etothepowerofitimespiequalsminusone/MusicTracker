<?php

namespace musictracker;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{

    //added so that there is no mass exception, id is the only value not fillable
    protected $guarded = array('id');
}
