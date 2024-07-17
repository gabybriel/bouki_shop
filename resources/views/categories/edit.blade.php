@extends('layouts.admin-layout')

@section('admin-content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Modifier la catégorie</h5>

        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    {{ $error }}
                    @endforeach
                </div>
                @endif
                <form method="post" action="{{ route('categories.update', $categorie->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-1">
                        <div class="col-md-4">
                            <label for="categoriename" class="form-label">Nom de la catégorie</label>
                            <input type="text" class="form-control" id="categoriename" name="categoriename" placeholder="Nom de la catégorie" value="{{ $categorie->categoriename }}">
                        </div>
                        <div class="col-md-6">
                            <label for="imageField" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
