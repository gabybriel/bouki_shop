@extends('layouts.admin-layout')

@section('admin-content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4"> Ajouter des sous-categories </h5>

        <div class="card">
            <div class="card-body">

                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
                @endforeach
                @endif

                <form method="post" action="{{ route('sous-categories.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-1">
                        <div class="col-md-6">
                            <label for="sous_categorie" class="form-label">Sous-catégorie</label>
                            <input type="text" class="form-control" id="sous_categorie" name="sous_categorie" placeholder="Sous-catégorie">
                        </div>
                        <div class="col-md-6">
                            <label for="categorie_id" class="form-label">Catégorie</label>
                            <select class="form-select" id="categorie_id" name="categorie_id">
                                <!-- Options de catégorie -->
                                <option value="">Selectionner</option>
                                @foreach($categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->categoriename }}</option>
                                @endforeach
                                <!-- Ajoutez d'autres options si nécessaire -->
                            </select>
                        </div>
                    </div><br>

                    <div class="row mb-1">
                        <div class="col-md-6">
                            <label for="sous_categorie" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary"> Ajouter </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection