@extends('layouts.admin-layout')

@section('admin-content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4"><i class="ti ti-file"></i> Creation de Conditions générales de ventes </h5>

        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    {{ $error }}
                    @endforeach
                </div>
                @endif
                <form method="post" action="{{ route('conditions.store') }}">
                    @csrf
                    <div class="row mb-1">
                        <div class="col-md-12">
                            <label for="description" class="form-label"> Conditions générales de vente</label>
                            <textarea class="form-control" id="description" name="cgv" rows="10" placeholder="Votre texte ici"></textarea>
                        </div>

                    </div><br>

                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary"><i class="ti ti-world"></i> Publier </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#description'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>

@endsection