<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TeslaSchool</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- <link href="./css/vendors/flatpickr.min.css" rel="stylesheet">
    <link href="./style.css" rel="stylesheet"> -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Scripts -->
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="{{ mix('js/app.js') }}" defer></script>

    <link rel="stylesheet" href=" {{ asset('design/css/vendors/flatpickr.min.css') }} ">
    <link rel="stylesheet" href=" {{ asset('design/style.css') }} ">
    <link rel="stylesheet" href=" {{ asset('css/style.css') }} ">
</head>

<body class="font-inter antialiased bg-slate-100 text-slate-600" :class="{ 'sidebar-expanded': sidebarExpanded }"
    x-data="{ sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true' }" x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))">

    <script>
        if (localStorage.getItem('sidebar-expanded') == 'true') {
            document.querySelector('body').classList.add('sidebar-expanded');
        } else {
            document.querySelector('body').classList.remove('sidebar-expanded');
        }
    </script>

    <!-- Page wrapper -->
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        @include('admin.body.sidebar')

        <!-- Content area -->
        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">

            <!-- message alert -->
            @if (Session::has('success'))
                <div x-show="open" x-data="{ open: true }" class="absolute alert  top-4 ">
                    <div class="inline-flex min-w-80 px-4 py-2 rounded-md shadow-md text-sm bg-emerald-500 text-white">
                        <div class="flex w-full justify-between items-start">
                            <div class="flex">
                                <svg class="w-4 h-4 shrink-0 fill-current opacity-80 mt-[3px] mr-3" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zM7 11.4L3.6 8 5 6.6l2 2 4-4L12.4 6 7 11.4z" />
                                </svg>
                                <div class="font-medium"> {{ Session::get('success')}}</div>
                            </div>
                            <button class="opacity-70 hover:opacity-80 ml-3 mt-[3px]" @click="open = false">
                                <div class="sr-only">Close</div>
                                <svg class="w-4 h-4 fill-current">
                                    <path
                                        d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <style>
                    .alert {
                        position: absolute;
                        top: 15%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                    }
                </style>
            @endif

            @if (Session::has('info'))
            <div x-show="open" x-data="{ open: true }" class="absolute alert top-4">
                <div class="inline-flex min-w-80 px-4 py-2 rounded-sm text-sm bg-indigo-500 text-white">
                    <div class="flex w-full justify-between items-start">
                        <div class="flex">
                            <svg class="w-4 h-4 shrink-0 fill-current opacity-80 mt-[3px] mr-3" viewBox="0 0 16 16">
                                <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm1 12H7V7h2v5zM8 6c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1z" />
                            </svg>
                            <div class="font-medium"> {{ Session::get('info')}} </div>
                        </div>
                        <button class="opacity-70 hover:opacity-80 ml-3 mt-[3px]" @click="open = false">
                            <div class="sr-only">Close</div>
                            <svg class="w-4 h-4 fill-current">
                                <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
                <style>
                    .alert {
                        position: absolute;
                        top: 15%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                    }
                </style>
                @endif



            <!-- Site header -->
            @include('admin.body.header')


            @yield('content')


            @include('admin.body.footer')
        </div>

    </div>


    <script src="{{ asset('design/js/vendors/alpinejs.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('design/js/vendors/chart.js') }}"></script>
    <script src="{{ asset('design/js/vendors/moment.js') }}"></script>
    <script src="{{ asset('design/js/vendors/chartjs-adapter-moment.js') }}"></script>
    <script src="{{ asset('design/js/dashboard-charts.js') }}"></script>
    <script src="{{ asset('design/js/vendors/flatpickr.js') }}"></script>
    <script src="{{ asset('design/js/flatpickr-init.js') }}"></script>
    <script src="{{ asset('design/js/test.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="module" defer>
        $(document).ready(function(){

           setTimeout(function() {
                $(".alert").remove();

    }, 5000);



      $(".delete").on("click", function(e){
e.preventDefault();
        let link=$(this).attr("href");

        Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
      window.location=link;
    Swal.fire(
      'Deleted!',
      'User has been deleted.',
      'success'
    )
  }
})
      })
        });






    </script>
    <!-- <script src="./js/vendors/alpinejs.min.js" defer></script>
    <script src="./js/vendors/chart.js"></script>
    <script src="./js/vendors/moment.js"></script>
    <script src="./js/vendors/chartjs-adapter-moment.js"></script>
    <script src="./js/dashboard-charts.js"></script>
    <script src="./js/vendors/flatpickr.js"></script>
    <script src="./js/flatpickr-init.js"></script> -->

</body>

</html>
