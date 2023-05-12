<header class="sticky top-0 bg-white border-b border-slate-200 z-30 ">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 -mb-px">

            <!-- Header: Left side -->
            <div class="flex">
                <!-- Hamburger button -->
                <button class="text-slate-500 hover:text-slate-600 lg:hidden " @click.stop="sidebarOpen = !sidebarOpen"
                    aria-controls="sidebar" :aria-expanded="sidebarOpen">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <rect x="4" y="5" width="16" height="2" />
                        <rect x="4" y="11" width="16" height="2" />
                        <rect x="4" y="17" width="16" height="2" />
                    </svg>
                </button>

                <button @click="sidebarExpanded = !sidebarExpanded" class="lg:block hidden outline-none border-none">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <rect x="4" y="5" width="16" height="2" />
                        <rect x="4" y="11" width="16" height="2" />
                        <rect x="4" y="17" width="16" height="2" />
                    </svg>
                </button>
            </div>

            <!-- Header: Right side -->

            @if (Auth::check())

                <div class="flex items-center space-x-3">
                    <div class="flex items-center space-x-2">
                        <p class="text-slate-500">{{ Auth::user()->name }}</p>

                        @php
                        $user=DB::table('users')->where('id',Auth::user())->first();
                        @endphp

                        @if ( Auth::user()->image !== null)
                          @if(Auth::user()->userType== "Student")
                          <img src=" {{ asset('studentImage/'. Auth::user()->image) }} " alt=""
                         class="avatar hover:ring-green-400 w-10 h-10 p-1 object-cover rounded-full ring-2 ring-green-300  cursor-pointer">

                         @else <img src=" {{ asset('img/'. Auth::user()->image) }} " alt=""
                         class="avatar hover:ring-green-400 w-10 h-10 p-1 object-cover rounded-full ring-2 ring-green-300  cursor-pointer">
                         @endif




                         @else        <img src=" {{ asset('img/author.jpg') }} " alt=""
                         class="avatar hover:ring-green-400 w-10 h-10  object-cover rounded-full ring-2 ring-green-300  cursor-pointer">

                         @endif

                        <div class=" action shadow-2xl rounded-lg bg-slate-100 p-3 dropmenu  ">
                            <ul class="w-full space-y-4 ">
                                <div class="space-y-1">

                                    <p class="text-slate-300 text-[15px]">Admin</p>
                                    <p class="text-slate-400 text-[13px] ">{{ Auth::user()->email }} </p>
                                    <hr>
                                </div>

                                <li class="text-sm hover:text-slate-900 hover:p-1 list">
                                    <a href="  ">Profile</a>

                                </li>
                                <li class="text-sm hover:text-slate-900 hover:p-1 list">
                                    <a href=" {{ route('admin.logout') }} ">Logout</a>
                                </li>

                            </ul>
                        </div>
                    </div>




                </div>
            @else
            @endif

        </div>

        <style>
            .action {
                min-height: 70px;
                min-width: 160px;

                position: absolute;
                top: 55px;
                right: -200px;
                z-index: -100;
            }

            li {
                cursor: pointer;
            }

            ul {
                w
            }
        </style>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous" defer></script>
        <script type="module" defer>
        $(document).ready(function(){

$(".avatar").click(function (e) {


    $('.dropmenu').toggleClass('hide');
if($(".dropmenu").hasClass('hide')){

    $('.dropmenu').css("right","50px")

}
else{
    $('.dropmenu').css("right","-200px")

}
});

        });
    </script>
</header>
