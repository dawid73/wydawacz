@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dodaj nowego produkt</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="post" action="{{ route('product.store') }}">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label for="name">Nazwa</label>
                            <input type="text" class="form-control" id="name" name="name" autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Opis</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="code">Kod</label>
                            <input type="text" class="form-control" id="code" name="code" required>
                        </div>
                        <br/>
                        <button type="submit" class="btn btn-primary">Dodaj</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
