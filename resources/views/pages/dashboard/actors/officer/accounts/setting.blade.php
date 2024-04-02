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
                    <h2>Pengaturan</h2>
                    <p class="text-subtitle text-muted">
                        Lakukan set-up pada beberapa data akun yang kamu miliki.
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
                                Pengaturan
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
                    <form class="form" action="{{ $dashboardURL }}/users/account/settings/{{ $userData->id_user }}"
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
                                            placeholder="e.g. Muhammad Alfian" id="nama_lengkap" name="nama_lengkap"
                                            value="{{ old('nama_lengkap') ?? $userData->nama_lengkap }}" />
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
                                <div class="form-group has-icon-left mandatory">
                                    <label class="form-label">NIP</label>
                                    <div class="position-relative">
                                        <input type="text" class="py-2 form-control" placeholder="{{ $userData->nip }}"
                                            disabled readonly />
                                        <div class="form-control-icon">
                                            <i class="py-2 bi bi-person-vcard"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-1 col-md-6 col-12">
                                <div class="form-group has-icon-left mandatory">
                                    <label class="form-label">Tempat Lahir</label>
                                    <div class="position-relative">
                                        <input type="text" class="py-2 form-control"
                                            placeholder="{{ $userData->tempat_lahir }}" disabled readonly />
                                        <div class="form-control-icon">
                                            <i class="py-2 bi bi-person-vcard"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-1 col-md-6 col-12">
                                <div
                                    class="form-group has-icon-left mandatory @error('alamat'){{ 'is-invalid' }}@enderror">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <div class="position-relative">
                                        <input type="text" class="py-2 form-control"
                                            placeholder="e.g. Jl. Free Fire Factory, No. 1, Kla Only" id="alamat"
                                            name="alamat" value="{{ old('alamat') ?? $userData->alamat }}" />
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
                                <div class="form-group has-icon-left mandatory">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <div class="position-relative">
                                        <input type="date" class="py-2 form-control"
                                            value="{{ $userData->tanggal_lahir->format('Y-m-d') }}" disabled readonly />
                                        <div class="form-control-icon">
                                            <i class="py-2 bi bi-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-1 col-md-6 col-12">
                                <div class="form-group has-icon-left mandatory">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <div class="position-relative">
                                        <input type="text" class="py-2 form-control"
                                            placeholder="@if ($userData->gender == 'L') Laki-laki @else Perempuan @endif"
                                            disabled readonly />
                                        <div class="form-control-icon">
                                            <i class="py-2 bi bi-person-vcard"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-1 col-md-6 col-12">
                                <div
                                    class="form-group has-icon-left mandatory @error('telepon'){{ 'is-invalid' }}@enderror">
                                    <label for="telepon" class="form-label">Telepon</label>
                                    <div class="position-relative">
                                        <input type="text" class="py-2 form-control" placeholder="e.g. 082384763478"
                                            id="telepon" name="telepon"
                                            value="{{ old('telepon') ?? $userData->telepon }}" min="11"
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
                                            placeholder="e.g. alfian.ganteng@gmail.com" id="email" name="email"
                                            value="{{ old('email') ?? $userData->email }}" maxlength="255" />
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
                                <div class="form-group has-icon-left @error('npwp'){{ 'is-invalid' }}@enderror">
                                    <label for="npwp" class="form-label">NPWP</label>
                                    <div class="position-relative">
                                        <input type="text" class="py-2 form-control"
                                            placeholder="e.g. 09.254.294.3-407.001" id="npwp" name="npwp"
                                            value="{{ old('npwp') ?? $userData->npwp }}" maxlength="25" />
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
                                <div class="form-group has-icon-left mandatory">
                                    <label class="form-label">Golongan Pangkat</label>
                                    <div class="position-relative">
                                        <input type="text" class="py-2 form-control"
                                            placeholder="{{ $userData->golonganPangkat->kode_golongan . '/' . $userData->golonganPangkat->kode_ruang . ' - ' . $userData->golonganPangkat->nama_pangkat }}"
                                            disabled readonly />
                                        <div class="form-control-icon">
                                            <i class="py-2 bi bi-person-vcard"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-1 col-md-6 col-12">
                                <div class="form-group has-icon-left mandatory">
                                    <label class="form-label">Eselon</label>
                                    <div class="position-relative">
                                        <input type="text" class="py-2 form-control"
                                            placeholder="{{ $userData->eselon->nama_eselon }}" disabled readonly />
                                        <div class="form-control-icon">
                                            <i class="py-2 bi bi-person-vcard"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-1 col-md-6 col-12">
                                <div class="form-group has-icon-left mandatory">
                                    <label class="form-label">Jabatan</label>
                                    <div class="position-relative">
                                        <input type="text" class="py-2 form-control"
                                            placeholder="{{ $userData->jabatan->nama_jabatan }}" disabled readonly />
                                        <div class="form-control-icon">
                                            <i class="py-2 bi bi-person-vcard"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-1 col-md-6 col-12">
                                <div class="form-group has-icon-left mandatory">
                                    <label class="form-label">Lokasi Kerja</label>
                                    <div class="position-relative">
                                        <input type="text" class="py-2 form-control"
                                            placeholder="{{ $userData->lokasiKerja->nama_lokasi_kerja }}" disabled
                                            readonly />
                                        <div class="form-control-icon">
                                            <i class="py-2 bi bi-person-vcard"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-1 col-md-6 col-12">
                                <div class="form-group has-icon-left mandatory">
                                    <label class="form-label">Unit Kerja</label>
                                    <div class="position-relative">
                                        <input type="text" class="py-2 form-control"
                                            placeholder="{{ $userData->unitKerja->nama_unit_kerja }}" disabled readonly />
                                        <div class="form-control-icon">
                                            <i class="py-2 bi bi-person-vcard"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-1 col-12">
                                <div class="form-group mandatory @error('id_agama'){{ 'is-invalid' }}@enderror">
                                    <fieldset class="form-group">
                                        <label class="form-label" for="id_agama">
                                            Agama
                                        </label>

                                        <select class="form-select" id="id_agama" name="id_agama">
                                            @foreach ($agama as $item)
                                                <option
                                                    value="{{ $item->id_agama }}"@if (old('id_agama') ?? $userData->id_agama === $item->id_agama) {{ 'selected' }} @endif>
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
                        </div>

                        <div class="row">
                            <div class="mb-1 col-12">
                                <div class="form-group">
                                    <label
                                        class="@if ($userData->foto_profil) {{ 'd-block' }} @endif{{ 'form-label' }} @error('foto_profil'){{ 'text-danger' }}@enderror">Foto</label>
                                    <div class="position-relative">
                                        {{-- Image preview --}}
                                        @if ($userData->foto_profil)
                                            <div class="mb-3 position-relative">
                                                <a data-bs-toggle="tooltip"
                                                    data-bs-original-title="Hapus foto profil kamu."
                                                    class="px-2 pt-2 position-absolute btn btn-danger"
                                                    data-confirm-user-your-profile-picture-destroy="true"
                                                    data-unique="{{ $userData->id_user }}"
                                                    data-redirect="{{ $userData->id_user }}">
                                                    <span data-confirm-user-your-profile-picture-destroy="true"
                                                        data-unique="{{ $userData->id_user }}"
                                                        data-redirect="{{ $userData->id_user }}"
                                                        class="select-all fa-fw fa-lg fas"></span>
                                                </a>

                                                <div class="d-block">
                                                    <img width="200px" class="mb-3 rounded img-fluid"
                                                        src="{{ asset('storage/' . $userData->foto_profil) }}"
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
    {{-- SweetAlert --}}
    @include('extensions.sweetalert.script')
    @vite(['resources/js/extensions/sweetalert/user.js'])
@endsection
