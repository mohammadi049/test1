@extends('layout')
@section('content')
    <div class="card container w-50">
        <div class="card-header text-bg-primary">
            <h1 class="text-capitalize">ajouter un groupe</h1>
        </div>
        <div class="card-body">
            <form action="/groupe" method="post">
                @csrf
                <div class="form-group my-3">
                    <label for="code">Filiere</label>
                    <select name="filiere_id" id="filiere_id" class="form-select">
                    <option value="">Select Filiere</option>
                    @foreach ($filieres as $filiere)
                        <option value="{{$filiere->id}}">{{$filiere->name}}</option>
                    @endforeach
                    </select>

                </div>
                <div class="form-group my-3">
                    <label for="code">code</label>
                    <input type="text" name="code" id="code" class="form-control" placeholder="code du groupe">
                </div>
                <div class="form-group my-3">
                    <label for="name">Nom</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="nom du groupe">
                </div>
                <button class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection