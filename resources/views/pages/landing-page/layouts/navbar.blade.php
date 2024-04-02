<header class="flex flex-wrap w-full py-4 text-sm bg-white sm:justify-start sm:flex-nowrap">
    <nav class="max-w-[85rem] w-full mx-auto px-4 flex flex-wrap basis-full items-center justify-between"
        aria-label="Global">
        <a class="flex-none text-xl font-semibold sm:order-1 text-midnight-blue"
            href="#">{{ config('app.name') }}</a>
        <div class="flex items-center sm:order-3 gap-x-2">
            <button type="button"
                class="sm:hidden hs-collapse-toggle p-2.5 inline-flex justify-center items-center gap-x-2 rounded-lg border border-gray-200 bg-dodger-blue text-gray-800 shadow-sm hover:bg-dodger-blue/80 disabled:opacity-50 disabled:pointer-events-none transition-all duration-300"
                data-hs-collapse="#navbar-alignment" aria-controls="navbar-alignment" aria-label="Toggle navigation">
                <svg class="flex-shrink-0 text-white hs-collapse-open:hidden size-4" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" x2="21" y1="6" y2="6" />
                    <line x1="3" x2="21" y1="12" y2="12" />
                    <line x1="3" x2="21" y1="18" y2="18" />
                </svg>
                <svg class="flex-shrink-0 hidden text-white hs-collapse-open:block size-4"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6 6 18" />
                    <path d="m6 6 12 12" />
                </svg>
            </button>

            @auth
                <div class="relative inline-flex hs-dropdown">
                    <button id="hs-dropdown-with-title" type="button"
                        class="inline-flex items-center px-3 py-2 text-sm font-bold text-center text-white transition-all duration-300 rounded-lg outline-none bg-dodger-blue">
                        Welcome<span class="hidden lg:inline-block">, {{ $userData->nama_lengkap }}</span>!
                        <svg class="ms-2 hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </button>

                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-2 mt-2 divide-y divide-gray-200"
                        aria-labelledby="hs-dropdown-with-title">
                        <div class="py-2 first:pt-0 last:pb-0">
                            <span class="block px-3 py-2 text-xs font-medium text-gray-400 uppercase">
                                Page
                            </span>
                            <a class="flex items-center outline-none duration-300 transition-all gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                href="{{ $dashboardURL }}">
                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                </svg>
                                Dashboard
                            </a>
                        </div>
                        <div class="py-2 first:pt-0 last:pb-0">
                            <span class="block px-3 py-2 text-xs font-medium text-gray-400 uppercase">
                                Account
                            </span>
                            <form action="/logout" method="POST">
                                @csrf
                                <button
                                    class="w-full flex items-center outline-none duration-300 transition-all gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                    type="submit">
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242" />
                                        <path d="M12 12v9" />
                                        <path d="m8 17 4 4 4-4" />
                                    </svg>
                                    Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="flex items-center">
                    <a href="{{ $loginURL }}"
                        class="px-6 py-2 font-bold text-white transition-all duration-300 rounded-lg lg:px-10 bg-dodger-blue hover:bg-dodger-blue/80">
                        Login
                    </a>
                </div>
            @endauth
        </div>
        <div id="navbar-alignment"
            class="hidden overflow-hidden transition-all duration-300 hs-collapse basis-full grow sm:grow-0 sm:basis-auto sm:block sm:order-2">
            <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:mt-0 sm:ps-5">
                <a class="text-base font-medium transition-all duration-300 {{ Request::is('/') ? 'text-dodger-blue' : 'text-slate-grey' }} hover:text-royal-blue"
                    href="{{ $homeURL }}" aria-current="page">Beranda</a>
                <a class="text-base font-medium transition-all duration-300 {{ Request::is('artikel*') ? 'text-dodger-blue' : 'text-slate-grey' }} hover:text-royal-blue"
                    href="/artikel">Artikel</a>
            </div>
        </div>
    </nav>
</header>
