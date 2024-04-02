@extends('pages.dashboard.layouts.main')

{{-- --------------------------------- Title --}}
@section('title', $title)

{{-- --------------------------------- Links --}}
@section('additional_links')
    {{-- Simple DataTable --}}
    @include('extensions.simple-datatable.link')
    {{-- Sweetalert --}}
    @include('extensions.sweetalert.link')
@endsection

{{-- --------------------------------- Content --}}
@section('content')
    <div class="mb-0 page-heading">
        <div class="page-title">
            <div class="row">
                <div class="order-last col-12 col-md-6 order-md-1">
                    <h2>Daftar Pengguna</h2>
                    <p class="text-subtitle text-muted">
                        Keseluruhan data setiap pengguna.
                    </p>
                    <hr>
                    <div class="mb-4">
                        <a data-bs-toggle="tooltip" data-bs-original-title="Lakukan registrasi seorang pengguna."
                            href="{{ $dashboardURL }}/users/register" class="px-2 pt-2 btn btn-success me-1">
                            <span class="text-white select-all fa-fw fa-lg fas"></span> Registrasi
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
                                Pengguna
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-column flex-md-row justify-content-between" style="row-gap: 1rem;">
                        <h3>Pengguna</h3>

                        <div class="d-flex" style="column-gap: 1rem;">
                            {{-- Export --}}
                            <div class="mb-3 dropdown dropdown-color-icon d-flex justify-content-start">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="export"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="select-all fa-fw fas me-1"></span> Export
                                </button>
                                <div class="dropdown-menu" aria-labelledby="export">
                                    <form action="{{ $dashboardURL }}/users/export" method="POST">
                                        @csrf
                                        <input type="hidden" name="table" value="all-of-users">
                                        <input type="hidden" name="type" value="XLSX">
                                        <button type="submit" class="dropdown-item">
                                            <span class="select-all fa-fw far text-light"></span> Excel
                                        </button>
                                    </form>

                                    <form action="{{ $dashboardURL }}/users/export" method="POST">
                                        @csrf
                                        <input type="hidden" name="table" value="all-of-users">
                                        <input type="hidden" name="type" value="CSV">
                                        <button type="submit" class="dropdown-item">
                                            <span class="select-all fa-fw fas text-light"></span> CSV
                                        </button>
                                    </form>

                                    <form action="{{ $dashboardURL }}/users/export" method="POST">
                                        @csrf
                                        <input type="hidden" name="table" value="all-of-users">
                                        <input type="hidden" name="type" value="HTML">
                                        <button type="submit" class="dropdown-item">
                                            <span class="select-all fa-fw fab text-light"></span> HTML
                                        </button>
                                    </form>

                                    <form action="{{ $dashboardURL }}/users/export" method="POST">
                                        @csrf
                                        <input type="hidden" name="table" value="all-of-users">
                                        <input type="hidden" name="type" value="MPDF">
                                        <button type="submit" class="dropdown-item">
                                            <span class="select-all fa-fw far text-light"></span> PDF
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Gender</th>
                                <th>Pangkat</th>
                                <th>Jabatan</th>
                                <th>Lokasi</th>
                                <th>Unit</th>
                                <th>Dibuat</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if ($user->foto_profil)
                                            <img width="100" class="rounded"
                                                src="{{ asset('storage/' . $user->foto_profil) }}" alt="User Avatar" />
                                        @else
                                            <img width="100" class="rounded"
                                                src="{{ asset('assets/images/no-image/profile.png') }}" alt="User Avatar" />
                                        @endif
                                    </td>
                                    <td>{{ $user->nama_lengkap }}</td>
                                    <td>
                                        @if ($user->gender == 'L')
                                            Laki-laki
                                        @else
                                            Perempuan
                                        @endif
                                    </td>
                                    <td>{{ $user->golonganPangkat->kode_golongan }}/{{ $user->golonganPangkat->kode_ruang }}
                                        {{ $user->golonganPangkat->nama_pangkat }}</td>
                                    <td>{{ $user->jabatan->nama_jabatan }}</td>
                                    <td>{{ $user->lokasiKerja->nama_lokasi_kerja }}</td>
                                    <td>{{ $user->unitKerja->nama_unit_kerja }}</td>
                                    <td>{{ $user->created_at->format('j F Y, \a\t H.i') }}</td>
                                    <td><span class="badge bg-primary">{{ ucfirst($user->role) }}</span></td>
                                    <td>
                                        <div class="d-flex">
                                            {{-- --------------------------------- Rules --}}
                                            @if ($user->role !== 'superadmin')
                                                <div class="me-2">
                                                    <a data-bs-toggle="tooltip"
                                                        data-bs-original-title="Sunting pengguna {{ $user->nama_lengkap }}."
                                                        href="{{ $dashboardURL }}/users/details/{{ $user->id_user }}/edit"
                                                        class="px-2 pt-2 btn btn-warning">
                                                        <span class="select-all fa-fw fa-lg fas"></span>
                                                    </a>
                                                </div>
                                                <div class="me-2">
                                                    <a data-bs-toggle="tooltip"
                                                        data-bs-original-title="Hapus pengguna {{ $user->nama_lengkap }}."
                                                        class="px-2 pt-2 btn btn-danger" data-confirm-user-destroy="true"
                                                        data-unique="{{ $user->id_user }}">
                                                        <span data-confirm-user-destroy="true"
                                                            data-unique="{{ $user->id_user }}"
                                                            class="select-all fa-fw fa-lg fas"></span>
                                                    </a>
                                                </div>
                                            @endif

                                            <div class="me-2">
                                                <a data-bs-toggle="tooltip"
                                                    data-bs-original-title="Rincian dari pengguna {{ $user->nama_lengkap }}."
                                                    href="{{ $dashboardURL }}/users/details/{{ $user->id_user }}"
                                                    class="px-2 pt-2 btn btn-info">
                                                    <span class="select-all fa-fw fa-lg fas"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11">
                                        <p class="mt-3 text-center">Tidak ada pengguna :(</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection

{{-- --------------------------------- Scripts --}}
@section('additional_scripts')
    {{-- Simple DataTable --}}
    @include('extensions.simple-datatable.script')
    @vite(['resources/js/extensions/simple-datatable/user.js'])
    {{-- SweetAlert --}}
    @include('sweetalert::alert')
    @include('extensions.sweetalert.script')
    @vite(['resources/js/extensions/sweetalert/user.js'])
@endsection
