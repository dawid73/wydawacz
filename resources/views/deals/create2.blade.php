@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Wydanie towaru z magazynu (krok 2)</div>

                <div class="card-body">
                    <form method="post" action="{{ route('deals.step2') }}">
                        {{ csrf_field() }}
                        @if( $product == null)
                            <div class="alert alert-primary" role="alert">
                                Nie znaleziono produktu w bazie. Musisz wpisać ręcznie całą nazwę produktu.
                            </div>
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="code" name="code" value="{{ $code }}" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="name">Nazwa produktu</label>
                                <input type="text" class="form-control" id="name" name="name" required autofocus>
                            </div>
                        @else
                            <div class="mb-3">
                                <label for="code">Kod</label>
                                <input type="text" class="form-control" id="code" name="code" value="{{ $product->kodykreskowe }}" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="name">Nazwa produktu</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $product->nazwa }}" required readonly>
                            </div>
                        @endif
                            <div class="mb-3">
                                <label for="destiny">Przeznaczenie</label>
                                <input type="text" class="form-control" id="destiny" name="destiny" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="searchname">Pracownik (Zeskanuj kartę lub wpisz część nazwiska)</label>
                                <input type="text" class="form-control" id="searchname" name="searchname" required autofocus>
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
