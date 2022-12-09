<nav class="bg-white shadow" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('/') }}" class="flex items-center py-4 mr-4">
                        <img src="{{ url('img/logo.svg') }}" alt="D&#39;Orphan" class="h-8 w-8 mr-3">
                        <span class="text-base leading-6 font-bold text-blue-500">D&#39;Orphan</span>
                    </a>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <!-- Current: "border-blue-500 text-gray-900", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                    <a href="{{ route('dasbor') }}"
                        class="text-gray-500 border-transparent hover:text-blue-500 active:text-blue-500 inline-flex items-center px-1 pt-1 border-b-2 font-medium {{ request()->routeIs('dasbor') ? 'border-blue-500 text-blue-500 font-semibold border-b-2' : '' }}">Dasbor</a>
                    <a href="{{ route('cari') }}"
                        class="text-gray-500 border-transparent hover:text-blue-500 active:text-blue-500 inline-flex items-center px-1 pt-1 border-b-2 font-medium {{ request()->routeIs('cari') ? 'border-blue-500 text-blue-500 font-semibold border-b-2' : '' }}">Cari</a>
                    <a href="{{ route('lomba') }}"
                        class="text-gray-500 border-transparent hover:text-blue-500 active:text-blue-500 inline-flex items-center px-1 pt-1 border-b-2 font-medium {{ request()->routeIs('lomba') ? 'border-blue-500 text-blue-500 font-semibold border-b-2' : '' }}">Lomba</a>
                    @auth
                        @if (Auth::user()->user_type == 'Tutor')
                            <a href="{{ route('donasi') }}"
                                class="text-gray-500 border-transparent hover:text-blue-500 active:text-blue-500 inline-flex items-center px-1 pt-1 border-b-2 font-medium {{ request()->routeIs('donasi') ? 'border-blue-500 text-blue-500 font-semibold border-b-2' : '' }}">Donasi</a>
                        @endif
                    @endauth
                    @guest
                        <a href="{{ route('donasi') }}"
                            class="text-gray-500 border-transparent hover:text-blue-500 active:text-blue-500 inline-flex items-center px-1 pt-1 border-b-2 font-medium {{ request()->routeIs('donasi') ? 'border-blue-500 text-blue-500 font-semibold border-b-2' : '' }}">Donasi</a>
                    @endguest
                </div>
            </div>
            @auth
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <!-- Profile dropdown -->
                    <span
                        class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-semibold bg-gray-100 text-gray-800">{{ 'Rp' . Auth::user()->money }}</span>
                    <div class="ml-3 relative">
                        <div>
                            <button type="button"
                                class="bg-white rounded-full flex focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true" @click="open=!open">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="">
                            </button>
                        </div>
                        <!-- Dropdown menu, show/hide based on menu state.
                                                                                                                                Entering: "transition ease-out duration-200"
                                                                                                                                From: "transform opacity-0 scale-95"
                                                                                                                                To: "transform opacity-100 scale-100"
                                                                                                                                Leaving: "transition ease-in duration-75"
                                                                                                                                From: "transform opacity-100 scale-100"
                                                                                                                                To: "transform opacity-0 scale-95" -->
                        <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-blue-500 ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                            x-show="open">
                            <!-- Active: "", Not Active: "" -->
                            <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-gray-500" role="menuitem"
                                tabindex="-1" id="user-menu-item-0">Profil</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit" class="block px-4 py-2 text-red-500" role="menuitem" tabindex="-1"
                                    id="user-menu-item-2">Keluar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="-mr-2 flex items-center sm:hidden">
                    <!-- Mobile menu button -->
                    <button type="button"
                        class="inline-flex items-center justify-center p-2 rounded bg-blue-500 hover:bg-blue-600 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-white"
                        aria-controls="mobile-menu" aria-expanded="false" @click="open=!open">
                        <span class="sr-only">Open main menu</span>
                        <!-- Icon when menu is closed.
                                                                                                                                                Heroicon name: outline/menu
                                                                                                                                                Menu open: "hidden", Menu closed: "block" -->
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <!-- Icon when menu is open.
                                                                                                                                    Heroicon name: outline/x
                                                                                                                                    Menu open: "block", Menu closed: "hidden" -->
                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    @endauth

    @guest
        <div class="flex items-center gap-3">
            <a href="{{ route('login') }}">
                <x-secondary-button>
                    Masuk
                </x-secondary-button>
            </a>
            <a href="{{ route('register') }}">
                <x-primary-button>
                    Daftar
                </x-primary-button>
            </a>
        </div>
    @endguest

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu" x-show="open">
        <div class="grid gap-4 p-3">
            <!-- Current: "bg-blue-50 border-blue-500 text-blue-700", Default: "border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700" -->
            <a href="{{ route('dasbor') }}"
                class="text-gray-500 border-transparent hover:text-blue-500 active:text-blue-500 inline-flex items-center px-1 pt-1 border-b-2 font-medium {{ request()->routeIs('dasbor') ? 'text-blue-500 font-semibold' : '' }}">Dasbor</a>
            <a href="{{ route('cari') }}"
                class="text-gray-500 border-transparent hover:text-blue-500 active:text-blue-500 inline-flex items-center px-1 pt-1 border-b-2 font-medium {{ request()->routeIs('cari') ? 'text-blue-500 font-semibold' : '' }}">Cari</a>
            <a href="{{ route('lomba') }}"
                class="text-gray-500 border-transparent hover:text-blue-500 active:text-blue-500 inline-flex items-center px-1 pt-1 border-b-2 font-medium {{ request()->routeIs('lomba') ? 'text-blue-500 font-semibold' : '' }}">Lomba</a>
            <a href="{{ route('donasi') }}"
                class="text-gray-500 border-transparent hover:text-blue-500 active:text-blue-500 inline-flex items-center px-1 pt-1 border-b-2 font-medium {{ request()->routeIs('donasi') ? 'text-blue-500 font-semibold' : '' }}">Donasi</a>
        </div>
        @auth
            <div class="pt-4 pb-3 border-t border-gray-200">
                <div class="flex items-center px-4">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full"
                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="Foto Profil">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>
                <div class="mt-3 space-y-1">
                    <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-gray-500" role="menuitem"
                        tabindex="-1" id="user-menu-item-0">Profil</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="block px-4 py-2 text-red-500" role="menuitem" tabindex="-1"
                            id="user-menu-item-2">Keluar</button>
                    </form>
                </div>
            </div>
        @endauth
    </div>
</nav>
