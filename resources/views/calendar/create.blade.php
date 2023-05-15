@extends('admin.admin_master')
@section('content')
    <main class=" md:p-10 p-6   min-h-screen  ">

        <form action=" {{route('calendar.store')}} " method="post" class=" md:p-10 p-6 space-y-8 gap-4 w-[90%]  rounded-xl mx-auto my-3 bg-white shadow-lg">
            @csrf
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">Add Event</h1>
            </div>
            {{-- input field --}}
<div class="grid sm:grid-cols-2 gap-2 sm:gap-4">
         <div>
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="Name">Title Of Event</label>
                        <span class="text-rose-500">*</span>
                       </div>
                       <input id="Nameclass" class="form-input w-full" name="title" type="text" placeholder="Title"/>
                       @error('title')

                       <span class="text-red-400 text-sm p-1"> {{$message}} </span>
                       @enderror
                </div>



                <div>
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="Name">Type Of Event</label>
                        <span class="text-rose-500">*</span>
                       </div>
                         <select name=" type" id="" class="form-input w-full">
                        <option value=""  selected="" disabled="">Select Type</option>
                        @foreach ($typeOfEvent as $item)
                        <option value="{{$item}} " > {{$item}} </option>
                        @endforeach
                      </select>
                       @error('title')

                       <span class="text-red-400 text-sm p-1"> {{$message}} </span>
                       @enderror
                </div>

                <div>
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="Name">Date Start</label>
                        <span class="text-rose-500">*</span>
                       </div>
                       <input id="Nameclass" class="form-input w-full" name="dateStart" type="date" placeholder="dateStart"/>
                       @error('dateStart')

                       <span class="text-red-400 text-sm p-1"> {{$message}} </span>
                       @enderror
                </div>
                <div>
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="Name">Date End</label>
                        <span class="text-rose-500">*</span>
                       </div>
                       <input id="Nameclass" class="form-input w-full" name="dateEnd" type="date" placeholder="dateEnd"/>
                       @error('dateEnd')

                       <span class="text-red-400 text-sm p-1"> {{$message}} </span>
                       @enderror
                </div>
</div>

            <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white sm:w-[150px] w-full ">Submit</button>

        </form>

    </main>
@endsection
