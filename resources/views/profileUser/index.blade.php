@extends('admin.admin_master')
@section('content')
    <main class="my-4">

        <div
            class=" bg-white shadow-2xl rounded-lg flex md:flex-nowrap flex-wrap justify-center space-y-7  min-h-[80vh] w-[90%]  m-auto my-6  px-10  ">
            <div class="sm:w-[35%] flex items-center mt-10 flex-col ">

@php
$img;
if ( !empty(Auth::user()->image) ) {
    $img=Auth::user()->image;
}
else{
    $img="author.jpg";
}

@endphp


                <div class=" " >

                        <img src=" {{ asset('img/'.$img) }} " alt=""
                            class=" hover:ring-green-400 w-32 h-32 flex m-auto  p-1 object-cover rounded-full ring-2 ring-green-300  cursor-pointer">

                </div>

                <div class=" font-medium  bg-emerald-100 text-emerald-600 w-full rounded-full text-center  p-2 my-3">
                    {{ $user->userType }}</div>
                <a  href="{{route('profile.edit')}} "class="bg-indigo-500 hover:bg-indigo-600 px-10  py-2 mt-3 block text-center text-white rounded-3xl w-full flex items-center  justify-center ">
                    <i class="fa fa-edit  mx-1"></i> Edit</a>
            </div>
            <div class="w-full  py-3 sm:px-10   md:px-20 px-2 ">
                <h1 class="text-3xl font-semibold text-slate-800">MyProfile</h1>
                <div class="grid md:grid-cols-2  my-10  gap-10 ">
                    <div class="">
                        <h1 class="p-1 text-slate-600 block">Name</h1>
                        <span class="p-2 px-3 text-slate-700 bg-slate-200 w-full block"> {{ $user->name }}</span>
                    </div>
                    <div class="">
                        <h1 class="p-1 text-slate-600 block">Role</h1>
                        <span class="p-2 px-3 text-slate-700 bg-slate-200 w-full block">{{ $user->userType }}</span>
                    </div>
                    <div class="">
                        <h1 class="p-1 text-slate-600 block">Date Use</h1>
                        <span class="p-2 px-3 text-slate-700 bg-slate-200 w-full block">
                            {{ $user->created_at->format('d/m/Y') }} </span>
                    </div>
                    <div class="">
                        <h1 class="p-1 text-slate-600 block">Gender</h1>
                        <span class="p-2 px-3 text-slate-700 bg-slate-200 w-full block">{{ $user->gender }}</span>
                    </div>
                    <div class="col-span-2">
                        <h1 class="p-1 text-slate-600 block">Email</h1>
                        <span class="p-2 px-3 text-slate-700 bg-slate-200  block"> {{ $user->email }}</span>
                    </div>


                </div>
            </div>
        </div>
    </main>
@endsection
