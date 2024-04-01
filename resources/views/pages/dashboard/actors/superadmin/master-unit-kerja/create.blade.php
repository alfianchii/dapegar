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
                <div class="order-last col-12 col-md-6 order-md-1">
                    <h2>Buat Unit Kerja</h2>
                    <p class="text-subtitle text-muted">
                        Buat sebuah data master unit kerja.
                    </p>
                    <hr>
                    <div class="mb-4">
                        <a href="{{ back()->getTargetUrl() }}" data-bs-toggle="tooltip"
                            data-bs-original-title="Kembali ke halaman sebelumnya." class="px-2 pt-2 btn btn-secondary me-1">
                            <span class="text-white select-all fa-fw fa-lg fas"></span>
                            Kembali
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
                                <a href="{{ $dashboardURL }}/master-unit-kerja">Unit Kerja</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Buat
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
                            <h3 class="card-title">Unit Kerja</h3>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ $dashboardURL }}/master-unit-kerja" method="POST">
                                    @csrf

                                    <div class="row">
                                        <div class="mb-1 col-12">
                                            <div
                                                class="form-group has-icon-left mandatory @error('nama_unit_kerja'){{ 'is-invalid' }}@enderror">
                                                <label for="nama_unit_kerja" class="form-label">Nama Unit Kerja</label>
                                                <div class="position-relative">
                                                    <input autofocus type="text" class="py-2 form-control"
                                                        placeholder="e.g. MAL PELAYANAN PUBLIK" id="nama_unit_kerja"
                                                        name="nama_unit_kerja" value="{{ old('nama_unit_kerja') }}" />
                                                    <div class="form-control-icon">
                                                        <i class="py-2 bi bi-card-heading"></i>
                                                    </div>
                                                    @error('nama_unit_kerja')
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
@endsection
