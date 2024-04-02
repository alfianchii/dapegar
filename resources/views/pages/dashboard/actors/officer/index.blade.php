@extends('pages.dashboard.layouts.main')

{{-- --------------------------------- Title --}}
@section('title', $title)

{{-- --------------------------------- Links --}}
@section('additional_links')
@endsection

{{-- --------------------------------- Content --}}
@section('content')
    <div class="mb-0 page-heading">
        <div class="page-title">
            <div class="row">
                <div class="order-last col-12 col-md-8 order-md-1">
                    <h2>{{ $greeting }}, {{ $userData->nama_lengkap }}!</h2>
                </div>
                <div class="order-first col-12 col-md-4 order-md-2">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                Dashboard
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        {{-- Entry Point Start --}}
        <div class="mt-4 page-content">
            <section class="row">
                <div class="col-12 col-lg-9">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="px-4 py-4 card-body">
                                    <div class="text-center">
                                        <div class="mb-3 avatar avatar-xl">
                                            @if ($userData->foto_profil)
                                                <img src="{{ asset('storage/' . $userData->foto_profil) }}"
                                                    alt="User Avatar" />
                                            @else
                                                <img src="{{ asset('assets/images/no-image/profile.png') }}"
                                                    alt="User Avatar" />
                                            @endif
                                        </div>
                                        <div class="name">
                                            <h5 class="font-bold">{{ $userData->nama_lengkap }}</h5>
                                            <h6 class="mb-0 text-muted">
                                                {{ $userData->jabatan->nama_jabatan }}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row user-select-none">
                        <div class="col-6 col-lg-3 col-md-6">
                            <a data-bs-toggle="tooltip"
                                data-bs-original-title="Jumlah pengguna yang telah terdaftar dalam website {{ config('app.name') }}.">
                                <div class="card">
                                    <div class="px-4 card-body py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                                <div class="mb-2 stats-icon" style="background-color: #ffbe55;">
                                                    <i class="iconly-boldUser1"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="font-semibold text-muted">
                                                    Akun
                                                </h6>
                                                <h6 class="mb-0 font-extrabold">
                                                    {{ $usersCount }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <a data-bs-toggle="tooltip"
                                data-bs-original-title="Jumlah unit kerja yang terdata dalam website {{ config('app.name') }}">
                                <div class="card">
                                    <div class="px-4 card-body py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                                <div class="mb-2 stats-icon" style="background-color: #6574ff;">
                                                    <i class="iconly-boldHide"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="font-semibold text-muted">
                                                    Unit Kerja
                                                </h6>
                                                <h6 class="mb-0 font-extrabold">
                                                    {{ $unitKerjaCount }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <a data-bs-toggle="tooltip"
                                data-bs-original-title="Jumlah pengguna dengan status sebagai 'officer'.">
                                <div class="card">
                                    <div class="px-4 card-body py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                                <div class="mb-2 stats-icon" style="background-color: #ff6677;">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="font-semibold text-muted">
                                                    Pegawai
                                                </h6>
                                                <h6 class="mb-0 font-extrabold">
                                                    {{ $officersCount }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <a data-bs-toggle="tooltip"
                                data-bs-original-title="Jumlah lokasi kerja yang terdata dalam website {{ config('app.name') }}">
                                <div class="card">
                                    <div class="px-4 card-body py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                                <div class="mb-2 stats-icon red">
                                                    <i class="iconly-boldMessage"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="font-semibold text-muted">
                                                    Lokasi Kerja
                                                </h6>
                                                <h6 class="mb-0 font-extrabold">
                                                    {{ $lokasiKerjaCount }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card">
                        <div class="pb-0 card-header">
                            <h4 class="text-center">Artikel Terbaru</h4>
                        </div>
                        <hr>
                        <div class="pb-4 card-content">
                            {{-- @forelse ($newUsers as $newUser)
                                <a href="{{ $dashboardURL }}/users/details/{{ $newUser->id_user }}">
                                    <div class="px-4 py-3 recent-message d-flex">
                                        <div class="avatar avatar-lg">
                                            @if ($newUser->foto_profil)
                                                <img src="{{ asset('storage/' . $newUser->foto_profil) }}"
                                                    alt="User Avatar" />
                                            @else
                                                <img src="{{ asset('assets/images/no-image/profile.png') }}"
                                                    alt="User Avatar" />
                                            @endif
                                        </div>
                                        <div class="name ms-4">
                                            <h5 class="mb-1">{{ $newUser->nama_lengkap }}</h5>
                                            <h6 class="mb-0 text-muted">
                                                {{ $newUser->golonganPangkat->kode_golongan }}/{{ $newUser->golonganPangkat->kode_ruang }}
                                                -
                                                {{ $newUser->golonganPangkat->nama_pangkat }}
                                            </h6>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <div class="px-4 py-3 recent-message d-flex">
                                    <div class="alert alert-warning w-100" role="alert">
                                        <h4 style="text-align: center;" class="alert-heading">Tidak ada artikel :(
                                        </h4>
                                    </div>
                                </div>
                            @endforelse --}}
                        </div>
                    </div>
                </div>
            </section>
        </div>
        {{-- Entry Point End --}}
    </div>
@endsection

{{-- --------------------------------- Scripts --}}
@section('additional_scripts')
    {{-- SweetAlert --}}
    @include('sweetalert::alert')
@endsection
