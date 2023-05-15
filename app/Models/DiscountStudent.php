<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountStudent extends Model
{
    public function test(){
        return $this->belongsTo(AssignStudent::class,'assign_student_id','id');
       }

}
