@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista wydań z magazynu</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-primary" href="{{ route('deals.add') }}">Dodaj wydanie</a>
                    @auth
                    <a class="btn btn-primary" href="{{ route('deals.index.delete') }}">Pokaż usunięte</a>
                    @endauth
                    <br/>
                    @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('message'); }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    @endif
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Data / czas</th>
                            <th scope="col">Nazwa produktu</th>
                            <th scope="col">Sztuk</th>
                            <th scope="col">Osoba</th>
                            <th scope="col">Akcje</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ( $deals as $deal )
                          <tr>
                            <td>{{ $deal->created_at }}</td>
                            <td>{{ $deal->product_name }}</td>
                            <td>{{ $deal->pcs }}</td>
                            <td>{{ $deal->employee }}</td>
                            <td>
                            @guest
                                <i style="color: #c2c2d6">Nie zalogowany</i>
                            @else
                                <a class="btn btn-outline-warning btn-sm" href="{{ route('deals.edit', ['id' => $deal->id]) }}" role="button">Edytuj</a>
                                <form method="post" action="{{ route('deals.delete', ['id' => $deal->id]) }}">
                                    @method('PUT')
                                    <button type="submit" class="btn btn-outline-danger btn-sm delete">Usuń</button>
                                </form>
                            @endguest
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{ $deals->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
