@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Wygeneruj kod kreskowy</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h5>Wygeneruj losowy kod kreskowy.</h5>
                    <div class="mb-3">
                        <a href="{{ route('barcode.generate') }}"><button type="submit" class="btn btn-primary">Wygeneruj nowy losowy kod kreskowy</button></a>
                    </div>
                    <hr>
                    <h5>Zrób kopię kodu kreskowego. Zeskanuj w to okno kod kreskowy.</h5>
                    <br/>
                    <form method="post" action="{{ route('barcode.clone') }}">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label for="product">Kod (zeskanuj czytnikiem)</label>
                            <input type="text" class="form-control" id="code" name="code" required autofocus>
                        </div>
                        <br/>
                        <button type="submit" class="btn btn-primary">Wygeneruj</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
