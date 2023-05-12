<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["alldata"]=User::all();

        return view("user.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("user.create");
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
            'name'=>'required',
            'email'=>'required|unique:users|regex:/(.+)@(.+)\.(.+)/i',
            'userType'=>'required',


       ]);
       $data = new User();
       $data->userType= $request->userType;
       $data->role= $request->userType;
       $data->name= $request->name;
       $data->email= $request->email;
       $data->password= bcrypt($request->email);
       $data->save();
       return redirect()->route('users.index')->with('success', 'User created successfully.');
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
        $data=User::find($id);
        return view("user.edit")->with('data', $data);
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
        $validatedData = $request->validate([
            'userType' => 'required',
            'name' => 'required',
            'email' => ['required', 'email']
        ]);

       $data=User::find($id);
       $data->userType= $request->userType;
       $data->role= $request->userType;
       $data->name= $request->name;
       $data->email= $request->email;
       $data->save();
       return redirect()->route('users.index')->with('success', 'User Updated successfully.');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user != null) {
        $user->delete();
        return redirect()->route('users.index')->with('info', 'User Updated successfully.');
    }
    }
}
