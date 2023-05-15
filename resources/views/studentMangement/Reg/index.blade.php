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
                    <form class="relative">
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
                    </form>

                    <!-- Create invoice button -->
                    <a href=" {{ route('student.create') }} " class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                        <svg class="w-4 h-4 fill-current opacity-50 shrink-0 hover:rotate-180" viewBox="0 0 16 16">
                            <path
                                d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                        </svg>
                        <span class="hidden xs:block ml-2">Add Student</span>
                    </a>

                </div>



            </div>
            <!--Search-->
            <form id="formSeach" method='get' action=" {{ route('student.search') }} "
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

            <!-- More actions -->
            {{-- <div class="sm:flex sm:justify-between sm:items-center mb-5">

                <!-- Left side -->
                <div class="mb-4 sm:mb-0">
                    <ul class="flex flex-wrap -m-1">
                        <li class="m-1">
                            <button
                                class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-3 py-1 border border-transparent shadow-sm bg-indigo-500 text-white duration-150 ease-in-out">All
                                <span class="ml-1 text-indigo-200"> {{ count($data) }} </span></button>
                        </li>
                        <li class="m-1">
                            <button
                                class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-3 py-1 border border-slate-200 hover:border-slate-300 shadow-sm bg-white text-slate-500 duration-150 ease-in-out">Paid
                                <span class="ml-1 text-slate-400">14</span></button>
                        </li>
                        <li class="m-1">
                            <button
                                class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-3 py-1 border border-slate-200 hover:border-slate-300 shadow-sm bg-white text-slate-500 duration-150 ease-in-out">Due
                                <span class="ml-1 text-slate-400">34</span></button>
                        </li>
                        <li class="m-1">
                            <button
                                class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-3 py-1 border border-slate-200 hover:border-slate-300 shadow-sm bg-white text-slate-500 duration-150 ease-in-out">Overdue
                                <span class="ml-1 text-slate-400">19</span></button>
                        </li>
                    </ul>
                </div>

                <!-- Right side -->
                <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                    <!-- Delete button -->
                    <div class="table-items-action hidden">
                        <div class="flex items-center">
                            <div class="hidden xl:block text-sm italic mr-2 whitespace-nowrap"><span
                                    class="table-items-count"></span> items selected</div>
                            <button
                                class="btn bg-white border-slate-200 hover:border-slate-300 text-rose-500 hover:text-rose-600">Delete</button>
                        </div>
                    </div>

                    <!-- Dropdown -->
                    <div class="relative" x-data="{ open: false, selected: 2 }">
                        <button
                            class="btn justify-between min-w-44 bg-white border-slate-200 hover:border-slate-300 text-slate-500 hover:text-slate-600"
                            aria-label="Select date range" aria-haspopup="true" @click.prevent="open = !open"
                            :aria-expanded="open">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 fill-current text-slate-500 shrink-0 mr-2" viewBox="0 0 16 16">
                                    <path
                                        d="M15 2h-2V0h-2v2H9V0H7v2H5V0H3v2H1a1 1 0 00-1 1v12a1 1 0 001 1h14a1 1 0 001-1V3a1 1 0 00-1-1zm-1 12H2V6h12v8z" />
                                </svg>
                                <span x-text="$refs.options.children[selected].children[1].innerHTML"></span>
                            </span>
                            <svg class="shrink-0 ml-1 fill-current text-slate-400" width="11" height="7"
                                viewBox="0 0 11 7">
                                <path d="M5.4 6.8L0 1.4 1.4 0l4 4 4-4 1.4 1.4z" />
                            </svg>
                        </button>
                        <div class="z-10 absolute top-full right-0 w-full bg-white border border-slate-200 py-1.5 rounded shadow-lg overflow-hidden mt-1"
                            @click.outside="open = false" @keydown.escape.window="open = false" x-show="open"
                            x-transition:enter="transition ease-out duration-100 transform"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-out duration-100" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0" x-cloak>
                            <div class="font-medium text-sm text-slate-600" x-ref="options">
                                <button tabindex="0"
                                    class="flex items-center w-full hover:bg-slate-50 py-1 px-3 cursor-pointer"
                                    :class="selected === 0 && 'text-indigo-500'" @click="selected = 0;open = false"
                                    @focus="open = true" @focusout="open = false">
                                    <svg class="shrink-0 mr-2 fill-current text-indigo-500"
                                        :class="selected !== 0 && 'invisible'" width="12" height="9"
                                        viewBox="0 0 12 9">
                                        <path
                                            d="M10.28.28L3.989 6.575 1.695 4.28A1 1 0 00.28 5.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28.28z" />
                                    </svg>
                                    <span>Today</span>
                                </button>
                                <button tabindex="0"
                                    class="flex items-center w-full hover:bg-slate-50 py-1 px-3 cursor-pointer"
                                    :class="selected === 1 && 'text-indigo-500'" @click="selected = 1;open = false"
                                    @focus="open = true" @focusout="open = false">
                                    <svg class="shrink-0 mr-2 fill-current text-indigo-500"
                                        :class="selected !== 1 && 'invisible'" width="12" height="9"
                                        viewBox="0 0 12 9">
                                        <path
                                            d="M10.28.28L3.989 6.575 1.695 4.28A1 1 0 00.28 5.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28.28z" />
                                    </svg>
                                    <span>Last 7 Days</span>
                                </button>
                                <button tabindex="0"
                                    class="flex items-center w-full hover:bg-slate-50 py-1 px-3 cursor-pointer"
                                    :class="selected === 2 && 'text-indigo-500'" @click="selected = 2;open = false"
                                    @focus="open = true" @focusout="open = false">
                                    <svg class="shrink-0 mr-2 fill-current text-indigo-500"
                                        :class="selected !== 2 && 'invisible'" width="12" height="9"
                                        viewBox="0 0 12 9">
                                        <path
                                            d="M10.28.28L3.989 6.575 1.695 4.28A1 1 0 00.28 5.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28.28z" />
                                    </svg>
                                    <span>Last Month</span>
                                </button>
                                <button tabindex="0"
                                    class="flex items-center w-full hover:bg-slate-50 py-1 px-3 cursor-pointer"
                                    :class="selected === 3 && 'text-indigo-500'" @click="selected = 3;open = false"
                                    @focus="open = true" @focusout="open = false">
                                    <svg class="shrink-0 mr-2 fill-current text-indigo-500"
                                        :class="selected !== 3 && 'invisible'" width="12" height="9"
                                        viewBox="0 0 12 9">
                                        <path
                                            d="M10.28.28L3.989 6.575 1.695 4.28A1 1 0 00.28 5.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28.28z" />
                                    </svg>
                                    <span>Last 12 Months</span>
                                </button>
                                <button tabindex="0"
                                    class="flex items-center w-full hover:bg-slate-50 py-1 px-3 cursor-pointer"
                                    :class="selected === 4 && 'text-indigo-500'" @click="selected = 4;open = false"
                                    @focus="open = true" @focusout="open = false">
                                    <svg class="shrink-0 mr-2 fill-current text-indigo-500"
                                        :class="selected !== 4 && 'invisible'" width="12" height="9"
                                        viewBox="0 0 12 9">
                                        <path
                                            d="M10.28.28L3.989 6.575 1.695 4.28A1 1 0 00.28 5.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28.28z" />
                                    </svg>
                                    <span>All Time</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Filter button -->
                    <div class="relative inline-flex">
                        <button
                            class="btn bg-white border-slate-200 hover:border-slate-300 text-slate-500 hover:text-slate-600">
                            <span class="sr-only">Filter</span><wbr>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 16 16">
                                <path
                                    d="M9 15H7a1 1 0 010-2h2a1 1 0 010 2zM11 11H5a1 1 0 010-2h6a1 1 0 010 2zM13 7H3a1 1 0 010-2h10a1 1 0 010 2zM15 3H1a1 1 0 010-2h14a1 1 0 010 2z" />
                            </svg>
                        </button>
                    </div>
                </div>

            </div> --}}

            <!-- Table -->
            <div class="bg-white shadow-lg rounded-sm border border-slate-200 mb-8">
                <header class="px-5 py-4">
                    <h2 class="font-semibold text-slate-700"> Years <span class="text-slate-400 font-medium">
                            ({{ count($data) }})</span></h2>
                </header>
                <div x-data="handleSelect">

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full">
                            <!-- Table header -->
                            <thead
                                class="text-xs font-semibold uppercase text-slate-500 bg-slate-50 border-t border-b border-slate-200">
                                <tr>

                                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                        <div class="flex items-center">
                                            <label class="inline-flex">
                                                <span class="sr-only">Select all</span>
                                                <input id="parent-checkbox" class="form-checkbox" type="checkbox"
                                                    @click="toggleAll" />
                                            </label>
                                        </div>
                                    </th>
                                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                        <div class="font-semibold text-left">Id No</div>
                                    </th>

                                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                        <div class="font-semibold text-left">Image</div>
                                    </th>

                                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                        <div class="font-semibold text-left">Name</div>
                                    </th>
                                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                        <div class="font-semibold text-left">Class</div>
                                    </th>
                                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                        <div class="font-semibold text-left">Year</div>
                                    </th>

                                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                        <div class="font-semibold text-left">Code</div>
                                    </th>

                                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                        <div class="font-semibold text-left">Actions</div>
                                    </th>
                                </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody class="text-sm divide-y divide-slate-200">


                                <!-- Row -->


                                @foreach ($data as $key => $student)
                                    <tr>
                                        <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                            <div class="flex items-center">
                                                <label class="inline-flex">
                                                    <span class="sr-only">Select</span>
                                                    <input class="table-item form-checkbox" type="checkbox"
                                                        @click="uncheckParent" />
                                                </label>
                                            </div>
                                        </td>
                                        <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                            <div class="font-medium text-sky-500"> {{ $student->student->id_no }} </div>
                                        </td>

                                        <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                            <div>
                                                <img src=" {{ asset('studentImage/' . $student->student->image) }} "
                                                    alt="" class="w-10 h-10 object-cover rounded-full">


                                            </div>
                                        </td>

                                        <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                            <div class="font-medium text-slate-700"> {{ $student->student->name }} </div>
                                        </td>
                                        <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                            <div class="font-medium text-slate-700"> {{ $student->class->name }} </div>
                                        </td>
                                        <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                            <div class="font-medium text-slate-700"> {{ $student->year->name }} </div>
                                        </td>
                                        {{-- @if (Auth::user()->userType == 'Admin')
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-medium text-slate-700"> {{ $student->role }} </div>
                                            </td>
                                        @endif --}}
                                        <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                            <div class="font-medium text-slate-700"> {{ $student->student->code }} </div>
                                        </td>



                                        <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px md:w-32">
                                            <div class=" grid grid-cols-3 space-x-1  items-center">
                                                <span> <a href=" {{ route('student.edit', $student->student_id) }} "
                                                        class=" text-slate-400 hover:text-slate-600 rounded-full">
                                                        <span class="sr-only">Edit</span>
                                                        <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                                                            <path
                                                                d="M19.7 8.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM12.6 22H10v-2.6l6-6 2.6 2.6-6 6zm7.4-7.4L17.4 12l1.6-1.6 2.6 2.6-1.6 1.6z" />
                                                        </svg>
                                                    </a>
                                                </span>
                                                <span> <a href=" {{ route('student.promotion', $student->student_id) }} "
                                                        class="text-green-500 hover:text-green-600 rounded-full  "
                                                        id="">
                                                        <span class="sr-only">Delete</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>

                                                    </a>
                                                </span>
                                                <span>
                                                    <a href=" {{ route('student.viewPdf', $student->student_id) }} "
                                                        class="text-indigo-500 hover:text-indigo-600 rounded-full">
                                                        <span class="sr-only">view</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="2.1" stroke="currentColor"
                                                            class="w-[22px] h-[22px]">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        </svg>

                                                    </a></span>




                                            </div>
                                        </td>
                                    </tr>
                                @endforeach



                            </tbody>
                        </table>

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

        </div>
   
    </main>
@endsection
