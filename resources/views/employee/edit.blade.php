@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dodaj nowego pracownika</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="post" action="{{ route('employee.update', ['employee' => $employee->id]) }}">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="mb-3">
                            <label for="product">Imię i nazwisko</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="product">Kod (zeskanuj czytnikiem)</label>
                            <input type="text" class="form-control" id="code" name="code" value="{{ $employee->code }}" required autofocus>
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
