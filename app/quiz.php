<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class quiz extends model {

    public $timestamps = false;
    protected $primaryKey = 'qid';
    protected $table = 'quiz';
    protected $fillable = array('question', 'opt1', 'opt2','opt3','opt4','answer','category', 'level');

}