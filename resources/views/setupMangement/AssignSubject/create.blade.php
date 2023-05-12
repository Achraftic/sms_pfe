@extends('admin.admin_master')
@section('content')
    <main class=" md:p-10 p-6 min-h-screen">

        <form action="{{ route('assign.subject.store') }} " method="post"
            class=" md:p-10 p-6  space-y-8 gap-4 w-[90%] sm:w-[80%] rounded-xl mx-auto my-10 bg-white shadow-lg">
            @csrf
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">Add Fee Category</h1>
            </div>
            {{-- input field --}}
            <div class=" gap-7 sm:grid grid-cols-2    sm:space-y-0 space-y-6">


                <div class="col-span-2 mb-4 ">
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="name">Student Class</label>
                        <span class="text-rose-500">*</span>
                    </div>

                    <select name="class_id" class="form-select w-full" id="class_id">
                        <option value="" selected="" disabled=""> Select Class</option>
                        @foreach ($stdent_class as $key => $value)
                            <option value={{ $value->id }}> {{ $value->name }} </option>
                        @endforeach

                    </select>
                    {{--  @error('name')

                       <span class="  text-red-400  text-sm p-1"> {{$message}} </span>
                       @enderror  --}}
                </div>



                <div>
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="name">Student subject</label>
                        <span class="text-rose-500">*</span>
                    </div>

                    <select name="subject_id[] " class="form-select w-[90%]" id="subject_id">
                        <option value="" selected="" disabled=""> Select Subject</option>
                        @foreach ($subject as $key => $value)
                            <option value={{ $value->id }}> {{ $value->name }} </option>
                        @endforeach
                    </select>
                    {{--  @error('name')

                       <span class="  text-red-400  text-sm p-1"> {{$message}} </span>
                       @enderror  --}}
                </div>
                <div class="grid grid-cols-3  gap-3">
                    <div>
                        <div class="flex space-x-2 items-center my-2">
                            <label class="block text-sm font-medium mb-1" for="name">Full Mark</label>
                            <span class="text-rose-500">*</span>
                        </div>
                        <input id="amount" class="form-input w-20" name="full_mark[] " type="number"
                           />
                        @error('amount')
                            <span class="  text-red-400  text-sm p-1"> {{ $message }} </span>
                        @enderror



                    </div>
                    <div>
                        <div class="flex space-x-2 items-center my-2">
                            <label class="block text-sm font-medium mb-1" for="name">Pass Mark</label>
                            <span class="text-rose-500">*</span>
                        </div>
                        <input id="amount" class="form-input w-20" name="pass_mark[] " type="number"
                           />
                        @error('pass_mark')
                            <span class="  text-red-400  text-sm p-1"> {{ $message }} </span>
                        @enderror



                    </div>
                    <div>
                        <div class="flex space-x-2 items-center my-2">
                            <label class="block text-sm font-medium mb-1" for="name"> Mark</label>
                            <span class="text-rose-500">*</span>
                        </div>
                        <input id="amount" class="form-input w-20" name="subjective_mark[] " type="number"
                           />
                        @error('subjective_mark')
                            <span class="  text-red-400  text-sm p-1"> {{ $message }} </span>
                        @enderror



                    </div>
                </div>
            </div>


            <div class=' content space-y-4 '>

            </div>


            <div class="bg-indigo-500 p-2 rounded-sm w-max cursor-pointer btnAdd">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </div>
            <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white sm:w-[150px] w-full ">Submit</button>

        </form>

    </main>
    <script type="module" defer>
    $(document).ready(function(){
$(".btnAdd").on("click", function(){

    var container = `
    <div class=" sm:flex grid-cols-3 gap-7 w-full  sm:space-y-0 space-y-6 ">
      <div class=''>
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="name">Student Subject</label>
                        <span class="text-rose-500">*</span>
                       </div>

                       <select name="subject_id[]" class="form-select w-full" id="class_id">
                        <option value="" selected=""  disabled="" > Select student class</option>
                        @foreach ( $subject as $key => $value )
                        <option value={{ $value->id}} > {{ $value->name}} </option>

                        @endforeach
                       </select>

                </div>
                <div class="grid grid-cols-3  gap-3">
    <div>
        <div class="flex space-x-2 items-center my-2">
            <label class="block text-sm font-medium mb-1" for="name">Full Mark</label>
            <span class="text-rose-500">*</span>
        </div>
        <input id="amount" class="form-input w-20" name="full_mark[] " type="number"
             />
        @error('amount')
            <span class="  text-red-400  text-sm p-1"> {{ $message }} </span>
        @enderror



    </div>
       <div>
        <div class="flex space-x-2 items-center my-2">
            <label class="block text-sm font-medium mb-1" for="name">Pass Mark</label>
            <span class="text-rose-500">*</span>
        </div>
        <input id="amount" class="form-input w-20" name="pass_mark[] " type="number"
             />
        @error('pass_mark')
            <span class="  text-red-400  text-sm p-1"> {{ $message }} </span>
        @enderror



    </div>
      <div>
        <div class="flex space-x-2 items-center my-2">
            <label class="block text-sm font-medium mb-1" for="name">Subjective Mark</label>
            <span class="text-rose-500">*</span>
        </div>
        <input id="amount" class="form-input w-20" name="subjective_mark[] " type="number"
             />
        @error('subjective_mark')
            <span class="  text-red-400  text-sm p-1"> {{ $message }} </span>
        @enderror



    </div>
</div>
                <div class="flex space-x-2 items-end my-2">
                <div class="bg-red-500 text-white p-2    w-max cursor-pointer btndelete rounded-sm">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                      </svg>

                </div>
            </div>
        </div>
                `;

    $('.content').append(container);



})


$(document).on('click', '.btndelete', function() {
$(this).parent().parent().remove();
  });
    })

</script>
@endsection
