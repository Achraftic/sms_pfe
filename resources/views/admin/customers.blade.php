
           @extends('admin.admin_master')
           @section('content')
            <main>
                <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

                    <!-- Page header -->
                    <div class="sm:flex sm:justify-between sm:items-center mb-8">

                        <!-- Left: Title -->
                        <div class="mb-4 sm:mb-0">
                            <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">Customers ✨</h1>
                        </div>

                        <!-- Right: Actions -->
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

                            <!-- Add customer button -->
                            <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                                <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                                    <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                                </svg>
                                <span class="hidden xs:block ml-2">Add Customer</span>
                            </button>

                        </div>

                    </div>

                    <!-- Table -->
                    <div class="bg-white shadow-lg rounded-sm border border-slate-200">
                        <header class="px-5 py-4">
                            <h2 class="font-semibold text-slate-800">All Customers <span class="text-slate-400 font-medium">248</span></h2>
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
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                                <span class="sr-only">Favourite</span>
                                            </th>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold text-left">Order</div>
                                            </th>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold text-left">Email</div>
                                            </th>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold text-left">Location</div>
                                            </th>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold">Orders</div>
                                            </th>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold text-left">Last order</div>
                                            </th>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold text-left">Total spent</div>
                                            </th>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold">Refunds</div>
                                            </th>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <span class="sr-only">Menu</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <!-- Table body -->
                                    <tbody class="text-sm divide-y divide-slate-200">
                                        <!-- Row -->
                                        <tr>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                                <div class="flex items-center">
                                                    <label class="inline-flex">
                                                        <span class="sr-only">Select</span>
                                                        <input class="table-item form-checkbox" type="checkbox" @click="uncheckParent" />
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                                <div class="flex items-center relative">
                                                    <button>
                                                        <svg class="w-4 h-4 shrink-0 fill-current text-amber-500" viewBox="0 0 16 16">
                                                            <path d="M8 0L6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934h-6L8 0z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="w-10 h-10 shrink-0 mr-2 sm:mr-3">
                                                        <img class="rounded-full" src="./images/user-40-01.jpg" width="40" height="40" alt="User 01" />
                                                    </div>
                                                    <div class="font-medium text-slate-800">Patricia Semklo</div>
                                                </div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left">patricia.semklo@app.com</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left">🇬🇧 London, UK</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-center">24</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left font-medium text-sky-500">#123567</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left font-medium text-emerald-500">$2,890.66</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-center">-</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                                <button class="text-slate-400 hover:text-slate-500 rounded-full">
                                                    <span class="sr-only">Menu</span>
                                                    <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                                                        <circle cx="16" cy="16" r="2" />
                                                        <circle cx="10" cy="16" r="2" />
                                                        <circle cx="22" cy="16" r="2" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Row -->
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
                                                <div class="flex items-center relative">
                                                    <button>
                                                        <svg class="w-4 h-4 shrink-0 fill-current text-slate-300" viewBox="0 0 16 16">
                                                            <path d="M8 0L6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934h-6L8 0z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="w-10 h-10 shrink-0 mr-2 sm:mr-3">
                                                        <img class="rounded-full" src="./images/user-40-02.jpg" width="40" height="40" alt="User 02" />
                                                    </div>
                                                    <div class="font-medium text-slate-800">Dominik Lamakani</div>
                                                </div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left">dominik.lamakani@gmail.com</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left">🇩🇪 Dortmund, DE</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-center">77</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left font-medium text-sky-500">#779912</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left font-medium text-emerald-500">$14,767.04</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-center">4</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                                <button class="text-slate-400 hover:text-slate-500 rounded-full">
                                                    <span class="sr-only">Menu</span>
                                                    <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                                                        <circle cx="16" cy="16" r="2" />
                                                        <circle cx="10" cy="16" r="2" />
                                                        <circle cx="22" cy="16" r="2" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Row -->
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
                                                <div class="flex items-center relative">
                                                    <button>
                                                        <svg class="w-4 h-4 shrink-0 fill-current text-amber-500" viewBox="0 0 16 16">
                                                            <path d="M8 0L6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934h-6L8 0z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="w-10 h-10 shrink-0 mr-2 sm:mr-3">
                                                        <img class="rounded-full" src="./images/user-40-03.jpg" width="40" height="40" alt="User 03" />
                                                    </div>
                                                    <div class="font-medium text-slate-800">Ivan Mesaros</div>
                                                </div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left">imivanmes@gmail.com</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left">🇫🇷 Paris, FR</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-center">44</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left font-medium text-sky-500">#889924</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left font-medium text-emerald-500">$4,996.00</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-center">1</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                                <button class="text-slate-400 hover:text-slate-500 rounded-full">
                                                    <span class="sr-only">Menu</span>
                                                    <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                                                        <circle cx="16" cy="16" r="2" />
                                                        <circle cx="10" cy="16" r="2" />
                                                        <circle cx="22" cy="16" r="2" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Row -->
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
                                                <div class="flex items-center relative">
                                                    <button>
                                                        <svg class="w-4 h-4 shrink-0 fill-current text-slate-300" viewBox="0 0 16 16">
                                                            <path d="M8 0L6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934h-6L8 0z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="w-10 h-10 shrink-0 mr-2 sm:mr-3">
                                                        <img class="rounded-full" src="./images/user-40-04.jpg" width="40" height="40" alt="User 04" />
                                                    </div>
                                                    <div class="font-medium text-slate-800">Maria Martinez</div>
                                                </div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left">martinezhome@gmail.com</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left">🇮🇹 Bologna, IT</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-center">29</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left font-medium text-sky-500">#897726</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left font-medium text-emerald-500">$3,220.66</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-center">2</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                                <button class="text-slate-400 hover:text-slate-500 rounded-full">
                                                    <span class="sr-only">Menu</span>
                                                    <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                                                        <circle cx="16" cy="16" r="2" />
                                                        <circle cx="10" cy="16" r="2" />
                                                        <circle cx="22" cy="16" r="2" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Row -->
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
                                                <div class="flex items-center relative">
                                                    <button>
                                                        <svg class="w-4 h-4 shrink-0 fill-current text-amber-500" viewBox="0 0 16 16">
                                                            <path d="M8 0L6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934h-6L8 0z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="w-10 h-10 shrink-0 mr-2 sm:mr-3">
                                                        <img class="rounded-full" src="./images/user-40-05.jpg" width="40" height="40" alt="User 05" />
                                                    </div>
                                                    <div class="font-medium text-slate-800">Vicky Jung</div>
                                                </div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left">itsvicky@contact.com</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left">🇬🇧 London, UK</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-center">22</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left font-medium text-sky-500">#123567</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left font-medium text-emerald-500">$2,890.66</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-center">-</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                                <button class="text-slate-400 hover:text-slate-500 rounded-full">
                                                    <span class="sr-only">Menu</span>
                                                    <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                                                        <circle cx="16" cy="16" r="2" />
                                                        <circle cx="10" cy="16" r="2" />
                                                        <circle cx="22" cy="16" r="2" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Row -->
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
                                                <div class="flex items-center relative">
                                                    <button>
                                                        <svg class="w-4 h-4 shrink-0 fill-current text-amber-500" viewBox="0 0 16 16">
                                                            <path d="M8 0L6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934h-6L8 0z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="w-10 h-10 shrink-0 mr-2 sm:mr-3">
                                                        <img class="rounded-full" src="./images/user-40-06.jpg" width="40" height="40" alt="User 06" />
                                                    </div>
                                                    <div class="font-medium text-slate-800">Tisho Yanchev</div>
                                                </div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left">tisho.y@kurlytech.com</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left">🇬🇧 London, UK</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-center">14</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left font-medium text-sky-500">#896644</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left font-medium text-emerald-500">$1,649.99</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-center">1</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                                <button class="text-slate-400 hover:text-slate-500 rounded-full">
                                                    <span class="sr-only">Menu</span>
                                                    <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                                                        <circle cx="16" cy="16" r="2" />
                                                        <circle cx="10" cy="16" r="2" />
                                                        <circle cx="22" cy="16" r="2" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Row -->
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
                                                <div class="flex items-center relative">
                                                    <button>
                                                        <svg class="w-4 h-4 shrink-0 fill-current text-amber-500" viewBox="0 0 16 16">
                                                            <path d="M8 0L6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934h-6L8 0z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="w-10 h-10 shrink-0 mr-2 sm:mr-3">
                                                        <img class="rounded-full" src="./images/user-40-07.jpg" width="40" height="40" alt="User 07" />
                                                    </div>
                                                    <div class="font-medium text-slate-800">James Cameron</div>
                                                </div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left">james.ceo@james.tech</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left">🇫🇷 Marseille, FR</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-center">34</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left font-medium text-sky-500">#136988</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left font-medium text-emerald-500">$3,569.87</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-center">2</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                                <button class="text-slate-400 hover:text-slate-500 rounded-full">
                                                    <span class="sr-only">Menu</span>
                                                    <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                                                        <circle cx="16" cy="16" r="2" />
                                                        <circle cx="10" cy="16" r="2" />
                                                        <circle cx="22" cy="16" r="2" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Row -->
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
                                                <div class="flex items-center relative">
                                                    <button>
                                                        <svg class="w-4 h-4 shrink-0 fill-current text-slate-300" viewBox="0 0 16 16">
                                                            <path d="M8 0L6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934h-6L8 0z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="w-10 h-10 shrink-0 mr-2 sm:mr-3">
                                                        <img class="rounded-full" src="./images/user-40-08.jpg" width="40" height="40" alt="User 08" />
                                                    </div>
                                                    <div class="font-medium text-slate-800">Haruki Masuno</div>
                                                </div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left">haruki@supermail.jp</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left">🇯🇵 Tokio, JP</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-center">112</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left font-medium text-sky-500">#442206</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left font-medium text-emerald-500">$19,246.07</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-center">6</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                                <button class="text-slate-400 hover:text-slate-500 rounded-full">
                                                    <span class="sr-only">Menu</span>
                                                    <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                                                        <circle cx="16" cy="16" r="2" />
                                                        <circle cx="10" cy="16" r="2" />
                                                        <circle cx="22" cy="16" r="2" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Row -->
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
                                                <div class="flex items-center relative">
                                                    <button>
                                                        <svg class="w-4 h-4 shrink-0 fill-current text-amber-500" viewBox="0 0 16 16">
                                                            <path d="M8 0L6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934h-6L8 0z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="w-10 h-10 shrink-0 mr-2 sm:mr-3">
                                                        <img class="rounded-full" src="./images/user-40-09.jpg" width="40" height="40" alt="User 09" />
                                                    </div>
                                                    <div class="font-medium text-slate-800">Joe Huang</div>
                                                </div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left">joehuang@hotmail.com</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left">🇨🇳 Shanghai, CN</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-center">64</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left font-medium text-sky-500">#764321</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left font-medium text-emerald-500">$12,276.92</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-center">-</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                                <button class="text-slate-400 hover:text-slate-500 rounded-full">
                                                    <span class="sr-only">Menu</span>
                                                    <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                                                        <circle cx="16" cy="16" r="2" />
                                                        <circle cx="10" cy="16" r="2" />
                                                        <circle cx="22" cy="16" r="2" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Row -->
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
                                                <div class="flex items-center relative">
                                                    <button>
                                                        <svg class="w-4 h-4 shrink-0 fill-current text-slate-300" viewBox="0 0 16 16">
                                                            <path d="M8 0L6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934h-6L8 0z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="w-10 h-10 shrink-0 mr-2 sm:mr-3">
                                                        <img class="rounded-full" src="./images/user-40-10.jpg" width="40" height="40" alt="User 10" />
                                                    </div>
                                                    <div class="font-medium text-slate-800">Carolyn McNeail</div>
                                                </div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left">carolynlove@gmail.com</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left">🇮🇹 Milan, IT</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-center">19</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left font-medium text-sky-500">#908764</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left font-medium text-emerald-500">$1,289.97</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-center">2</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                                <button class="text-slate-400 hover:text-slate-500 rounded-full">
                                                    <span class="sr-only">Menu</span>
                                                    <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                                                        <circle cx="16" cy="16" r="2" />
                                                        <circle cx="10" cy="16" r="2" />
                                                        <circle cx="22" cy="16" r="2" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
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
                    <div class="mt-8">
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

                </div>
            </main>

            @endsection
