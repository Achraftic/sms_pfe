@extends('admin.admin_master')
@section('content')
    <main class=" min-h-[80vh] flex items-center justify-center ">

        <form action=" {{route('password.update')}}  " method="post" enctype="multipart/form-data"
            class=" md:p-10 p-6  space-y-8 gap-4 w-[90%] sm:w-[80%] rounded-xl mx-auto  bg-white shadow-lg">
            @csrf
            <div class="mb-2 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">Change Password</h1>
            </div>

            <div class="  grid sm:grid-cols-2 gap-4  ">



                <div>
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="password">Current Password</label>
                        <span class="text-rose-500">*</span>
                    </div>
                    <input id="Currentpassword" class="form-input w-full" name="Currentpassword" type="password"
                     placeholder="Current password" />
                     @error('Currentpassword')
                     <span class="text-red-500 text-sm p-1"> {{$message}} </span>
                     @enderror
                </div>
                <div>
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="password"> New Password</label>
                        <span class="text-rose-500">*</span>
                    </div>
                    <input id="Newpassword" class="form-input w-full" name="Newpassword" type="password"
                     placeholder="New password"      />
                     @error('Newpassword')

                     <span class="text-red-500 text-sm p-1"> {{$message}} </span>
                     @enderror
                </div>
                <div>
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="password">Confirme Password</label>
                        <span class="text-rose-500">*</span>
                    </div>
                    <input id="Confirmepassword" class="form-input w-full" name="Confirmepassword" type="password"
                     placeholder="Confirme password"      />
                     @error('Confirmepassword')
                     <span class="text-red-500 text-sm p-1"> {{$message}} </span>
                     @enderror
                </div>


            </div>
            <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white sm:w-[150px] w-full ">Submit</button>
        </form>

    </main>
@endsection
