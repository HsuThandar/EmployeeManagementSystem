<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable=['id','staffid','fname','lname','companyid','department','email','phone','address'];

   public static function getAllEmployee(){
        return  Employee::orderBy('id','DESC')->paginate(10);
    }
}
