@extends('pages.landing-page.layouts.main')

@section('title', $title)

@section('additional_links')
@endsection

@section('content')
    <div class="flex flex-col items-center justify-center gap-y-5">
        <h1 class="text-4xl font-bold text-center text-midnight-blue">Selamat Datang di {{ config('app.name') }}</h1>
        <p class="text-lg text-center text-slate-grey">
            {{ config('app.name') }} adalah aplikasi yang membantu Anda dalam mengelola data pegawai dan artikel. Silakan
            klik tombol "Login" di atas untuk memulai. Jika Anda belum memiliki akun, silakan hubungi administrator.
        </p>
    </div>
@endsection

@section('additional_scripts')
@endsection
