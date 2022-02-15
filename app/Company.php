<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
   protected $fillable=['id','name','email','address'];

   public static function getAllCompany(){
        return  Company::orderBy('id','DESC')->paginate(10);
    }
}
