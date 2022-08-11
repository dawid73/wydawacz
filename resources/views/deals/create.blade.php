@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Wydanie towaru z magazynu (krok 1)</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="post" action="{{ route('deals.step1') }}">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label for="codeorname">Produkt (Zeskanuj kod lub wpisz nazwe produktu)</label>
                            <input type="text" class="form-control" id="codeorname" name="codeorname" required autofocus>
                        </div>
                        <br/>
                        <button type="submit" class="btn btn-primary">Następny krok</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
