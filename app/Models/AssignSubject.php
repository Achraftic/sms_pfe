<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    public function AssignClass(){
   return $this->belongsTo(StudentClass::class,'class_id','id');
    }
    public function AssigneSubject(){
   return $this->belongsTo(Subject::class,'subject_id','id');
    }
}
