@extends('layout')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between text-bg-dark">
            <h1 class="text-capitalize">liste de filieres</h1>
            <a href="/filiere/create" class="btn btn-success">Create</a>

        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Code Filiere</th>
                        <th>Nom Filiere</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($filieres as $f)
                        <tr>
                            <td>{{ $f->code }}</td>
                            <td>{{ $f->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
