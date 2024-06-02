@extends('layout')

@section('content')
    <div class="card container w-50 mt-5">
        <div class="card-header text-bg-primary">
            <h1 class="text-capitalize">Modifier un stagiaire</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('stagiaire.update', $stagiaire->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <select class="form-select" onchange="groupe()" name="filiere_id" id="filiere_id">
                        <option value="">Select Filiere</option>
                        @if ($filieres)
                            @foreach ($filieres as $filiere)
                                <option value="{{ $filiere->id }}"
                                    {{ $filiere->id == $stagiaire->groupe->filiere_id ? 'selected' : '' }}>
                                    {{ $filiere->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="mb-3">
                    <select class="form-select" name="groupe_id" id="groupe_id">
                        <option value="">Select Groupe</option>
                        @foreach ($groupes as $groupe)
                            <option value="{{ $groupe->id }}"
                                {{ $groupe->id == $stagiaire->groupe->id ? 'selected' : '' }}>{{ $groupe->code }}</option>
                        @endforeach
                    </select>

                    @error('groupe_id')
                        <span class="text-danger"><b>{{ $message }}</b></span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="text" name="nom" placeholder="Nom" class="form-control"
                            value="{{ $stagiaire->nom }}">
                        @error('nom')
                            <span class="text-danger"><b>{{ $message }}</b></span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" name="prenom" placeholder="Prenom" class="form-control"
                            value="{{ $stagiaire->prenom }}">
                        @error('prenom')
                            <span class="text-danger"><b>{{ $message }}</b></span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="text" name="cin" placeholder="CIN" class="form-control"
                            value="{{ $stagiaire->cin }}">
                        @error('cin')
                            <span class="text-danger"><b>{{ $message }}</b></span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" name="adresse" placeholder="Adresse" class="form-control"
                            value="{{ $stagiaire->adresse }}">
                        @error('adresse')
                            <span class="text-danger"><b>{{ $message }}</b></span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="text" name="ville" placeholder="Ville" class="form-control"
                            value="{{ $stagiaire->ville }}">
                        @error('ville')
                            <span class="text-danger"><b>{{ $message }}</b></span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" name="gsm" placeholder="GSM" class="form-control"
                            value="{{ $stagiaire->gsm }}">
                        @error('gsm')
                            <span class="text-danger"><b>{{ $message }}</b></span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <input type="file" name="cin_image" class="form-control">
                        @error('cin_image')
                            <span class="text-danger"><b>{{ $message }}</b></span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <input type="file" name="releve_image" class="form-control">
                        @error('releve_image')
                            <span class="text-danger"><b>{{ $message }}</b></span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <input type="file" name="bac_image" class="form-control">
                        @error('bac_image')
                            <span class="text-danger"><b>{{ $message }}</b></span>
                        @enderror
                    </div>
                </div>
                <span> <button class="btn btn-dark my-3">Save</button> <a class="btn btn-danger"
                        href="/stagiaire">Annuler</a></span>

            </form>

        </div>
    </div>
@endsection

<script src="/js/jquery.js"></script>
<script>
    function groupe() {
        $(document).ready(function() {
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
                        $('#groupe_id').append('<option value="' + value.id + '">' + value
                            .code + '</option>');
                    });
                },
                error: function() {
                    console.log('Error retrieving groupes.');
                }
            });
        });
    }
</script>
