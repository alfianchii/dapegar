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
                    <h2>Master Lokasi Kerja</h2>
                    <p class="text-subtitle text-muted">
                        Keseluruhan data dari master lokasi kerja.
                    </p>
                    <hr>
                    <div class="mb-4">
                        <a data-bs-toggle="tooltip" data-bs-original-title="Buat sebuah data master lokasi kerja."
                            href="{{ $dashboardURL }}/master-lokasi-kerja/create" class="px-2 pt-2 btn btn-success me-1">
                            <span class="text-white select-all fa-fw fa-lg fas"></span> Buat Lokasi Kerja
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
                                Lokasi Kerja
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
                        <h3>Lokasi Kerja</h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Lokasi Kerja</th>
                                <th>Nama Alias</th>
                                <th>User</th>
                                <th>Sunting</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($lokasiKerja as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_lokasi_kerja }}</td>
                                    <td>{{ $item->nama_alias }}</td>
                                    <td>{{ $item->users->count() }}</td>
                                    <td>
                                        @if ($item->updated_by)
                                            <span class="badge bg-light-warning">Ya</span>
                                        @else
                                            <span class="badge bg-light-dark">Tidak</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="me-2">
                                                <a data-bs-toggle="tooltip"
                                                    data-bs-original-title="Lakukan penyuntingan terhadap data master lokasi kerja."
                                                    href="{{ $dashboardURL }}/master-lokasi-kerja/{{ $item->id_lokasi_kerja }}/edit"
                                                    class="px-2 pt-2 btn btn-warning">
                                                    <span class="select-all fa-fw fa-lg fas"></span>
                                                </a>
                                            </div>
                                            <div class="me-2">
                                                <a data-bs-toggle="tooltip"
                                                    data-bs-original-title="Hapus data master lokasi kerja." href="#"
                                                    class="px-2 pt-2 btn btn-danger"
                                                    data-confirm-lokasi-kerja-destroy="true"
                                                    data-unique="{{ $item->id_lokasi_kerja }}">
                                                    <span data-confirm-lokasi-kerja-destroy="true"
                                                        data-unique="{{ $item->id_lokasi_kerja }}"
                                                        class="select-all fa-fw fa-lg fas"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <p class="mt-3 text-center">Tidak ada data master lokasi kerja :(</p>
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
    @vite(['resources/js/extensions/simple-datatable/master-lokasi-kerja.js'])
    {{-- SweetAlert --}}
    @include('sweetalert::alert')
    @include('extensions.sweetalert.script')
    @vite(['resources/js/extensions/sweetalert/master-lokasi-kerja.js'])
@endsection
