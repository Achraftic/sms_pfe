



@extends('admin.admin_master')
@section('content')
    <main>



        <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto min-h-[80vh] mt-5 ">

            <!-- Page header -->
            <div class="sm:flex sm:justify-between sm:items-center mb-5">

                <!-- Left: Title -->
                <div class="mb-4 sm:mb-0">
                    <h1 class="text-2xl md:text-3xl text-slate-700 font-bold">Student List </h1>
                </div>

                <!-- Right: Actions -->
                <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                    <!-- Search form -->
                    {{-- <form class="relative">
                        <label for="action-search" class="sr-only">Search</label>
                        <input id="action-search" class="form-input pl-9 focus:border-slate-300" type="search"
                            placeholder="Search by invoice ID…" />
                        <button class="absolute inset-0 right-auto group" type="submit" aria-label="Search">
                            <svg class="w-4 h-4 shrink-0 fill-current text-slate-400 group-hover:text-slate-500 ml-3 mr-2"
                                viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z" />
                                <path
                                    d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z" />
                            </svg>
                        </button>
                    </form> --}}

                    <!-- Create invoice button -->
                    <a href=" {{ route('student.create') }} " class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                        <svg class="w-4 h-4 fill-current opacity-50 shrink-0 hover:rotate-180" viewBox="0 0 16 16">
                            <path
                                d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                        </svg>
                        <span class="hidden xs:block ml-2">Fee Amount Of Registration</span>
                    </a>

                </div>



            </div>
            <!--Search-->
            <form id="formSeach" method='get' action=" {{ route('student.fee.search') }} "
                class=" space-x-3 my-6 grid grid-cols-3 ">
                <div>
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="name">Year</label>

                    </div>
                    <select name="year" class=" form-input border-slate-200 outline-none w-full" id="">
                        <option value="" selected="" disabled=""> Select Year</option>
                        @foreach ($YearStudent as $year)
                            <option value="{{ $year->id }}" {{ $year_id == $year->id ? 'selected' : '' }}>
                                {{ $year->name }} </option>
                        @endforeach

                    </select>

                    @error('year_id')
                        <span class="  text-red-400  text-sm p-1"> {{ $message }} </span>
                    @enderror
                </div>
                <div>
                    <div class="flex space-x-2 items-center my-2">
                        <label class="block text-sm font-medium mb-1" for="name">class</label>

                    </div>
                    <select name="class" class=" form-input border-slate-200 outline-none w-full" id="">
                        <option value="" selected="" disabled=""> Select Class</option>
                        @foreach ($StudentClass as $class)
                            <option value="{{ $class->id }}" {{ $class_id == $class->id ? 'selected' : '' }}>
                                {{ $class->name }} </option>
                        @endforeach


                    </select>

                    @error('year_id')
                        <span class="  text-red-400  text-sm p-1"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="flex items-end">
                    <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white sm:w-[100px] w-max space-x-1 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>

                        <span class="sm:block hidden">Search</span> </button>
                </div>


            </form>

<div></div>

@if ( $tableHtml=="false")

<div></div>





@else
        <!-- Table -->
      <div class="bg-white shadow-lg rounded-sm border border-slate-200 mb-8">
                <header class="px-5 py-4">
                    <h2 class="font-semibold text-slate-700"> Years <span class="text-slate-400 font-medium">
                            ({{ count($data) }})</span></h2>
                </header>
                <div x-data="handleSelect">

                    <!-- Table -->
                    <div class="overflow-x-auto">
                    @if ( $tableHtml!="false")
 {!! $tableHtml !!}
                    @endif
                    </div>
                </div>
            </div>



            <script>
                // A basic demo function to handle "select all" functionality
                document.addEventListener('alpine:init', () => {
                    Alpine.data('handleSelect', () => ({
                        selectall: false,
                        selectAction() {
                            countEl = document.querySelector('.table-items-action');
                            if (!countEl) return;
                            checkboxes = document.querySelectorAll('input.table-item:checked');
                            document.querySelector('.table-items-count').innerHTML = checkboxes.length;
                            if (checkboxes.length > 0) {
                                countEl.classList.remove('hidden');
                            } else {
                                countEl.classList.add('hidden');
                            }
                        },
                        toggleAll() {
                            this.selectall = !this.selectall;
                            checkboxes = document.querySelectorAll('input.table-item');
                            [...checkboxes].map((el) => {
                                el.checked = this.selectall;
                            });
                            this.selectAction();
                        },
                        uncheckParent() {
                            this.selectall = false;
                            document.getElementById('parent-checkbox').checked = false;
                            this.selectAction();
                        }
                    }))
                })
            </script>

            <!-- Pagination -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <nav class="mb-4 sm:mb-0 sm:order-1" role="navigation" aria-label="Navigation">
                    <ul class="flex justify-center">
                        <li class="ml-3 first:ml-0">
                            <a class="btn bg-white border-slate-200 text-slate-300 cursor-not-allowed" href="#0"
                                disabled>&lt;- Previous</a>
                        </li>
                        <li class="ml-3 first:ml-0">
                            <a class="btn bg-white border-slate-200 hover:border-slate-300 text-indigo-500"
                                href="#0">Next -&gt;</a>
                        </li>
                    </ul>
                </nav>
                <div class="text-sm text-slate-500 text-center sm:text-left">
                    Showing <span class="font-medium text-slate-600">1</span> to <span
                        class="font-medium text-slate-600">10</span> of <span
                        class="font-medium text-slate-600">467</span> results
                </div>
            </div>
            @endif
        </div>
    </main>
@endsection
