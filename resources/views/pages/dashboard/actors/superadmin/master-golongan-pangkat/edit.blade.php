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
                    <h2>Sunting Golongan Pangkat</h2>
                    <p class="text-subtitle text-muted">
                        Lakukan penyuntingan terhadap suatu data master golongan pangkat.
                    </p>
                    <hr>
                    <div class="mb-4">
                        <a href="{{ back()->getTargetUrl() }}" data-bs-toggle="tooltip"
                            data-bs-original-title="Kembali ke halaman sebelumnya." class="px-2 pt-2 btn btn-secondary me-1">
                            <span class="text-white select-all fa-fw fa-lg fas"></span>
                            Kembali
                        </a>

                        <a data-bs-toggle="tooltip" data-bs-original-title="Hapus data master golongan pangkat."
                            href="#" class="px-2 pt-2 btn btn-danger" data-confirm-golongan-pangkat-destroy="true"
                            data-unique="{{ $golonganPangkat->id_golongan_pangkat }}">
                            <span data-confirm-golongan-pangkat-destroy="true"
                                data-unique="{{ $golonganPangkat->id_golongan_pangkat }}"
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
                                <a href="{{ $dashboardURL }}/master-golongan-pangkat">Golongan Pangkat</a>
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
                            <h3 class="card-title">Golongan Pangkat</h3>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form"
                                    action="{{ $dashboardURL }}/master-golongan-pangkat/{{ $golonganPangkat->id_golongan_pangkat }}"
                                    method="POST">
                                    @method('PUT')
                                    @csrf

                                    <div class="row">
                                        <div class="mb-1 col-md-6 col-12">
                                            <div
                                                class="form-group has-icon-left mandatory @error('kode_golongan'){{ 'is-invalid' }}@enderror">
                                                <label for="kode_golongan" class="form-label">Kode Golongan</label>
                                                <div class="position-relative">
                                                    <input autofocus type="text" class="py-2 form-control"
                                                        placeholder="e.g. I" id="kode_golongan" name="kode_golongan"
                                                        value="{{ old('kode_golongan') ?? $golonganPangkat->kode_golongan }}"
                                                        maxlength="5" />
                                                    <div class="form-control-icon">
                                                        <i class="py-2 bi bi-card-heading"></i>
                                                    </div>
                                                    @error('kode_golongan')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-1 col-md-6 col-12">
                                            <div
                                                class="form-group has-icon-left mandatory @error('kode_ruang'){{ 'is-invalid' }}@enderror">
                                                <label for="kode_ruang" class="form-label">Kode Ruang</label>
                                                <div class="position-relative">
                                                    <input autofocus type="text" class="py-2 form-control"
                                                        placeholder="e.g. a" id="kode_ruang" name="kode_ruang"
                                                        value="{{ old('kode_ruang') ?? $golonganPangkat->kode_ruang }}"
                                                        maxlength="20" />
                                                    <div class="form-control-icon">
                                                        <i class="py-2 bi bi-card-heading"></i>
                                                    </div>
                                                    @error('kode_ruang')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-1 col-12">
                                            <div
                                                class="form-group has-icon-left mandatory @error('nama_pangkat'){{ 'is-invalid' }}@enderror">
                                                <label for="nama_pangkat" class="form-label">Nama Pangkat</label>
                                                <div class="position-relative">
                                                    <input autofocus type="text" class="py-2 form-control"
                                                        placeholder="e.g. Juru Muda Tingkat II" id="nama_pangkat"
                                                        name="nama_pangkat"
                                                        value="{{ old('nama_pangkat') ?? $golonganPangkat->nama_pangkat }}"
                                                        maxlength="100" />
                                                    <div class="form-control-icon">
                                                        <i class="py-2 bi bi-card-heading"></i>
                                                    </div>
                                                    @error('nama_pangkat')
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
    @vite(['resources/js/extensions/sweetalert/master-golongan-pangkat.js'])
@endsection
