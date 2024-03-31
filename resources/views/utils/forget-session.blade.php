@if (session()->has('alert') &&
        array_key_exists('config', session('alert')) &&
        json_decode(session('alert')['config'], true)['icon'] === $type)
    {{ Session::forget('alert') }}
@endif
