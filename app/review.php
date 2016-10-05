<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class review extends model 
{
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $table = 'review';
    protected $fillable = ['name',  'email','comment','score'];
}