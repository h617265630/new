<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table="customers";
    protected $primaryKey='id';
    public $timestamps=false;
    protected $guarded=[];

    public static $rules = array(
       'phoneNo'=>'required',
        'name'=>'required',
        'address'=>'required',
        'creditCard'=>'required'
    );
}
