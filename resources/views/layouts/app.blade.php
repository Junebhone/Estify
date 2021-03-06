<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->

</head>

<body class="font-sans antialiased overflow-x-hidden">
    <x-jet-banner />
    <div class="flex-col w-full md:flex md:flex-row md:min-h-screen">
        <div @click.away="open = false"
            class="flex flex-col flex-shrink-0 w-full text-gray-700 bg-white md:w-64 dark-mode:text-gray-200 dark-mode:bg-gray-800"
            x-data="{ open: false }">
            <div class="flex flex-row items-center justify-between flex-shrink-0 px-8 py-4">

                <a href="{{ route('welcome') }}"
                    class="flex justify-center items-center text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">
                    <svg class="w-14 h-14 mr-4" viewBox="0 0 364 373" fill="none"
                        xmlns="http://www.w3.org/2000/svg%22%3E">
                        <path
                            d="M68 113L0 183L191 373L339 224L184 69L73 183L91 199L184 102L306 224L191 340L35 183L184 36L348 199L364 183L184 0L91 93L96 75H68V113Z"
                            fill="#FF385C" />
                        <rect x="149" y="157" width="26" height="26" fill="#FF385C" />
                        <rect x="189" y="157" width="26" height="26" fill="#FF385C" />
                        <rect x="149" y="191" width="26" height="26" fill="#FF385C" />
                        <rect x="189" y="191" width="26" height="26" fill="#FF385C" />
                    </svg>
                    User Dashboard</a>
                <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <nav :class="{'block': open, 'hidden': !open}"
                class="flex-grow px-4 pb-4 md:block md:pb-0 md:overflow-y-auto">
                <x-app-link href="{{ route('listings.create') }}" :active="request()->routeIs('listings.create')">New
                    Listing
                </x-app-link>
                <x-app-link href="{{ route('listings.index') }}" :active="request()->routeIs('listings.index')">My
                    Listings
                </x-app-link>
                <x-app-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">Dashboard
                </x-app-link>
                @role('admin')
                <x-app-link href="{{ route('admin.index') }}" :active="request()->routeIs('admin.index')">Admin
                    Dashboard
                </x-app-link>
                @endrole
                @auth
                <div @click.away="open = false" class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg  focus:text-white md:block hover:bg-Rose hover:text-white focus:bg-Rose focus:outline-none focus:shadow-outline">
                        <span>{{ Auth::user()->name }}</span>
                        <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"
                            class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
                        <div class="px-2 py-2 bg-white rounded-md shadow ">
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg hover:text-white  focus:text-white hover:bg-Rose focus:bg-Rose focus:outline-none focus:shadow-outline"
                                href="{{ route('profile.show') }}">Profile</a>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg hover:text-white  focus:text-white hover:bg-Rose focus:bg-Rose focus:outline-none focus:shadow-outline"
                                    href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                                this.closest('form').submit();">
                                    Logout
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
                @endauth

            </nav>
        </div>

        <main class="m-2 p-2 w-full">
            <!-- Page Heading -->
            @if (isset($header))
            <header class="bg-white">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            @endif
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <x-main-alert></x-main-alert>
    <x-main-file></x-main-file>
    <script>
        $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: true
    })

    swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  reverseButtons: true
    }).then((result) => {
  if (result.isConfirmed) {
    form.submit();
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your record is safe :)',
      'error'
    )
  }
})
      });

    </script>

</body>

</html>