@extends('admin.admin_master')
@section('content')
    <main class="py-5">
        @php
        $img;
        if ( !empty(Auth::user()->image) ) {
            $img=Auth::user()->image;
        }
        else{
            $img="author.jpg";
        }

        @endphp
        <form action=" {{route('profile.update2')}} " method="post" enctype="multipart/form-data"
            class=" md:p-10 p-6  space-y-8 gap-4 w-[90%] sm:w-[80%] rounded-xl mx-auto  bg-white shadow-lg">
            @csrf
            <div class="mb-4 sm:mb-0">
                <h1 class="text-3xl md:text-4xl text-slate-800 font-bold">Edit Profile</h1>
            </div>

            {{-- input field --}}
            <div></div>
            <div class="flex justify-center items-center flex-col">
                <div class="flex w-max space-x-2 items-center my-2">
                   <img src=" {{asset('img/'.$img)}} " alt="" class="w-32 h-32 ring-2 ring-emerald-700 rounded-full border object-cover ">
                </div>
              <label class="my-4  space-x-1 cursor-pointer px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700   shadow-sm hover:text-gray-500 focus:outline-none  transition ease-in-out duration-150">
            <input type="file" id="image" name="image" class="hidden">
            <i class="fa fa-upload"></i>
<label for="image" class="cursor-pointer "> Upload Img</label>
              </label>
            </div>
            <div class="  grid sm:grid-cols-2 gap-4  ">
                <div>
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="Name">Name</label>
                        <span class="text-rose-500">*</span>
                    </div>
                    <input id="Name" class="form-input w-full" name="name" type="text" value={{$user->name}}
                        placeholder="Example: janDoe" />

                </div>

                <div>
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="Email">Email</label>
                        <span class="text-rose-500">*</span>
                    </div>
                    <input id="Email" class="form-input w-full" name="email" type="text"
                        placeholder="eample@g.com" value={{$user->email}} />
                </div>
                <div>
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="address">Adresse</label>
                        <span class="text-rose-500">*</span>
                    </div>
                    <input id="address" class="form-input w-full" name="address" type="text"
                        placeholder="City ,Country"value={{$user->address}} />
                </div>
                <div>
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="mobileNumber">Mobile Number</label>
                        <span class="text-rose-500">*</span>
                    </div>
                    <input id="mobile" class="form-input w-full" name="mobile" type="number"
                        placeholder="070000000" value={{$user->mobile}} />
                </div>


                <div>
                    <div class="flex w-full space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="gender">Gender</label>
                        <span class="text-rose-500">*</span>
                    </div>
                    <select name="gender" id="gender" class="form-input w-full ">
                        <option value="" class="p-4 cursor-pointer ">Select Gender</option>
                        <option value="Male" class="p-4 cursor-pointer" selected="selected" >Male</option>
                        <option value="Female" class="p-4 cursor-pointer ">Female</option>

                    </select>
                </div>
                <div>
                    <div class="flex w-full space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="Role">Role</label>
                        <span class="text-rose-500">*</span>
                    </div>
                    <select name="userType" id="Role" class="form-input w-full ">
                        <option value="" class="p-4 cursor-pointer ">Select Role</option>
                        <option value="Admin" class="p-4 cursor-pointer " selected="selected" >Admin</option>
                        <option value="User" class="p-4 cursor-pointer ">User</option>

                    </select>
                </div>

            </div>
            <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white sm:w-[150px] w-full ">Submit</button>
        </form>

    </main>
@endsection
