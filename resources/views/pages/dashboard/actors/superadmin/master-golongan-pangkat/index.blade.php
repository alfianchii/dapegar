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
                    <h2>Master Golongan Pangkat</h2>
                    <p class="text-subtitle text-muted">
                        Keseluruhan data dari master golongan pangkat.
                    </p>
                    <hr>
                    <div class="mb-4">
                        <a data-bs-toggle="tooltip" data-bs-original-title="Buat sebuah data master golongan pangkat."
                            href="{{ $dashboardURL }}/master-golongan-pangkat/create" class="px-2 pt-2 btn btn-success me-1">
                            <span class="text-white select-all fa-fw fa-lg fas"></span> Buat Pangkat
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
                                Golongan Pangkat
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
                        <h3>Pangkat</h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Golongan</th>
                                <th>Kode Ruang</th>
                                <th>Nama Golongan Pangkat</th>
                                <th>User</th>
                                <th>Sunting</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($golonganPangkat as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kode_golongan }}</td>
                                    <td>{{ $item->kode_ruang }}</td>
                                    <td>{{ $item->nama_pangkat }}</td>
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
                                                    data-bs-original-title="Lakukan penyuntingan terhadap data master golongan pangkat."
                                                    href="{{ $dashboardURL }}/master-golongan-pangkat/{{ $item->id_golongan_pangkat }}/edit"
                                                    class="px-2 pt-2 btn btn-warning">
                                                    <span class="select-all fa-fw fa-lg fas"></span>
                                                </a>
                                            </div>
                                            <div class="me-2">
                                                <a data-bs-toggle="tooltip"
                                                    data-bs-original-title="Hapus data master golongan pangkat."
                                                    href="#" class="px-2 pt-2 btn btn-danger"
                                                    data-confirm-golongan-pangkat-destroy="true"
                                                    data-unique="{{ $item->id_golongan_pangkat }}">
                                                    <span data-confirm-golongan-pangkat-destroy="true"
                                                        data-unique="{{ $item->id_golongan_pangkat }}"
                                                        class="select-all fa-fw fa-lg fas"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">
                                        <p class="mt-3 text-center">Tidak ada data master golongan pangkat :(</p>
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
    @vite(['resources/js/extensions/simple-datatable/master-golongan-pangkat.js'])
    {{-- SweetAlert --}}
    @include('sweetalert::alert')
    @include('extensions.sweetalert.script')
    @vite(['resources/js/extensions/sweetalert/master-golongan-pangkat.js'])
@endsection
