

@extends('admin.admin_master')
@section('content')

<main>



    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto min-h-[80vh] mt-5 ">

        <!-- Page header -->
        <div class="sm:flex sm:justify-between sm:items-center mb-5">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">Subject</h1>
            </div>

            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                <!-- Search form -->
                <form class="relative">
                    <label for="action-search" class="sr-only">Search</label>
                    <input id="action-search" class="form-input pl-9 focus:border-slate-300" type="search" placeholder="Search by invoice ID…" />
                    <button class="absolute inset-0 right-auto group" type="submit" aria-label="Search">
                        <svg class="w-4 h-4 shrink-0 fill-current text-slate-400 group-hover:text-slate-500 ml-3 mr-2" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z" />
                            <path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z" />
                        </svg>
                    </button>
                </form>

                <!-- Create invoice button -->
                <a  href=" {{route('school.subject.create')}} " class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                    <svg class="w-4 h-4 fill-current opacity-50 shrink-0 hover:rotate-180" viewBox="0 0 16 16">
                        <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                    </svg>
                    <span class="hidden xs:block ml-2">Add Subject</span>
                </a>

            </div>

        </div>

        <!-- More actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-5">

            <!-- Left side -->
            <div class="mb-4 sm:mb-0">
                <ul class="flex flex-wrap -m-1">
                    <li class="m-1">
                        <button class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-3 py-1 border border-transparent shadow-sm bg-indigo-500 text-white duration-150 ease-in-out">All <span class="ml-1 text-indigo-200"> {{count($data) }} </span></button>
                    </li>
                    <li class="m-1">
                        <button class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-3 py-1 border border-slate-200 hover:border-slate-300 shadow-sm bg-white text-slate-500 duration-150 ease-in-out">Paid <span class="ml-1 text-slate-400">14</span></button>
                    </li>
                    <li class="m-1">
                        <button class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-3 py-1 border border-slate-200 hover:border-slate-300 shadow-sm bg-white text-slate-500 duration-150 ease-in-out">Due <span class="ml-1 text-slate-400">34</span></button>
                    </li>
                    <li class="m-1">
                        <button class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-3 py-1 border border-slate-200 hover:border-slate-300 shadow-sm bg-white text-slate-500 duration-150 ease-in-out">Overdue <span class="ml-1 text-slate-400">19</span></button>
                    </li>
                </ul>
            </div>

            <!-- Right side -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                <!-- Delete button -->
                <div class="table-items-action hidden">
                    <div class="flex items-center">
                        <div class="hidden xl:block text-sm italic mr-2 whitespace-nowrap"><span class="table-items-count"></span> items selected</div>
                        <button class="btn bg-white border-slate-200 hover:border-slate-300 text-rose-500 hover:text-rose-600">Delete</button>
                    </div>
                </div>

                <!-- Dropdown -->
                <div class="relative" x-data="{ open: false, selected: 2 }">
                    <button
                        class="btn justify-between min-w-44 bg-white border-slate-200 hover:border-slate-300 text-slate-500 hover:text-slate-600"
                        aria-label="Select date range"
                        aria-haspopup="true"
                        @click.prevent="open = !open"
                        :aria-expanded="open"
                    >
                        <span class="flex items-center">
                            <svg class="w-4 h-4 fill-current text-slate-500 shrink-0 mr-2" viewBox="0 0 16 16">
                                <path d="M15 2h-2V0h-2v2H9V0H7v2H5V0H3v2H1a1 1 0 00-1 1v12a1 1 0 001 1h14a1 1 0 001-1V3a1 1 0 00-1-1zm-1 12H2V6h12v8z" />
                            </svg>
                            <span x-text="$refs.options.children[selected].children[1].innerHTML"></span>
                        </span>
                        <svg class="shrink-0 ml-1 fill-current text-slate-400" width="11" height="7" viewBox="0 0 11 7">
                            <path d="M5.4 6.8L0 1.4 1.4 0l4 4 4-4 1.4 1.4z" />
                        </svg>
                    </button>
                    <div
                        class="z-10 absolute top-full right-0 w-full bg-white border border-slate-200 py-1.5 rounded shadow-lg overflow-hidden mt-1"
                        @click.outside="open = false"
                        @keydown.escape.window="open = false"
                        x-show="open"
                        x-transition:enter="transition ease-out duration-100 transform"
                        x-transition:enter-start="opacity-0 -translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-out duration-100"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        x-cloak
                    >
                        <div class="font-medium text-sm text-slate-600" x-ref="options">
                            <button
                                tabindex="0"
                                class="flex items-center w-full hover:bg-slate-50 py-1 px-3 cursor-pointer"
                                :class="selected === 0 && 'text-indigo-500'"
                                @click="selected = 0;open = false"
                                @focus="open = true"
                                @focusout="open = false"
                            >
                                <svg class="shrink-0 mr-2 fill-current text-indigo-500" :class="selected !== 0 && 'invisible'" width="12" height="9" viewBox="0 0 12 9">
                                    <path d="M10.28.28L3.989 6.575 1.695 4.28A1 1 0 00.28 5.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28.28z" />
                                </svg>
                                <span>Today</span>
                            </button>
                            <button
                                tabindex="0"
                                class="flex items-center w-full hover:bg-slate-50 py-1 px-3 cursor-pointer"
                                :class="selected === 1 && 'text-indigo-500'"
                                @click="selected = 1;open = false"
                                @focus="open = true"
                                @focusout="open = false"
                            >
                                <svg class="shrink-0 mr-2 fill-current text-indigo-500" :class="selected !== 1 && 'invisible'" width="12" height="9" viewBox="0 0 12 9">
                                    <path d="M10.28.28L3.989 6.575 1.695 4.28A1 1 0 00.28 5.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28.28z" />
                                </svg>
                                <span>Last 7 Days</span>
                            </button>
                            <button
                                tabindex="0"
                                class="flex items-center w-full hover:bg-slate-50 py-1 px-3 cursor-pointer"
                                :class="selected === 2 && 'text-indigo-500'"
                                @click="selected = 2;open = false"
                                @focus="open = true"
                                @focusout="open = false"
                            >
                                <svg class="shrink-0 mr-2 fill-current text-indigo-500" :class="selected !== 2 && 'invisible'" width="12" height="9" viewBox="0 0 12 9">
                                    <path d="M10.28.28L3.989 6.575 1.695 4.28A1 1 0 00.28 5.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28.28z" />
                                </svg>
                                <span>Last Month</span>
                            </button>
                            <button
                                tabindex="0"
                                class="flex items-center w-full hover:bg-slate-50 py-1 px-3 cursor-pointer"
                                :class="selected === 3 && 'text-indigo-500'"
                                @click="selected = 3;open = false"
                                @focus="open = true"
                                @focusout="open = false"
                            >
                                <svg class="shrink-0 mr-2 fill-current text-indigo-500" :class="selected !== 3 && 'invisible'" width="12" height="9" viewBox="0 0 12 9">
                                    <path d="M10.28.28L3.989 6.575 1.695 4.28A1 1 0 00.28 5.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28.28z" />
                                </svg>
                                <span>Last 12 Months</span>
                            </button>
                            <button
                                tabindex="0"
                                class="flex items-center w-full hover:bg-slate-50 py-1 px-3 cursor-pointer"
                                :class="selected === 4 && 'text-indigo-500'"
                                @click="selected = 4;open = false"
                                @focus="open = true"
                                @focusout="open = false"
                            >
                                <svg class="shrink-0 mr-2 fill-current text-indigo-500" :class="selected !== 4 && 'invisible'" width="12" height="9" viewBox="0 0 12 9">
                                    <path d="M10.28.28L3.989 6.575 1.695 4.28A1 1 0 00.28 5.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28.28z" />
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
                            <path d="M9 15H7a1 1 0 010-2h2a1 1 0 010 2zM11 11H5a1 1 0 010-2h6a1 1 0 010 2zM13 7H3a1 1 0 010-2h10a1 1 0 010 2zM15 3H1a1 1 0 010-2h14a1 1 0 010 2z" />
                        </svg>
                    </button>
                </div>
            </div>

        </div>

        <!-- Table -->
        <div class="bg-white shadow-lg rounded-sm border border-slate-200 mb-8">
            <header class="px-5 py-4">
                <h2 class="font-semibold text-slate-800"> ExamType <span class="text-slate-400 font-medium"> ({{  count($data) }})</span></h2>
            </header>
            <div x-data="handleSelect">

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <!-- Table header -->
                        <thead class="text-xs font-semibold uppercase text-slate-500 bg-slate-50 border-t border-b border-slate-200">
                            <tr>
                                <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                    <div class="flex items-center">
                                        <label class="inline-flex">
                                            <span class="sr-only">Select all</span>
                                            <input id="parent-checkbox" class="form-checkbox" type="checkbox" @click="toggleAll" />
                                        </label>
                                    </div>
                                </th>
                                <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                    <div class="font-semibold text-left">ID</div>
                                </th>

                                <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                    <div class="font-semibold text-left">Name</div>
                                </th>

                                <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                    <div class="font-semibold text-left">Date Creation</div>
                                </th>

                                <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                    <div class="font-semibold text-left">Actions</div>
                                </th>
                            </tr>
                        </thead>
                        <!-- Table body -->
                        <tbody class="text-sm divide-y divide-slate-200">


                            <!-- Row -->


                            @foreach ($data as $key => $examType)
                            <tr>
                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                    <div class="flex items-center">
                                        <label class="inline-flex">
                                            <span class="sr-only">Select</span>
                                            <input class="table-item form-checkbox" type="checkbox" @click="uncheckParent" />
                                        </label>
                                    </div>
                                </td>
                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                    <div class="font-medium text-sky-500">  {{$key+1}} </div>
                                </td>


                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                    <div class="font-medium text-slate-800"> {{$examType->name}} </div>
                                </td>

                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                    <div>{{  $examType->created_at }}</div>
                                </td>


                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px md:w-32">
                                    <div class="space-x-2 flex">
                                        <a href="{{route('exam.type.edit',  $examType->id)}} " class="text-slate-400 hover:text-slate-500 rounded-full">
                                            <span class="sr-only">Edit</span>
                                            <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                                                <path d="M19.7 8.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM12.6 22H10v-2.6l6-6 2.6 2.6-6 6zm7.4-7.4L17.4 12l1.6-1.6 2.6 2.6-1.6 1.6z" />
                                            </svg>
                                        </a>


                                        <a href="  " class="text-rose-500 hover:text-rose-600 rounded- delete " id="">
                                            <span class="sr-only">Delete</span>
                                            <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                                                <path d="M13 15h2v6h-2zM17 15h2v6h-2z" />
                                                <path d="M20 9c0-.6-.4-1-1-1h-6c-.6 0-1 .4-1 1v2H8v2h1v10c0 .6.4 1 1 1h12c.6 0 1-.4 1-1V13h1v-2h-4V9zm-6 1h4v1h-4v-1zm7 3v9H11v-9h10z" />
                                            </svg>
                                        </a>
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
                        <a class="btn bg-white border-slate-200 text-slate-300 cursor-not-allowed" href="#0" disabled>&lt;- Previous</a>
                    </li>
                    <li class="ml-3 first:ml-0">
                        <a class="btn bg-white border-slate-200 hover:border-slate-300 text-indigo-500" href="#0">Next -&gt;</a>
                    </li>
                </ul>
            </nav>
            <div class="text-sm text-slate-500 text-center sm:text-left">
                Showing <span class="font-medium text-slate-600">1</span> to <span class="font-medium text-slate-600">10</span> of <span class="font-medium text-slate-600">467</span> results
            </div>
        </div>

    </div>
</main>
@endsection

