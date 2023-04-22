<?php

namespace App\Http\Controllers\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
class SetupMangementController extends Controller
{

    public function index (){
       $data= StudentClass::all();
       return view ('setupMangement.index',compact('data'));

   }


   public function create()
   {
       return view("setupMangement.create");
   }
   public function store(Request $request)
   {
       $request->validate([
       'name'=>'required|unique:student_classes',
       ]);
       $data=new StudentClass();
       $data->name = $request->name;
       $data->save();
       return redirect()->route('student.class.index');
   }

   public function edit($id)
   {
    $data= StudentClass::find($id);
       return view("setupMangement.edit",compact('data'));
   }

   public function update(Request $request, $id)
   {
       $request->validate([
       'name'=>'required|unique:student_classes',
       ]);
       $data= StudentClass::find($id);
       $data->name = $request->name;
       $data->save();
       return redirect()->route('student.class.index');
   }

   public function destroy($id)
   {
       $class = StudentClass::find($id);
       if ($class != null) {
       $class->delete();
       return redirect()->route('student.class.index')->with('info', 'Student Class has deleted successfully.');
   }
   }


}
