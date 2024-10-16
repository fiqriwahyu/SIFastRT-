<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="bg-[#66A5AD] max-w-8xl px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <h1 class="text-3xl font-bold text-gray-800">SIFastRT</h1>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @if (Auth::check())
                        @if (Auth::user()->role === 'admin')
                            <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                            <x-nav-link :href="route('admin.datawarga.index')" :active="request()->routeIs('admin.datawarga.index')">
                                {{ __('Data Warga') }}
                            </x-nav-link>
                            <x-nav-link :href="route('admin.peminjaman.index')" :active="request()->routeIs('admin.peminjaman.index')">
                                {{ __('Inventaris') }}
                            </x-nav-link>
                            <x-nav-link :href="route('admin.jadwal.index')" :active="request()->routeIs('admin.jadwal.index')">
                                {{ __('Penjadwalan') }}
                            </x-nav-link>
                            <x-nav-link :href="route('admin.laporan.index')" :active="request()->routeIs('admin.laporan.index')">
                                {{ __('Laporan') }}
                            </x-nav-link>
                        @elseif (Auth::user()->role === 'user')
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                            <x-nav-link :href="route('peminjaman.index')" :active="request()->routeIs('peminjaman.index')">
                                {{ __('Inventaris') }}
                            </x-nav-link>
                            <x-nav-link :href="route('jadwal.index')" :active="request()->routeIs('jadwal.index')">
                                {{ __('Penjadwalan') }}
                            </x-nav-link>
                            <x-nav-link :href="route('laporan.create')" :active="request()->routeIs('laporan.create')">
                                {{ __('Laporan') }}
                            </x-nav-link>
                        @endif
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @if (Auth::check())
                @if (Auth::user()->role === 'admin')
                    <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.datawarga.index')" :active="request()->routeIs('admin.datawarga.index')">
                        {{ __('Data Warga') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.laporan.index')" :active="request()->routeIs('admin.laporan.index')">
                        {{ __('laporan') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.jadwal.index')" :active="request()->routeIs('admin.jadwal.index')">
                        {{ __('Penjadwalan') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.peminjaman.index')" :active="request()->routeIs('admin.peminjaman.index')">
                        {{ __('Penjadwalan') }}
                    </x-responsive-nav-link>
                @elseif (Auth::user()->role === 'user')
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('laporan.create')" :active="request()->routeIs('laporan.create')">
                        {{ __('laporan') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('jadwal.index')" :active="request()->routeIs('jadwal.index')">
                        {{ __('penjadwalan') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('peminjaman.index')" :active="request()->routeIs('peminjaman.index')">
                        {{ __('Inventaris') }}
                    </x-responsive-nav-link>
                @endif
            @endif

        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
