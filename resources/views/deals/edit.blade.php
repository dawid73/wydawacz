@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edytujesz wydanie z: {{ $deal->created_at }}</div>

                <div class="card-body">
                    <form method="post" action="{{ route('deals.update', ['id' => $deal->id]) }}">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name">Kod</label>
                            <input type="text" class="form-control" id="code" name="code" value="{{ $deal->product_code }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="name">Nazwa produktu</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $deal->product_name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="employee">Pracownik</label>
                            <input type="text" class="form-control" id="employee" name="employee" value='{{ $deal->employee }}' required>
                        </div>
                        <div class="mb-3">
                            <label for="pcs">Sztuk</label>
                            <input type="number" class="form-control" id="pcs" name="pcs" value='{{ $deal->pcs }}' required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Notatki (opcjonalnie)</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ $deal->description }}</textarea>
                          </div>
                        <br/>
                        <button type="submit" class="btn btn-primary">Edytuj</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
