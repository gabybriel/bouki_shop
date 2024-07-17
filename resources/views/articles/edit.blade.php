@extends('layouts.admin-layout')

@section('admin-content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Modifier l'article</h5>

        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                <div>
                    @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                </div>
                @endif
                <form method="POST" action="{{ route('articles.update', $article->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="titre" class="form-label">Titre</label>
                            <input type="text" class="form-control" id="titre" name="titre" value="{{ old('titre', $article->titre) }}">
                        </div>
                        <div class="col-md-4">
                            <label for="prix" class="form-label">Prix</label>
                            <input type="number" class="form-control" id="prix" name="prix" value="{{ old('prix', $article->prix) }}">
                        </div>
                        <div class="col-md-4">
                            <label for="numero" class="form-label">Référence</label>
                            <input type="text" class="form-control" id="numero" name="numero" value="{{ old('numero', $article->numero) }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="quantity" class="form-label">Qantité</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $article->quantity) }}">
                        </div>
                        <div class="col-md-4">
                            <label for="taille" class="form-label">Taille</label>
                            <input type="text" class="form-control" id="taille" name="taille" value="{{ old('taille', $article->taille) }}">
                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="exampleInputEmail1" class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-control" rows="5">{!! $article->description !!}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">

                        <div class="col-md-4">
                            <label for="is_promo" class="form-label">Cet article est il en promotion ? <sma>(Facultatif)</sma></label>
                            <input type="numeic" class="form-control" id="is_promo" name="is_promo" placeholder="Remise de: 10%" value=""{{ old('is_promo', $article->is_promo)}}">
                            <small class="form-text text-muted">Entrez la reduction qui sera appliquez au produit </small>
                            <div id="images-preview"></div>
                        </div>
                        <div class="col-md-4">
                            <label for="user_id" class="form-label">Marchand</label>
                            <select id="user_id" name="user_id" class="form-select">
                                <option value="">Seclectionner</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->shopname }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <br>
                    <hr><br>

                    <!-- start accordion -->
                    <div class="accordion mb-5" id="accordionExample">
                        <div class="accordion-item text-white">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Commission (en %)
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                    <input type="number" name="commission" id="commission" class="form-control" placeholder="0,00 %">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end accordion -->
                    <input type="hidden" id="statut" name="statut" value="">

                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" onclick="setStatut('statut_publish')"> <i class="ti ti-world"></i> Publier</button>
                            <button type="submit" class="btn btn-secondary" onclick="setStatut('statut_save')"> <i class="fa fa-save"></i>Sauvegarder</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<!-- For single image pre-view -->
<script>
    function displayImage(input) {
        const preview = document.getElementById('image-preview');
        while (preview.firstChild) {
            preview.removeChild(preview.firstChild);
        }

        const file = input.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'img-fluid mt-2'; // Optional: Bootstrap class for responsive images
                preview.appendChild(img);
            };

            reader.readAsDataURL(file);
        }
    }
</script>

<!-- For multiple images preview -->
<script>
    function displayImages(input) {
        const preview = document.getElementById('images-preview');
        while (preview.firstChild) {
            preview.removeChild(preview.firstChild);
        }

        const files = input.files;

        for (const file of files) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'img-fluid mt-2'; // Optionnel : classe Bootstrap pour des images réactives
                preview.appendChild(img);
            };

            reader.readAsDataURL(file);
        }
    }
</script>


<script>
    function setStatut(statutValue) {
        // Définissez la valeur du champ 'statut' en fonction du bouton cliqué
        document.getElementById('statut').value = (statutValue === 'statut_publish') ? 'En ligne' : 'Brouillon';
    }
</script>
@endsection
