@extends('layouts.admin-layout')

@section('admin-content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4"> Ajouter un slider </h5>

        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                <div>
                    @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                </div>
                @endif
                <form method="post" action="{{ route('slider-config.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="image" class="form-label">Image du slider</label>
                            <input type="file" id="image" name="image" class="form-control" onchange="displayImage(this)">
                            <small class="form-text text-muted">Glissez-déposez ou cliquez pour télécharger une image..</small>
                            <div id="image-preview"></div>
                        </div>
                        <div class="col-md-6">
                            <label for="image" class="form-label">Position</label>
                            <input type="number" id="number" name="position" class="form-control">
                            <small class="form-text text-muted">Entrer un numéro pour positionner le Slider..</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary"> <i class="ti ti-world"></i> Publier</button>
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


@endsection