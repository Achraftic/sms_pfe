@extends('admin.admin_master')
@section('content')
    <main class=" md:p-10 p-6 min-h-screen">

        <form action="{{ route('fee.amount.update',$data['0']->fee_category_id) }} " method="post"
            class=" md:p-10 p-6  space-y-8 gap-4 w-[90%] sm:w-[80%] rounded-xl mx-auto my-10 bg-white shadow-lg">
            @csrf
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">Add Fee Category</h1>
            </div>
            {{-- input field --}}
            <div class=" gap-7   sm:space-y-0 space-y-6">






                @foreach ($data as $i)
                <div class=" gap-7 sm:grid grid-cols-2    sm:space-y-0 space-y-6">
                    <div class="col-span-2 mb-4 ">
                        <div class="flex space-x-2 items-center my-2">
                            <label class="block text-sm font-medium mb-1" for="name">Fee Category</label>
                            <span class="text-rose-500">*</span>
                        </div>

                        <select name="fee_category_id" class="form-select w-full" id="fee_category_id">
                            <option value="" selected="" disabled=""> Select fee category</option>
                            @foreach ($fee_category as $key => $value)
                                <option value="{{ $value->id }}"
                                    {{ $data['0']->fee_category_id == $value->id ? 'selected' : '' }}>
                                    {{ $value->name }} </option>
                            @endforeach


                        </select>

                    </div>
                    <div>
                        <div class="flex space-x-2 items-center my-2">
                            <label class="block text-sm font-medium mb-1" for="name">Student Class</label>
                            <span class="text-rose-500">*</span>
                        </div>

                        <select name="class_id[] " class="form-select w-full" id="class_id">
                            <option value="" selected="" disabled=""> Select student class</option>
                            @foreach ($stdent_class as $key => $value)
                                <option value="{{ $value->id }}" {{($i->class_id == $value->id) ? "selected" : ""}} >
              {{$value->name}}
                                </option>
                            @endforeach

                        </select>

                    </div>
                    <div>
                        <div class="flex space-x-2 items-center my-2">
                            <label class="block text-sm font-medium mb-1" for="name">Fee Amount</label>
                            <span class="text-rose-500">*</span>
                        </div>
                        <input id="amount" class="form-input w-full" name="amount[]" value="{{ $i->amount }}"
                            type="number" placeholder="Fee Amount" />
                        @error('amount')
                            <span class="  text-red-400  text-sm p-1"> {{ $message }} </span>
                        @enderror



                    </div>



                    <div class="bg-red-500 text-white p-2    w-max cursor-pointer btndelete rounded-sm">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                          </svg>

                    </div>

                    </div>


                @endforeach

            </div>



            <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white sm:w-[150px] w-full ">Submit</button>

        </form>

    </main>

    <script type="module" defer>
        $(document).ready(function(){



    $(document).on('click', '.btndelete', function() {
    $(this).parent().remove();
      });
        })

    </script>
@endsection
