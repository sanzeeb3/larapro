<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class telephone extends model 
{

    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $table = 'telephone';
    protected $fillable = ['Name', 'Image','Mobile','Telephone','altemail','company_name','company_address','company_phone_primary','company_phone_secondary','company_email', 'Address','Email'];
}