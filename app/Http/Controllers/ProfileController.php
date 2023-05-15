<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $id = Auth::user()->id;
        $user = User::find($id);
        return view('profileUser.index', compact('user'));

    }
    public function passwordView()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('profileUser.passwordView', compact('user'));

    }public function passwordUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'Currentpassword' => 'required',
            'Newpassword' => 'required',
            'Confirmepassword' => 'required|same:Newpassword',

        ]);
        $hashPassword = Auth::user()->password;
        if (Hash::check($request->Currentpassword, $hashPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->Newpassword);
            $user->save();
            Auth::logout();
            session()->flush();
            return redirect()->route('login');

        }
        else{
            return redirect()->back() ;
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('profileUser.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update2(Request $request)
    {

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->userType = $request->userType;
        $data->email = $request->email;
        $data->gender = $request->gender;
        $data->address = $request->address;
        $data->mobile = $request->mobile;
        if ($request->file('image')) {

            $newImgName =  date('ymD') . "." . $request->image->extension();
            $request->image->move(public_path('img'), $newImgName);
            $data->image = $newImgName;
        }
        $data->save();
        return redirect()->route('profile.index')->with('success', 'User Updated successfully.');
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
