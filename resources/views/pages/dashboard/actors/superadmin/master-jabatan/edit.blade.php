@extends('pages.dashboard.layouts.main')

{{-- --------------------------------- Title --}}
@section('title', $title)

{{-- --------------------------------- Links --}}
@section('additional_links')
    {{-- Sweetalert --}}
    @include('extensions.sweetalert.link')
@endsection

{{-- --------------------------------- Content --}}
@section('content')
    <div class="mb-0 page-heading">
        <div class="page-title">
            <div class="row">
                <div class="order-last col-12 col-md-6 order-md-1">
                    <h2>Sunting Jabatan</h2>
                    <p class="text-subtitle text-muted">
                        Lakukan penyuntingan terhadap suatu data master jabatan.
                    </p>
                    <hr>
                    <div class="mb-4">
                        <a href="{{ back()->getTargetUrl() }}" data-bs-toggle="tooltip"
                            data-bs-original-title="Kembali ke halaman sebelumnya." class="px-2 pt-2 btn btn-secondary me-1">
                            <span class="text-white select-all fa-fw fa-lg fas"></span>
                            Kembali
                        </a>

                        <a data-bs-toggle="tooltip" data-bs-original-title="Hapus data master jabatan." href="#"
                            class="px-2 pt-2 btn btn-danger" data-confirm-jabatan-destroy="true"
                            data-unique="{{ $jabatan->id_jabatan }}">
                            <span data-confirm-jabatan-destroy="true" data-unique="{{ $jabatan->id_jabatan }}"
                                class="select-all fa-fw fa-lg fas"></span>
                        </a>
                    </div>
                </div>
                <div class="order-first col-12 col-md-6 order-md-2">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ $dashboardURL }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ $dashboardURL }}/master-jabatan">Jabatan</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Sunting
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Jabatan</h3>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ $dashboardURL }}/master-jabatan/{{ $jabatan->id_jabatan }}"
                                    method="POST">
                                    @method('PUT')
                                    @csrf

                                    <div class="row">
                                        <div class="mb-1 col-12">
                                            <div
                                                class="form-group has-icon-left mandatory @error('nama_jabatan'){{ 'is-invalid' }}@enderror">
                                                <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                                                <div class="position-relative">
                                                    <input autofocus type="text" class="py-2 form-control"
                                                        placeholder="e.g. Kristen Protestan" id="nama_jabatan"
                                                        name="nama_jabatan"
                                                        value="{{ old('nama_jabatan') ?? $jabatan->nama_jabatan }}" />
                                                    <div class="form-control-icon">
                                                        <i class="py-2 bi bi-card-heading"></i>
                                                    </div>
                                                    @error('nama_jabatan')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mt-2 col-12 d-flex justify-content-start">
                                            <button type="submit" class="mb-1 btn btn-primary me-1">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
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
    {{-- Forget error alert config --}}
    @include('utils.forget-session', ['type' => 'error'])

    {{-- Sweetalert --}}
    @include('extensions.sweetalert.script')
    @vite(['resources/js/extensions/sweetalert/master-jabatan.js'])
@endsection
