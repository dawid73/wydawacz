@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista produktów</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('message'); }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @auth
                    <a class="btn btn-primary" href="{{ route('product.create') }}" role="button">Dodaj</a>
                    <br/>
                    <hr>
                    @endauth
                    <form method="get" action="">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="search" class="col-form-label">Szukaj</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="search" name="search" class="form-control">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-outline-secondary btn-sm">Szukaj</button>
                            </div>
                        </div>
                        <br/>
                    </form>
                    <hr>
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nazwa</th>
                            <th scope="col">Kod</th>
                            <th scope="col"> </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ( $products as $product )
                          <tr @if( $product->disable ) class="table-danger" @endif>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->code }}</td>
                            <td>
                            @guest
                                <i style="color: #c2c2d6">Nie zalogowany</i>
                            @else
                                <a class="btn btn-outline-warning btn-sm" href="{{ route('product.edit', ['product' => $product->id]) }}" role="button">Edytuj</a>

                            @endguest
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
