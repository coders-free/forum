<header class="shadow bg-white overflow-hidden">
    <div class="container h-20 flex items-center">

        <a href="/">
            <img class="h-16 mr-3" src="{{asset('img/LOGO-KM-FORUM.png')}}">
        </a>

        <div class="flex-1 relative">

            <div class="mb-1 flex justify-between">
                <h1 class="text-primary text-xl uppercase">Programa de beneficios</h1>

                @if (session('customer'))
                
                    <form action="{{route('session.logout')}}" method="POST">

                        @csrf

                        <button type="submit" class="ml-4 text-sm text-gray-500 hover:text-gray-700 focus:outline-none md:hidden">
                            <i class="fas fa-sign-out-alt text-lg mr-1"></i>
                            Logout
                        </button>


                        <button type="submit" class="text-sm text-gray-500 hover:text-gray-700 focus:outline-none hidden md:block">
                            <i class="fas fa-sign-out-alt text-lg mr-1"></i>
                            {{ session('customer')->name }}
                        </button>
                    </form>

                @endif
            </div>

            <div class="absolute w-screen flex items-center">
                <span class="h-2 w-2 bg-secondary rounded-full block "></span>
                <div class="h-0.5 bg-secondary w-full"></div>
            </div>
        </div>
    </div>
</header>