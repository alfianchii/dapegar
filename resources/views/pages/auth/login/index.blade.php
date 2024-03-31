@extends('pages.auth.layouts.main')

@section('title', $title)

@section('additional_links')
@endsection

@section('content')
    <section class="flex justify-center">
        <div class="mt-16">
            <div class="flex items-center">
                <a href="/" class="w-[100px] mx-auto">
                    @include('assets.logo')
                </a>
            </div>

            <div class="flex flex-col p-10 mt-10 bg-white border-t-2 rounded-lg shadow-2xl border-t-dodger-blue">
                {{-- Breadcrumbs --}}
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                        <li class="inline-flex items-center">
                            <a href="/"
                                class="inline-flex items-center text-sm font-medium transition-all duration-300 text-midnight-blue hover:text-dodger-blue">
                                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                </svg>
                                Beranda
                            </a>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="text-sm font-medium text-slate-grey ms-1 md:ms-2">Login</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                {{-- Header --}}
                <div class="mt-8">
                    <h3 class="text-xl font-bold text-midnight-blue">Login</h3>
                    <p class="text-slate-grey">Masukkan NIP dan password kamu.</p>
                </div>

                {{-- Session --}}
                @if (session()->has('error'))
                    <div id="dismiss-alert"
                        class="p-4 text-sm text-red-800 transition duration-300 border border-red-200 rounded-lg mt-7 hs-removing:translate-x-5 hs-removing:opacity-0 bg-red-50"
                        role="alert">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                            </div>
                            <div class="ms-2">
                                <div class="text-sm font-medium">
                                    {{ session('error') }}
                                </div>
                            </div>
                            <div class="ps-3 ms-auto">
                                <div class="-mx-1.5 -my-1.5">
                                    <button type="button"
                                        class="inline-flex transition-all duration-300 bg-red-50 rounded-lg p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-red-50 focus:ring-red-600"
                                        data-hs-remove-element="#dismiss-alert">
                                        <span class="sr-only">Dismiss</span>
                                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M18 6 6 18" />
                                            <path d="m6 6 12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif (session()->has('success'))
                    <div id="dismiss-alert"
                        class="p-4 text-sm text-green-800 transition duration-300 border border-green-200 rounded-lg mt-7 hs-removing:translate-x-5 hs-removing:opacity-0 bg-green-50"
                        role="alert">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="flex-shrink-0 mt-1 text-green-600 size-4" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z" />
                                    <path d="m9 12 2 2 4-4" />
                                </svg>
                            </div>
                            <div class="ms-2">
                                <div class="text-sm font-medium">
                                    {{ session('success') }}
                                </div>
                            </div>
                            <div class="ps-3 ms-auto">
                                <div class="-mx-1.5 -my-1.5">
                                    <button type="button"
                                        class="inline-flex transition-all duration-300 bg-green-50 rounded-lg p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-50 focus:ring-green-600"
                                        data-hs-remove-element="#dismiss-alert">
                                        <span class="sr-only">Dismiss</span>
                                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M18 6 6 18" />
                                            <path d="m6 6 12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Form --}}
                <form action="/login" method="POST" class="mt-8">
                    @csrf

                    <div class="mb-5">
                        <label for="nip" class="block mb-2 text-sm font-bold text-midnight-blue">NIP</label>
                        <input type="text" id="nip"
                            class="border placeholder-ash-grey/50 border-pale-silver text-slate-grey text-sm rounded-md transition-all duration-300 outline-none focus:ring-royal-blue focus:border-royal-blue ring-royal-blue block w-full p-2.5"
                            placeholder="e.g. 12345678901" name="nip" autofocus>

                        @error('nip')
                            <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="password" class="block mb-2 text-sm font-bold text-midnight-blue">Password</label>
                        <input type="password" id="password" placeholder="e.g. 4kuBu7uhM3dk1t"
                            class="border placeholder-ash-grey/50 border-pale-silver text-slate-grey text-sm rounded-md transition-all duration-300 outline-none focus:ring-royal-blue focus:border-royal-blue ring-royal-blue block w-full p-2.5"
                            name="password">

                        @error('password')
                            <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-7">
                        <button
                            class="w-full py-3 text-sm font-bold text-white transition-all duration-300 rounded hover:bg-blue-700 bg-dodger-blue"
                            type="submit">Login</button>
                    </div>
                </form>
            </div>

            <div class="mt-12 text-center">
                <p class="text-sm text-slate-grey">Tidak memiliki akun? Mohon hubungi administrator.</p>
            </div>

            @include('pages.auth.layouts.footer')
        </div>
    </section>
@endsection

@section('additional_scripts')
    @include('utils.forget-session', ['type' => 'error'])
@endsection
