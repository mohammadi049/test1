@extends('layout')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between text-bg-dark">
            <h1 class="text-capitalize">Liste des stagiaires</h1>
            <a href="/stagiaire/create" class="btn btn-success">Create</a>
        </div>
        <div class="card-body">
            <form action="/stagiaire" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-select my-3 ">
                    <select class="form-select" onchange="groupe()" name="filiere_id" id="filiere_id">
                        <option value="">Select Filiere</option>
                        @foreach ($filieres as $filiere)
                            <option value="{{ $filiere->id }}">{{ $filiere->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-select my-3 ">
                    <select class="form-select" name="groupe_id" onChange="show_list()" id="groupe_id">
                        <option value="">Select Groupe</option>
                    </select>
                    @error('groupe_id')
                        <span class="text-danger"><b>{{ $message }}</b></span>
                    @enderror
                </div>
            </form>
        </div>
    </div>
    <table class="table table-striped mt-5">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="info">

        </tbody>
    </table>

    <script src="/js/jquery.js"></script>
    <script>
        function groupe() {
            const filiere_id = $('#filiere_id').val();
            $.ajax({
                url: "/groupe/get",
                type: "POST",
                data: {
                    filiere_id: filiere_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    $('#groupe_id').empty();
                    $('#groupe_id').append('<option value="">Select Groupe</option>');
                    $.each(result, function(key, value) {
                        $('#groupe_id').append('<option value="' + value.id + '">' + value.code +
                            '</option>');
                    });
                },
                error: function() {
                    console.log('Error retrieving groupes.');
                }
            });
        }

        function show_list() {
            const filiere_id = $('#filiere_id').val();
            const groupe_id = $('#groupe_id').val();
            $.ajax({
                url: "/stagiaire/get",
                type: "POST",
                data: {
                    groupe_id: groupe_id,
                    filiere_id: filiere_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    $('#info').empty();
                    $.each(result, function(key, value) {
                        // Generate edit and delete links
                        const editLink = '<a href="/stagiaire/' + value.id +
                            '/edit" class="btn btn-warning">Edit</a>';
                        const deleteForm = '<form action="/stagiaire/' + value.id +
                            '" method="POST" style="display: inline;">' +
                            '@csrf' +
                            '@method('DELETE')' +
                            '<button type="submit" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this stagiaire?\')">Delete</button>' +
                            '</form>';

                        $('#info').append(`
                    <tr>
                        <td>${value.nom}</td>
                        <td>${value.prenom}</td>
                        <td>
                            <a href="/stagiaire/${value.id}" class="btn btn-primary">Show</a>
                            ${editLink}
                            ${deleteForm}
                        </td>
                    </tr>
                `);
                    });
                },
                error: function() {
                    console.log('Error retrieving stagiaires.');
                }
            });
        }
    </script>
@endsection
