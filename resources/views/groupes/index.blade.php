@extends('layout')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between text-bg-dark">
            <h1 class="text-capitalize">liste des groupes</h1>
            <a href="/groupe/create" class="btn btn-success">Create</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Code Groupe</th>
                        <th>Nom Groupe</th>
                        <th>Code Filiere</th>
                        {{-- <th>Liste</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($groupes as $g)
                        <tr>
                            <td>{{ $g->code }}</td>
                            <td>{{ $g->name }}</td>
                            <td>{{ $g->getFiliere->code }}</td>
                            {{-- <td>
                                <a href="">Liste Stagiaire</a>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
