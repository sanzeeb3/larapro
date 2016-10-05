<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class seats extends model {

    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $table = 'seats';
protected $fillable = ['book',  'available'];
}