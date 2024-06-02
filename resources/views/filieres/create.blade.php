@extends('layout')
@section('content')
    <div class="card container w-50">
        <div class="card-header text-bg-primary">
            <h1 class="text-capitalize">ajouter une filiere</h1>
        </div>
        <div class="card-body">
            <form action="/filiere" method="post">
                @csrf
                <div class="form-group my-3">
                    <label for="code">code</label>
                    <input type="text" name="code" id="code" class="form-control" placeholder="code filiere">
                </div>
                <div class="form-group my-3">
                    <label for="name">Nom</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="nom filiere">
                </div>
                <button class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
