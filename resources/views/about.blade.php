@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">O aplikacj<a href="{{ route('register') }}">i</a></div>

                <div class="card-body">
                    <p><b>{{ $appname }}</b></p>
                    <p>Wersja: v{{ $version }}</p>
                    <p>Laravel: v{{ Illuminate\Foundation\Application::VERSION }}</p>
                    <p>PHP: v{{ PHP_VERSION }}</p>
                    <p>Debug Mode : {{ $debug }}</p>
                    <hr>
                    <p>Autor: <a target="_blank" href="https://dawid.honkisz.cloud">dawid.honkisz.cloud</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
