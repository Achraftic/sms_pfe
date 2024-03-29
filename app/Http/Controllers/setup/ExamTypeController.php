<?php

namespace App\Http\Controllers\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamType;
class ExamTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=ExamType::all();
        return view ("setupMangement.examType.index",compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ("setupMangement.examType.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:exam_types|regex:/^[a-zA-Z]+$/u',
            ]);
            $data=new ExamType ();
            $data->name = $request->name;
            $data->save();
            return redirect()->route('exam.type.index')->with('success', 'exam type created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data=ExamType::find($id);
        return view('setupMangement.examType.edit',compact('data'));
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
        $request->validate([
            'name'=>'required|unique:exam_types|regex:/^[a-zA-Z]+$/u',
            ]);
            $data=ExamType::find($id);
            $data->name = $request->name;
            $data->save();
            return redirect()->route('exam.type.index')->with('success', 'exam type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=ExamType::find($id);
        if($data != null){
            $data->delete();
            return redirect()->route('exam.type.index')->with('info', 'exam type deleted successfully.');

        }
    }
}
