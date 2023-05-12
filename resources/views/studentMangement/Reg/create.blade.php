@extends('admin.admin_master')
@section('content')
    <main class=" md:p-10 p-6 min-h-screen">

        <form action="{{ route('student.store') }} " enctype="multipart/form-data" method="post"
            class=" md:p-10 p-6  space-y-8  w-[90%] sm:w-full  rounded-xl mx-auto  bg-white shadow-lg">
            @csrf
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">Add Student Shift</h1>
            </div>
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
                <div>
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="name">Student Name</label>
                        <span class="text-rose-500">*</span>
                    </div>
                    <input id="Nameclass" class="form-input w-full" name="name" type="text"
                        placeholder="Example: 2000" />
                    @error('name')
                        <span class="  text-red-400  text-sm p-1"> {{ $message }} </span>
                    @enderror
                </div>
                <div>
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="name">Email</label>
                        <span class="text-rose-500">*</span>
                    </div>
                    <input id="Nameclass" class="form-input w-full" name="email" type="text"
                        placeholder="Example: 2000" />
                    @error('email')
                        <span class="  text-red-400  text-sm p-1"> {{ $message }} </span>
                    @enderror
                </div>

                <div>
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="name">Father Name</label>
                        <span class="text-rose-500">*</span>
                    </div>
                    <input id="fname" class="form-input w-full" name="fname" type="text"
                        placeholder="Example: 2000" />
                    @error('fname')
                        <span class="  text-red-400  text-sm p-1"> {{ $message }} </span>
                    @enderror
                </div>

                <div>
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="name">Mother Name</label>
                        <span class="text-rose-500">*</span>
                    </div>
                    <input id="mname" class="form-input w-full" name="mname" type="text"
                        placeholder="Example: 2000" />
                    @error('mname')
                        <span class="  text-red-400  text-sm p-1"> {{ $message }} </span>
                    @enderror
                </div>

                <div>
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="name">Mobile Number</label>
                        <span class="text-rose-500">*</span>
                    </div>
                    <input id="mobile" class="form-input w-full" name="mobile" type="text"
                        placeholder="Example: 2000" />
                    @error('mobile')
                        <span class="  text-red-400  text-sm p-1"> {{ $message }} </span>
                    @enderror
                </div>

                <div>
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="name">Adrress</label>
                        <span class="text-rose-500">*</span>
                    </div>
                    <input id="Adrress" class="form-input w-full" name="address" type="text"
                        placeholder="Example: 2000" />
                    @error('address')
                        <span class="  text-red-400  text-sm p-1"> {{ $message }} </span>
                    @enderror
                </div>

                <div>
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="name">Gender</label>
                        <span class="text-rose-500">*</span>
                    </div>

                           <select name="gender" class=" form-input border-slate-200 outline-none w-full" id="gender">
                            <option value="" disabled="" selected="">select your gender</option>
                            <option value="male" >Male</option>
                            <option value="female" >Female</option>
                           </select>

                    @error('gender')
                        <span class="  text-red-400  text-sm p-1"> {{ $message }} </span>
                    @enderror
                </div>

                <div>
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="name">Date Of Birth</label>
                        <span class="text-rose-500">*</span>
                    </div>
                    <input id="dob" class="form-input w-full" name="dob" type="date"
                        placeholder="Example: 2000" />
                    @error('dob')
                        <span class="  text-red-400  text-sm p-1"> {{ $message }} </span>
                    @enderror
                </div>

                <div>
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="name">Discount</label>
                        <span class="text-rose-500">*</span>
                    </div>
                    <input id="discount" class="form-input w-full" name="discount" type="text"
                        placeholder="Example: 2000" />
                    @error('discount')
                        <span class="  text-red-400  text-sm p-1"> {{ $message }} </span>
                    @enderror
                </div>

                <div>
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="name">Year</label>
                        <span class="text-rose-500">*</span>
                    </div>
                    <select name="year_id" class=" form-input border-slate-200 outline-none w-full" id="">
                        @foreach ($YearStudent as $year)
                        <option value="{{$year->id}}"> {{$year->name}} </option>
                        @endforeach
                       </select>

                    @error('year_id')
                        <span class="  text-red-400  text-sm p-1"> {{ $message }} </span>
                    @enderror
                </div>

                <div>
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="name">Class</label>
                        <span class="text-rose-500">*</span>
                    </div>
                    <select name="class_id" class=" form-input border-slate-200 outline-none w-full" id="">
                        <option value="" disabled="" selected="">Select Year Class</option>
                        @foreach ($StudentClass as $class)
                        <option value="{{$class->id}}"> {{$class->name}} </option>
                        @endforeach
                       </select>

                    @error('class_id')
                        <span class="  text-red-400  text-sm p-1"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="">
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="name">shift</label>
                        <span class="text-rose-500">*</span>
                    </div>
                    <select name="shift_id" class=" form-input border-slate-200 outline-none w-full" id="">
                        <option value="" disabled="" selected="">Select shift</option>
                   @foreach ($ShiftStudent as $shift)
                   <option value="{{$shift->id}}"> {{$shift->name}} </option>
                   @endforeach
                       </select>
                    @error('group_id')
                        <span class="  text-red-400  text-sm p-1"> {{ $message }} </span>
                    @enderror
                </div>


                <div class="">
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="name">Group</label>
                        <span class="text-rose-500">*</span>
                    </div>
                    <select name="group_id" class=" form-input border-slate-200 outline-none w-full" id="">
                        <option value="" disabled="" selected="">Select Group</option>
                   @foreach ($GroupStudent as $group)
                   <option value="{{$group->id}}"> {{$group->name}} </option>
                   @endforeach
                       </select>
                    @error('group_id')
                        <span class="  text-red-400  text-sm p-1"> {{ $message }} </span>
                    @enderror
                </div>
               <div class="">
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="name">Image</label>
                        <span class="text-rose-500">*</span>
                    </div>
                    <label class="my-4  space-x-1 cursor-pointer px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700   shadow-sm hover:text-gray-500 focus:outline-none  transition ease-in-out duration-150">
                        <input type="file" id="image" name="image" class="hidden">
                        <i class="fa fa-upload"></i>
            <label for="image" class="cursor-pointer "> Upload Img</label>
                          </label>
                   <div id="" class="my-5 rounded-full  overflow-hidden border  h-32 w-32">
           <img src=" {{asset('img/noimg.png')}} " alt="" id="showImage" class="w-full h-full rounded-full  object-cover">

                   </div>
                       </select>
                    @error('image')
                        <span class="  text-red-400  text-sm p-1"> {{ $message }} </span>
                    @enderror
                </div>
            </div>

            <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white sm:w-[150px] w-full ">Submit</button>

        </form>

    </main>

    <script type="module" defer>
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

@endsection
