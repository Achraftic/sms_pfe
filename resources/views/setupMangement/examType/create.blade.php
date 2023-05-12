@extends('admin.admin_master')
@section('content')
    <main class=" md:p-10 p-6 min-h-[80vh] ">

        <form action="{{ route('exam.type.store')}} " method="post" class=" md:p-10 p-6  space-y-8 gap-4 w-[90%] sm:w-[80%] rounded-xl mx-auto my-10 bg-white shadow-lg">
            @csrf
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">Add Exam type</h1>
            </div>
            {{-- input field --}}

                <div>
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="name">Exam Type </label>
                        <span class="text-rose-500">*</span>
                       </div>
                       <input id="Nameclass" class="form-input w-full" name="name" type="text" placeholder="Add Exam Type"/>
                       @error('name')

                       <span class="text-red-400 text-sm p-1"> {{$message}} </span>
                       @enderror
                </div>
            <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white sm:w-[150px] w-full ">Submit</button>

        </form>

    </main>
@endsection
