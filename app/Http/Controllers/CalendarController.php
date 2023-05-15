<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;
class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeOfEvent= array("Parent-Teacher Conferences","Holiday","National Event" ,"Exam","Graduation") ;

        $typeColor= array("sky"=>"Parent-Teacher Conferences","emerald"=>"Holiday","blue"=>"National Event","yellow"=>"Graduation","red"=>"Exam","orange"=>"Other") ;

        $data=Calendar::all();
        $event=array();
        $a="indigo";
        foreach( $data as $i){
            $event[]= [
                'eventName'=> $i->title,
                'eventStart'=> $i->dateStart,
                'eventEnd'=> $i->dateEnd,
                'eventColor' => array_search($i->type, $typeColor)


            ];



        }
        return view('calendar.calendar',compact('event') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeOfEvent= array("Parent-Teacher Conferences","Holiday","National Event" ,"Exam","Graduation","Other") ;
        return view('calendar.create',compact("typeOfEvent") );
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
            'title'=>'required',
            'dateStart'=>'required ',
            'dateEnd'=>'required',
            'type'=>'required',


       ]);
        $event=new Calendar();
        $event->title=$request->title;
        $event->dateStart=$request->dateStart;
        $event->dateEnd=$request->dateEnd;
        $event->type=$request->type;
        $event->save();
        return redirect()->route('calendar');

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
        //
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
        //
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
