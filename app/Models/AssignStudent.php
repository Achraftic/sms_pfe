<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignStudent extends Model
{
   public function student(){
    return $this->belongsTo(User::class,'student_id','id');
   }
   public function class(){
    return $this->belongsTo(StudentClass::class,'class_id','id');
   }
   public function shift(){
    return $this->belongsTo(ShiftStudent::class,'shift_id','id');
   }
   public function group(){
    return $this->belongsTo(GroupStudent::class,'group_id','id');
   }
   public function year(){
    return $this->belongsTo(YearStudent::class,'year_id','id');
   }
   public function discount(){
    return $this->belongsTo(DiscountStudent::class,'id','assign_student_id');
   }



}
