@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Wydanie towaru z magazynu (krok 3)</div>

                <div class="card-body">
                    <form method="post" action="{{ route('deals.store') }}">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="code" name="code" value="{{ $productcode }}" required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="name">Nazwa produktu</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $productname }}" required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="destiny">Przeznaczenie</label>
                            <input type="text" class="form-control" id="destiny" name="destiny" value='{{ $destiny }}' required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="employee">Pracownik</label>
                            <input type="text" class="form-control" id="employee" name="employee" value='{{ $employee }}' required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="pcs">Sztuk</label>
                            <input type="number" class="form-control" id="pcs" name="pcs" value='1' required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Notatki (opcjonalnie)</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                          </div>
                        <br/>
                        <button type="submit" class="btn btn-primary" autofocus>Wydaj</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
