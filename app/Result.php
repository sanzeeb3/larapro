<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Result extends model {

    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $table = 'results';
    protected $fillable = array('category','Name',  'Score','Level','Image');

}