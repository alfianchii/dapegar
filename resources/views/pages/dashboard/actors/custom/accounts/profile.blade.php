@extends('pages.dashboard.layouts.main')

{{-- --------------------------------- Title --}}
@section('title', $title)

{{-- --------------------------------- Links --}}
@section('additional_links')
    {{-- SweetAlert --}}
    @include('extensions.sweetalert.link')
@endsection

@section('content')
    <div class="mb-0 page-heading">
        <div class="page-title">
            <div class="row">
                <div class="order-last col-12 col-md-6 order-md-1">
                    <h2>Profil</h2>
                    <p class="text-subtitle text-muted">
                        Keseluruhan data akun yang kamu miliki.
                    </p>
                    <hr>
                    <div class="mb-4">
                        <a href="{{ back()->getTargetUrl() }}" data-bs-toggle="tooltip"
                            data-bs-original-title="Kembali ke halaman sebelumnya." class="px-2 pt-2 btn btn-secondary me-1">
                            <span class="text-white select-all fa-fw fa-lg fas"></span>
                            Kembali
                        </a>
                        <a data-bs-toggle="tooltip" data-bs-original-title="Sunting data dari akun kamu."
                            href="{{ $dashboardURL }}/users/account/settings" class="px-2 pt-2 btn btn-warning me-1">
                            <span class="select-all fa-fw fa-lg fas"></span>
                        </a>
                    </div>
                </div>
                <div class="order-first col-12 col-md-6 order-md-2">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ $dashboardURL }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Profil
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h3 class="card-title">Pengguna</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3 d-flex justify-content-center align-items-center flex-column">
                        @if ($userData->foto_profil)
                            <img width="150" class="rounded-circle"
                                src="{{ asset('storage/' . $userData->foto_profil) }}" alt="User Avatar" />
                        @else
                            <img width="150" class="rounded-circle"
                                src="{{ asset('assets/images/no-image/profile.png') }}" alt="User Avatar" />
                        @endif

                        <h4 class="mt-4">{{ $userData->nama_lengkap }}</h4>

                        <span class="badge bg-primary">{{ ucwords($userData->role) }}</span>
                    </div>

                    <div class="divider">
                        <div class="divider-text">{{ $userData->tanggal_lahir->format('d F Y') }}</div>
                    </div>

                    <div class="container text-center justify-content-center">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="font-bold">
                                    <p>NIP: <span style="font-weight: 400;" class="text-muted">{{ $userData->nip }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="font-bold">
                                    <p>Email: <span style="font-weight: 400;"
                                            class="text-muted">{{ $userData->email }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="font-bold">
                                    <p>NPWP: <span style="font-weight: 400;"
                                            class="text-muted">{{ $userData->npwp ?? "-" }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="font-bold">
                                    <p>Telepon: <span style="font-weight: 400;"
                                            class="text-muted">{{ $userData->telepon }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="font-bold">
                                    <p>Gender:
                                        <span style="font-weight: 400;" class="text-muted">
                                            @if ($userData->gender == 'L')
                                                Laki-laki
                                            @else
                                                Perempuan
                                            @endif
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="font-bold">
                                    <p>Agama:
                                        <span style="font-weight: 400;" class="text-muted">
                                            {{ $userData->agama->nama_agama }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="font-bold">
                                    <p>Tempat Lahir:
                                        <span style="font-weight: 400;" class="text-muted">
                                            {{ $userData->tempat_lahir }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="font-bold">
                                    <p>Alamat:
                                        <span style="font-weight: 400;" class="text-muted">
                                            {{ $userData->alamat }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="font-bold">
                                    <p>Golongan Pangkat:
                                        <span style="font-weight: 400;" class="text-muted">
                                            {{ $userData->golonganPangkat->kode_golongan }}/{{ $userData->golonganPangkat->kode_ruang }}
                                            {{ $userData->golonganPangkat->nama_pangkat }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="font-bold">
                                    <p>Eselon:
                                        <span style="font-weight: 400;"
                                            class="text-muted">{{ $userData->eselon->nama_eselon }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="font-bold">
                                    <p>Jabatan:
                                        <span style="font-weight: 400;" class="text-muted">
                                            {{ $userData->jabatan->nama_jabatan }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="font-bold">
                                    <p>Unit Kerja:
                                        <span style="font-weight: 400;" class="text-muted">
                                            {{ $userData->unitKerja->nama_unit_kerja }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="font-bold">
                                    <p>Lokasi Kerja:
                                        <span style="font-weight: 400;"
                                            class="text-muted">{{ $userData->lokasiKerja->nama_lokasi_kerja }}
                                            ({{ $userData->lokasiKerja->nama_alias }})</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

{{-- --------------------------------- Scripts --}}
@section('additional_scripts')
    {{-- SweetAlert --}}
    @include('sweetalert::alert')
    @include('extensions.sweetalert.script')
    @vite(['resources/js/extensions/sweetalert/user.js'])
@endsection
