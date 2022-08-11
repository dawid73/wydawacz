@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista pracowników</div>

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
                    <a class="btn btn-primary" href="{{ route('employee.create') }}" role="button">Dodaj</a>
                    <hr>
                    @endauth
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Imię Nazwisko</th>
                            <th scope="col">Kod</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ( $employees as $employee )
                          <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->code }}</td>
                            <td>
                                @guest
                                    <i style="color: #c2c2d6">Nie zalogowany</i>
                                @else
                                    <a class="btn btn-outline-warning btn-sm" href="{{ route('employee.edit', ['employee' => $employee->id]) }}" role="button">Edytuj</a>
                                    <button class="btn btn-outline-danger btn-sm delete" data-id="{{ $employee->id }}">Usuń</button>
                                @endguest
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(function(){
        $('.delete').click(function(){
            Swal.fire({
            title: 'Na pewno usunąć?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Tak, usuń!',
            cancelButtonText: 'Nie, nie usuwaj!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                method: "DELETE",
                url: "https://localhost/barcode-scanner/public/employee/" + $(this).data("id"),
                })
                .done(function() {
                        window.location.reload();
                });
            }
            })
        });
    });
</script>
@endsection
