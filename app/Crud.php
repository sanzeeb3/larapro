<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Crud extends model {

    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $table = 'crud';
    protected $fillable = array('name', 'phone','address','class','image');

}