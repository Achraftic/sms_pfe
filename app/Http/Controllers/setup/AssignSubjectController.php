<?php

namespace App\Http\Controllers\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\StudentClass;
use App\Models\AssignSubject;
class AssignSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $data = FeeAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
         $data=AssignSubject::select('class_id')->groupBy('class_id')->get();
        return view("setupMangement.AssignSubject.index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = AssignSubject::all();
        $stdent_class = StudentClass::all();
        $subject = Subject::all();
        return view("setupMangement.AssignSubject.create", compact('data','stdent_class','subject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $countSubject = count($request->subject_id);
        if ($countSubject != null) {
            for ($i = 0; $i < $countSubject; $i++) {
                $assignSubject = new AssignSubject();
                $assignSubject->class_id = $request->class_id;
                $assignSubject->subject_id = $request->subject_id[$i];
                $assignSubject->full_mark = $request->full_mark[$i];
                $assignSubject->pass_mark = $request->pass_mark[$i];
                $assignSubject->subjective_mark = $request->subjective_mark[$i];
                $assignSubject->save();
            }
        }

        return redirect()->route('assign.subject.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data']  =AssignSubject::where('class_id',$id)->orderBy('subject_id','asc')->get();
        $stdent_class = StudentClass::all();
        $subject = Subject::all();
        return view("setupMangement.AssignSubject.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data']  =AssignSubject::where('class_id',$id)->orderBy('subject_id','asc')->get();

      $data['stdent_class'] = StudentClass::all();
      $data['subject'] = Subject::all();
            return view('setupMangement.AssignSubject.edit',$data);

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

        if($request->class_id== NULL){
            return abort('404');
        }
        else {
             $countSubject = count($request->subject_id);
             AssignSubject::where('class_id',$id)->delete();
            for ($i = 0; $i < $countSubject; $i++) {
                $assignSubject = new AssignSubject();
                $assignSubject->class_id = $request->class_id;
                $assignSubject->subject_id = $request->subject_id[$i];
                $assignSubject->full_mark = $request->full_mark[$i];
                $assignSubject->pass_mark = $request->pass_mark[$i];
                $assignSubject->subjective_mark = $request->subjective_mark[$i];
                $assignSubject->save();

        }

    }
    return redirect()->route('assign.subject.index');

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
