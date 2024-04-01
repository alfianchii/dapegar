@extends('pages.dashboard.layouts.main')

{{-- --------------------------------- Title --}}
@section('title', $title)

{{-- --------------------------------- Links --}}
@section('additional_links')
@endsection

@section('content')
    <div class="mb-0 page-heading">
        <div class="page-title">
            <div class="row">
                <div class="order-last col-12 col-md-6 order-md-1">
                    <h2>Ganti Password</h2>
                    <p class="text-subtitle text-muted">
                        Menjadikan akun yang kamu miliki lebih aman dengan mengganti password.
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
                                <a href="{{ $dashboardURL }}/users/account">Profil</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Password
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
                        <h3 class="card-title">Password</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form" action="{{ $dashboardURL }}/users/account/password/update" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="row">
                            <div class="mb-1 col-md-6 col-12">
                                <div
                                    class="form-group has-icon-left mandatory @error('current_password'){{ 'is-invalid' }}@enderror">
                                    <label for="password" class="form-label">Password Saat Ini</label>
                                    <div class="flex-row-reverse d-flex align-items-center position-relative"
                                        id="wrapper">
                                        <input autofocus type="password" class="py-2 mt-1 form-control"
                                            placeholder="e.g. p455w0rd" id="password" name="current_password"
                                            maxlength="255" />
                                        <div class="pt-1 form-control-icon">
                                            <i class="bi bi-key"></i>
                                        </div>
                                        <div class="position-absolute end-0">
                                            <button type="button" class="p-0 mx-2 btn" style="border: none;"
                                                id="show-password" data-bs-toggle="tooltip"
                                                data-bs-title="Tampilkan/sembunyikan password.">
                                                <i class="bi bi-eye-slash-fill"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @error('current_password')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-1 col-md-6 col-12">
                                <div
                                    class="form-group has-icon-left mandatory @error('new_password'){{ 'is-invalid' }}@enderror">
                                    <label for="password-confirmation" class="form-label">Password Baru</label>
                                    <div class="flex-row-reverse d-flex align-items-center position-relative"
                                        id="wrapper">
                                        <input type="password" class="py-2 mt-1 form-control" placeholder="e.g. p455w0rd"
                                            id="password-confirmation" name="new_password" maxlength="255" />
                                        <div class="pt-1 form-control-icon">
                                            <i class="bi bi-key-fill"></i>
                                        </div>

                                        <div class="position-absolute end-0">
                                            <button type="button" class="p-0 mx-2 btn" style="border: none;"
                                                id="show-password-confirmation" data-bs-toggle="tooltip"
                                                data-bs-title="Tampilkan/sembunyikan password.">
                                                <i class="bi bi-eye-slash-fill"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @error('new_password')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mt-3 col-12 d-flex justify-content-start">
                                <button type="submit" class="mb-1 btn btn-primary me-1">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

{{-- --------------------------------- Scripts --}}
@section('additional_scripts')
    {{-- SweetAlert --}}
    @include('sweetalert::alert')
    {{-- Display password --}}
    @vite(['resources/js/utils/display-password.js'])
@endsection
