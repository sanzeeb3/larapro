<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class bus extends model {

    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $table = 'bus';
protected $fillable = ['name',  'contact','booked_for','booked_seats','active'];
}