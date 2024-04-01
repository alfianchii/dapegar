@extends('pages.dashboard.layouts.main')

{{-- --------------------------------- Title --}}
@section('title', $title)

{{-- --------------------------------- Links --}}
@section('additional_links')
    {{-- Filepond --}}
    @include('extensions.filepond.link')
    {{-- SweetAlert --}}
    @include('extensions.sweetalert.link')
@endsection

{{-- --------------------------------- Content --}}
@section('content')
    <div class="mb-0 page-heading">
        <div class="page-title">
            <div class="row">
                <div class="order-last col-12 col-md-6 order-md-1">
                    <h2>Sunting Pengguna</h2>
                    <p class="text-subtitle text-muted">
                        Lakukan penyuntingan terhadap pengguna {{ $theUser->nama_lengkap }}.
                    </p>
                    <hr>
                    <div class="mb-4">
                        <a href="{{ back()->getTargetUrl() }}" data-bs-toggle="tooltip"
                            data-bs-original-title="Kembali ke halaman sebelumnya." class="px-2 pt-2 btn btn-secondary me-1">
                            <span class="text-white select-all fa-fw fa-lg fas"></span>
                            Kembali
                        </a>

                        <a data-bs-toggle="tooltip" data-bs-original-title="Hapus pengguna {{ $theUser->nama_lengkap }}."
                            class="px-2 pt-2 btn btn-danger" data-confirm-user-destroy="true"
                            data-unique="{{ $theUser->id_user }}">
                            <span data-confirm-user-destroy="true" data-unique="{{ $theUser->id_user }}"
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
                                <a href="{{ $dashboardURL }}/users">Pengguna</a>
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
                            <h3 class="card-title">Pengguna</h3>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ $dashboardURL }}/users/{{ $theUser->id_user }}"
                                    method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf

                                    <div class="row">
                                        <div class="mb-1 col-md-6 col-12">
                                            <div
                                                class="form-group has-icon-left mandatory @error('nama_lengkap'){{ 'is-invalid' }}@enderror">
                                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                                <div class="position-relative">
                                                    <input autofocus type="text" class="py-2 form-control"
                                                        placeholder="e.g. Muhammad Alfian" id="nama_lengkap"
                                                        name="nama_lengkap"
                                                        value="{{ old('nama_lengkap') ?? $theUser->nama_lengkap }}" />
                                                    <div class="form-control-icon">
                                                        <i class="py-2 bi bi-person"></i>
                                                    </div>
                                                    @error('nama_lengkap')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-1 col-md-6 col-12">
                                            <div
                                                class="form-group has-icon-left mandatory @error('nip'){{ 'is-invalid' }}@enderror">
                                                <label for="nip" class="form-label">NIP</label>
                                                <div class="position-relative">
                                                    <input type="text" class="py-2 form-control"
                                                        placeholder="e.g. 10502417089" id="nip" name="nip"
                                                        value="{{ old('nip') ?? $theUser->nip }}" maxlength="11" />
                                                    <div class="form-control-icon">
                                                        <i class="py-2 bi bi-person-vcard"></i>
                                                    </div>
                                                    @error('nip')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-1 col-md-6 col-12">
                                            <div
                                                class="form-group has-icon-left mandatory @error('tempat_lahir'){{ 'is-invalid' }}@enderror">
                                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                                <div class="position-relative">
                                                    <input type="text" class="py-2 form-control"
                                                        placeholder="e.g. Tangerang" id="tempat_lahir" name="tempat_lahir"
                                                        value="{{ old('tempat_lahir') ?? $theUser->tempat_lahir }}" />
                                                    <div class="form-control-icon">
                                                        <i class="py-2 bi bi-house-door"></i>
                                                    </div>
                                                    @error('tempat_lahir')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-1 col-md-6 col-12">
                                            <div
                                                class="form-group has-icon-left mandatory @error('alamat'){{ 'is-invalid' }}@enderror">
                                                <label for="alamat" class="form-label">Alamat</label>
                                                <div class="position-relative">
                                                    <input type="text" class="py-2 form-control"
                                                        placeholder="e.g. Jl. Free Fire Factory, No. 1, Kla Only"
                                                        id="alamat" name="alamat"
                                                        value="{{ old('alamat') ?? $theUser->alamat }}" />
                                                    <div class="form-control-icon">
                                                        <i class="py-2 bi bi-house"></i>
                                                    </div>
                                                    @error('alamat')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-1 col-md-6 col-12">
                                            <div
                                                class="form-group has-icon-left mandatory @error('tanggal_lahir'){{ 'is-invalid' }}@enderror">
                                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                <div class="position-relative">
                                                    <input type="date" class="py-2 form-control" id="tanggal_lahir"
                                                        name="tanggal_lahir"
                                                        value="{{ old('tanggal_lahir') ?? $theUser->tanggal_lahir->format('Y-m-d') }}" />
                                                    <div class="form-control-icon">
                                                        <i class="py-2 bi bi-calendar"></i>
                                                    </div>

                                                    @error('tanggal_lahir')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-1 col-md-6 col-12">
                                            <div
                                                class="form-group mandatory @error('gender'){{ 'is-invalid' }}@enderror">
                                                <fieldset>
                                                    <label for="gender-L" class="form-label">
                                                        Jenis Kelamin
                                                    </label>
                                                    <div class="d-flex">
                                                        <div class="form-check me-3">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                id="gender-L" value="L"
                                                                @if (old('gender', $theUser->gender) == 'L') checked @endif />
                                                            <label class="form-check-label form-label" for="gender-L">
                                                                Laki-laki
                                                            </label>
                                                        </div>
                                                        <div class="form-check me-3">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                id="gender-P" value="P"
                                                                @if (old('gender', $theUser->gender) == 'P') checked @endif />
                                                            <label class="form-check-label form-label" for="gender-P">
                                                                Perempuan
                                                            </label>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                @error('gender')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-1 col-md-6 col-12">
                                            <div
                                                class="form-group has-icon-left mandatory @error('telepon'){{ 'is-invalid' }}@enderror">
                                                <label for="telepon" class="form-label">Telepon</label>
                                                <div class="position-relative">
                                                    <input type="text" class="py-2 form-control"
                                                        placeholder="e.g. 082384763478" id="telepon" name="telepon"
                                                        value="{{ old('telepon') ?? $theUser->telepon }}" min="11"
                                                        max="13" maxlength="13" />
                                                    <div class="form-control-icon">
                                                        <i class="py-2 bi bi-telephone"></i>
                                                    </div>

                                                    @error('telepon')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-1 col-md-6 col-12">
                                            <div
                                                class="form-group has-icon-left mandatory @error('email'){{ 'is-invalid' }}@enderror">
                                                <label for="email" class="form-label">Email</label>
                                                <div class="position-relative">
                                                    <input type="email" class="py-2 form-control"
                                                        placeholder="e.g. alfian.ganteng@gmail.com" id="email"
                                                        name="email" value="{{ old('email') ?? $theUser->email }}"
                                                        maxlength="255" />
                                                    <div class="form-control-icon">
                                                        <i class="py-2 bi bi-envelope-paper"></i>
                                                    </div>
                                                    @error('email')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-1 col-md-6 col-12">
                                            <div
                                                class="form-group has-icon-left @error('npwp'){{ 'is-invalid' }}@enderror">
                                                <label for="npwp" class="form-label">NPWP</label>
                                                <div class="position-relative">
                                                    <input type="text" class="py-2 form-control"
                                                        placeholder="e.g. 09.254.294.3-407.001" id="npwp"
                                                        name="npwp" value="{{ old('npwp') ?? $theUser->npwp }}"
                                                        maxlength="25" />
                                                    <div class="form-control-icon">
                                                        <i class="py-2 bi bi-cash"></i>
                                                    </div>
                                                    @error('npwp')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-1 col-md-6 col-12">
                                            <div
                                                class="form-group mandatory @error('id_golongan_pangkat'){{ 'is-invalid' }}@enderror">
                                                <fieldset class="form-group">
                                                    <label class="form-label" for="id_golongan_pangkat">
                                                        Golongan Pangkat
                                                    </label>

                                                    <select class="form-select" id="id_golongan_pangkat"
                                                        name="id_golongan_pangkat">
                                                        @foreach ($golonganPangkat as $item)
                                                            <option value="{{ $item->id_golongan_pangkat }}"
                                                                @if (old('id_golongan_pangkat') ?? $theUser->id_golongan_pangkat === $item->id_golongan_pangkat) {{ 'selected' }} @endif>
                                                                {{ $item->kode_golongan }}/{{ $item->kode_ruang }} -
                                                                {{ $item->nama_pangkat }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>

                                                @error('id_golongan_pangkat')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-1 col-md-6 col-12">
                                            <div
                                                class="form-group mandatory @error('id_eselon'){{ 'is-invalid' }}@enderror">
                                                <fieldset class="form-group">
                                                    <label class="form-label" for="id_eselon">
                                                        Eselon
                                                    </label>

                                                    <select class="form-select" id="id_eselon" name="id_eselon">
                                                        @foreach ($eselon as $item)
                                                            <option
                                                                value="{{ $item->id_eselon }}"@if (old('id_eselon') ?? $theUser->id_eselon === $item->id_eselon) {{ 'selected' }} @endif>
                                                                {{ $item->nama_eselon }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>

                                                @error('id_eselon')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-1 col-md-6 col-12">
                                            <div
                                                class="form-group mandatory @error('id_jabatan'){{ 'is-invalid' }}@enderror">
                                                <fieldset class="form-group">
                                                    <label class="form-label" for="id_jabatan">
                                                        Jabatan
                                                    </label>

                                                    <select class="form-select" id="id_jabatan" name="id_jabatan">
                                                        @foreach ($jabatan as $item)
                                                            <option
                                                                value="{{ $item->id_jabatan }}"@if (old('id_jabatan') ?? $theUser->id_jabatan === $item->id_jabatan) {{ 'selected' }} @endif>
                                                                {{ $item->nama_jabatan }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>

                                                @error('id_jabatan')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-1 col-md-6 col-12">
                                            <div
                                                class="form-group mandatory @error('id_lokasi_kerja'){{ 'is-invalid' }}@enderror">
                                                <fieldset class="form-group">
                                                    <label class="form-label" for="id_lokasi_kerja">
                                                        Lokasi Kerja
                                                    </label>

                                                    <select class="form-select" id="id_lokasi_kerja"
                                                        name="id_lokasi_kerja">
                                                        @foreach ($lokasiKerja as $item)
                                                            <option
                                                                value="{{ $item->id_lokasi_kerja }}"@if (old('id_lokasi_kerja') ?? $theUser->id_lokasi_kerja === $item->id_lokasi_kerja) {{ 'selected' }} @endif>
                                                                {{ $item->nama_lokasi_kerja }} ({{ $item->nama_alias }})
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>

                                                @error('id_lokasi_kerja')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-1 col-md-6 col-12">
                                            <div
                                                class="form-group mandatory @error('id_unit_kerja'){{ 'is-invalid' }}@enderror">
                                                <fieldset class="form-group">
                                                    <label class="form-label" for="id_unit_kerja">
                                                        Lokasi Kerja
                                                    </label>

                                                    <select class="form-select" id="id_unit_kerja" name="id_unit_kerja">
                                                        @foreach ($unitKerja as $item)
                                                            <option
                                                                value="{{ $item->id_unit_kerja }}"@if (old('id_unit_kerja') ?? $theUser->id_unit_kerja === $item->id_unit_kerja) {{ 'selected' }} @endif>
                                                                {{ $item->nama_unit_kerja }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>

                                                @error('id_unit_kerja')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-1 col-md-6 col-12">
                                            <div
                                                class="form-group mandatory @error('id_agama'){{ 'is-invalid' }}@enderror">
                                                <fieldset class="form-group">
                                                    <label class="form-label" for="id_agama">
                                                        Agama
                                                    </label>

                                                    <select class="form-select" id="id_agama" name="id_agama">
                                                        @foreach ($agama as $item)
                                                            <option
                                                                value="{{ $item->id_agama }}"@if (old('id_agama') ?? $theUser->id_agama === $item->id_agama) {{ 'selected' }} @endif>
                                                                {{ $item->nama_agama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>

                                                @error('id_agama')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-1 col-md-6 col-12">
                                            <div class="form-group mandatory @error('role'){{ 'is-invalid' }}@enderror">
                                                <fieldset>
                                                    <label for="role-officer" class="form-label">
                                                        Role
                                                    </label>

                                                    <div class="d-flex">
                                                        <div class="form-check me-3">
                                                            <input class="form-check-input" type="radio" name="role"
                                                                id="role-officer" value="officer"
                                                                @if (old('role', $theUser->role) == 'officer') checked @endif />
                                                            <label class="form-check-label form-label" for="role-officer">
                                                                Officer
                                                            </label>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                                @error('role')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-1 col-12">
                                            <div class="form-group">
                                                <label
                                                    class="@if ($theUser->foto_profil) {{ 'd-block' }} @endif{{ 'form-label' }} @error('foto_profil'){{ 'text-danger' }}@enderror">Foto</label>
                                                <div class="position-relative">
                                                    {{-- Image preview --}}
                                                    @if ($theUser->foto_profil)
                                                        <div class="mb-3 position-relative">
                                                            <a data-bs-toggle="tooltip"
                                                                data-bs-original-title="Hapus foto profil {{ $theUser->nama_lengkap }}."
                                                                class="px-2 pt-2 position-absolute btn btn-danger"
                                                                data-confirm-user-profile-picture-destroy="true"
                                                                data-unique="{{ $theUser->id_user }}"
                                                                data-redirect="{{ $theUser->id_user }}">
                                                                <span data-confirm-user-profile-picture-destroy="true"
                                                                    data-unique="{{ $theUser->id_user }}"
                                                                    data-redirect="{{ $theUser->id_user }}"
                                                                    class="select-all fa-fw fa-lg fas"></span>
                                                            </a>

                                                            <div class="d-block">
                                                                <img width="200px" class="mb-3 rounded img-fluid"
                                                                    src="{{ asset('storage/' . $theUser->foto_profil) }}"
                                                                    alt="User Avatar" />
                                                            </div>
                                                        </div>
                                                    @endif

                                                    {{-- Auto crop image file uploader --}}
                                                    <input type="file" class="image-crop-filepond" name="foto_profil"
                                                        id="foto_profil" />

                                                    @error('foto_profil')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
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
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h3 class="card-title">Password</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="form"
                                action="{{ $dashboardURL }}/users/mutate-user-password/{{ $theUser->id_user }}"
                                method="POST" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf

                                <div class="row">
                                    <div class="mb-1 col-12">
                                        <div
                                            class="form-group has-icon-left mandatory @error('new_password'){{ 'is-invalid' }}@enderror">
                                            <label for="password" class="form-label">Password Baru</label>
                                            <div class="flex-row-reverse d-flex align-items-center position-relative"
                                                id="wrapper">
                                                <input type="password" class="py-2 mt-1 form-control"
                                                    placeholder="e.g. p455w0rd" id="password" name="new_password"
                                                    maxlength="255" />
                                                <div class="pt-1 form-control-icon">
                                                    <i class="bi bi-key-fill"></i>
                                                </div>

                                                <div class="position-absolute end-0">
                                                    <button type="button" class="p-0 mx-2 btn" style="border: none;"
                                                        id="show-password" data-bs-toggle="tooltip"
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
                </div>
            </div>
        </section>
    </div>
@endsection

{{-- --------------------------------- Scripts --}}
@section('additional_scripts')
    {{-- Forget error alert config --}}
    @include('utils.forget-session', ['type' => 'error'])

    {{-- Filepond --}}
    @include('extensions.filepond.script')
    @vite(['resources/js/extensions/filepond/image-crop.js'])
    {{-- Display password --}}
    @vite(['resources/js/utils/display-password.js'])
    {{-- SweetAlert --}}
    @include('extensions.sweetalert.script')
    @vite(['resources/js/extensions/sweetalert/user.js'])
@endsection
