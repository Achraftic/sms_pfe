<?php

namespace App\Http\Controllers\studentMange;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\GroupStudent;
use App\Models\YearStudent;
use App\Models\ShiftStudent;
use App\Models\DiscountStudent;
use App\Models\User;
use DB;
use PDF;
class StudentRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $YearStudent=YearStudent::all();
        $StudentClass=StudentClass::all();
        $year_id=YearStudent::orderBy('id','desc')->first()->id;
        $class_id=StudentClass::orderBy('id','desc')->first()->id;

       $data=AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->get();
       return view('studentMangement.Reg.index',compact('data','YearStudent','StudentClass','year_id','class_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $StudentClass=StudentClass::all();
        $GroupStudent=GroupStudent::all();
        $YearStudent=YearStudent::all();
        $ShiftStudent=ShiftStudent::all();

        return view('studentMangement.Reg.create',compact('YearStudent','GroupStudent','StudentClass','ShiftStudent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

        //

    public function store(Request $request)
    {
    	DB::transaction(function() use($request){
    	$checkYear = YearStudent::find($request->year_id)->name;
    	$student = User::where('usertype','Student')->orderBy('id','DESC')->first();

    	if ($student == null) {
    		$firstReg = 0;
    		$studentId = $firstReg+1;
    		if ($studentId < 10) {
    			$id_no = '000'.$studentId;
    		}elseif ($studentId < 100) {
    			$id_no = '00'.$studentId;
    		}elseif ($studentId < 1000) {
    			$id_no = '0'.$studentId;
    		}
    	}else{
     $student = User::where('usertype','Student')->orderBy('id','DESC')->first()->id;
     	$studentId = $student+1;
     	if ($studentId < 10) {
    			$id_no = '000'.$studentId;
    		}elseif ($studentId < 100) {
    			$id_no = '00'.$studentId;
    		}elseif ($studentId < 1000) {
    			$id_no = '0'.$studentId;
    		}

    	} // end else

    	$final_id_no = $checkYear.$id_no;
    	$user = new User();
    	$code = rand(0000,9999);
    	$user->id_no = $final_id_no;
    	$user->password = bcrypt($code);
    	$user->usertype = 'Student';
    	$user->code = $code;
    	$user->name = $request->name;
    	$user->fname = $request->fname;
    	$user->mname = $request->mname;
    	$user->email = $request->email;
    	$user->mobile = $request->mobile;
    	$user->address = $request->address;
    	$user->gender = $request->gender;
    	$user->dob = date('Y-m-d',strtotime($request->dob));

    	if ($request->file('image')) {
            $newImgName =  date('ymDs') . "." . $request->image->extension();
            $request->image->move(public_path('studentImage'), $newImgName);
            $user->image = $newImgName;
    	}
 	       $user->save();

          $assign_student = new AssignStudent();
          $assign_student->student_id = $user->id;
          $assign_student->year_id = $request->year_id;
          $assign_student->class_id = $request->class_id;
          $assign_student->group_id = $request->group_id;
          $assign_student->shift_id = $request->shift_id;
          $assign_student->save();

          $discount_student = new DiscountStudent();
          $discount_student->assign_student_id = $assign_student->id;
          $discount_student->fee_category_id = '1';
          $discount_student->discount = $request->discount;
          $discount_student->save();

    	});




    	return redirect()->route('student.index')->with('success',"Student Registration Inserted Successfully");

    } // End Method




    public function search( Request $request)
    {

        $YearStudent=YearStudent::all();
        $StudentClass=StudentClass::all();
        $year_id=$request->year;
        $class_id=$request->class;




    $data=AssignStudent::where('year_id',$request->year)->where('class_id',$request->class)->get();

       return view('studentMangement.Reg.index',compact('data','YearStudent','StudentClass','year_id','class_id'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ShiftStudent=ShiftStudent::all();
        $YearStudent=YearStudent::all();
        $StudentClass=StudentClass::all();
        $DiscountStudent=DiscountStudent::all();
        $year_id=YearStudent::orderBy('id','desc')->first()->id;
        $class_id=StudentClass::orderBy('id','desc')->first()->id;
        $GroupStudent=GroupStudent::all();
        $data=AssignStudent::where('student_id',$id)->get();
        return view('studentMangement.Reg.edit',compact('data','GroupStudent','YearStudent','StudentClass','year_id','class_id','ShiftStudent','DiscountStudent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::transaction(function() use($request,$id){


    	$user =  User::where('id',$id)->first();
    	$user->name = $request->name;
    	$user->fname = $request->fname;
    	$user->mname = $request->mname;
    	$user->email = $request->email;
    	$user->mobile = $request->mobile;
    	$user->address = $request->address;
    	$user->gender = $request->gender;
    	$user->dob = date('Y-m-d',strtotime($request->dob));

    	if ($request->file('image')) {
            $newImgName =  date('ymDs') . "." . $request->image->extension();
            $request->image->move(public_path('studentImage'), $newImgName);
            $user->image = $newImgName;
    	}
 	       $user->save();

          $assign_student =  AssignStudent::where('id',$request->id)->where('student_id',$id)->first();
          $assign_student->student_id = $user->id;
          $assign_student->year_id = $request->year_id;
          $assign_student->class_id = $request->class_id;
          $assign_student->group_id = $request->group_id;
          $assign_student->shift_id = $request->shift_id;
          $assign_student->save();

          $discount_student =  DiscountStudent::where('assign_student_id',$request->id)->first();
          $discount_student->assign_student_id = $assign_student->id;
          $discount_student->fee_category_id = '1';
          $discount_student->discount = $request->discount;
          $discount_student->save();
        });



    	return redirect()->route('student.index')->with('success',"Student Registration Updated Successfully");
    }

    public function promotionEdit($id)
    {




//          $current_year=AssignStudent::find($id)->year_id;//year student
//          $current_id=AssignStudent::find($id)->student_id;//year student

//          $idstudent=AssignStudent::where('id',$id)->first()->student_id;
//          $stdID=AssignStudent::where('student_id',$idstudent)->orderBy('year_id','desc')->first()->student_id;//last
//          $stdyear=AssignStudent::where('student_id',$idstudent)->orderBy('year_id','desc')->first()->year_id;//year student


// if(  $current_year != $stdyear ){
//     return abort(404);
// }


        $ShiftStudent=ShiftStudent::all();
        $YearStudent=YearStudent::all();
        $StudentClass=StudentClass::all();
        $DiscountStudent=DiscountStudent::all();
        $year_id=YearStudent::orderBy('id','desc')->first()->id;
        $class_id=StudentClass::orderBy('id','desc')->first()->id;
        $GroupStudent=GroupStudent::all();
        $data=AssignStudent::where('id',$id)->get();
        return view('studentMangement.Reg.promotion',compact('data','GroupStudent','YearStudent','StudentClass','year_id','class_id','ShiftStudent','DiscountStudent'));
    }

    public function promotionUpdate(Request $request, $id)
    {
        DB::transaction(function() use($request,$id){


    	$user =  User::where('id',$id)->first();
    	$user->name = $request->name;
    	$user->fname = $request->fname;
    	$user->mname = $request->mname;
    	$user->email = $request->email;
    	$user->mobile = $request->mobile;
    	$user->address = $request->address;
    	$user->gender = $request->gender;
    	$user->dob = date('Y-m-d',strtotime($request->dob));

    	if ($request->file('image')) {
            $newImgName =  date('ymDs') . "." . $request->image->extension();
            $request->image->move(public_path('studentImage'), $newImgName);
            $user->image = $newImgName;
    	}
 	       $user->save();

          $assign_student =  new AssignStudent;
          $assign_student->student_id = $user->id;
          $assign_student->year_id = $request->year_id;
          $assign_student->class_id = $request->class_id;
          $assign_student->group_id = $request->group_id;
          $assign_student->shift_id = $request->shift_id;
          $assign_student->save();

          $discount_student = new   DiscountStudent();
          $discount_student->assign_student_id = $assign_student->id;
          $discount_student->fee_category_id = '2';
          $discount_student->discount = $request->discount;
          $discount_student->save();
        });



    	return redirect()->route('student.index')->with('success',"Student Registration Updated Successfully");
    }



    public function viewPdf($id) {
        // retreive all records from db

 $data["detail"]=AssignStudent::with(["student","discount","year","class","group"])->where('student_id',$id)->first();

        view()->share('user',$data);
        $pdf = PDF::loadView('studentMangement.Reg.pdf_view', $data);
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');


      }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
