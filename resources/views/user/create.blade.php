@extends('admin.admin_master')
@section('content')
    <main class=" md:p-10 p-6">

        <form action=" {{route ('users.store')}} " method="post" class=" md:p-10 p-6  space-y-8 gap-4 w-[90%] sm:w-[80%] rounded-xl mx-auto my-10 bg-white shadow-lg">
            @csrf
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">Add User</h1>
            </div>
            {{-- input field --}}
            <div class="  grid sm:grid-cols-2 gap-4  ">
                <div>
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="Name">Name</label>
                        <span class="text-rose-500">*</span>
                       </div>
                       <input id="Name" class="form-input w-full" name="name" type="text" placeholder="Example: janDoe"/>
                       @error('name')

                       <span class="text-red-400 text-sm p-1"> {{$message}} </span>
                       @enderror
                </div>

                <div>
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="Email">Email</label>
                        <span class="text-rose-500">*</span>
                    </div>
                    <input id="Email" class="form-input w-full" name="email" value="{{old('email')}}"  type="text" placeholder="eample@g.com" />
                    @error('email')

                    <span class="text-red-400 text-sm p-1"> {{$message}} </span>
                    @enderror
                </div>
                <div class="col-span-2">
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="Role">Role</label>
                        <span class="text-rose-500">*</span>
                    </div>
                    <select name="userType" id="Role" class="form-input w-full ">
                        <option value="" class="p-4 cursor-pointer ">Select Role</option>
                        <option value="Admin" class="p-4 cursor-pointer ">Admin</option>
                        <option value="User" class="p-4 cursor-pointer ">User</option>

                    </select>
                    @error('userType')

                    <span class="text-red-400 text-sm p-1"> {{$message}} </span>
                    @enderror
                </div>

                <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white sm:w-[150px] w-full ">Submit</button>
            </div>
        </form>

    </main>
@endsection
