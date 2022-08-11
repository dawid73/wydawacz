@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edytujesz produkt o ID: {{ $product->id }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="post" action="{{ route('product.update', ['product' => $product->id])  }}">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="mb-3">
                            <label for="code">Kod</label>
                            <input type="text" class="form-control" id="code" name="code" value={{ $product->code }} required>
                        </div>
                        <div class="mb-3">
                            <label for="name">Nazwa</label>
                            <input type="text" class="form-control" id="name" value={{ $product->name }} name="name">
                        </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Opis</label>
                                <textarea class="form-control" id="description" name="description" value={{ $product->description }} rows="3"></textarea>
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
