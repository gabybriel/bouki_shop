@extends('layouts.admin-layout')

@section('admin-content')


<body style="background-color: #eee">


<div class="card">
    <div class="card-body">
        <div class="row align-items-start">
            <div class="col-12">
                <h4 class="card-title mb-9 fw-semibold"><i class="ti ti-wallet views-icon"></i>Modifier le statut du retrait</h4>
                <div class="d-flex align-items-center pb-1">
                    <form action="{{ route('finances.update', $finance->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <select class="form-control" name="statut">
                            <option value="En attente" {{ $finance->statut == 'En attente' ? 'selected' : '' }}>En attente</option>
                            <option value="Effectué" {{ $finance->statut == 'Effectué' ? 'selected' : '' }}>Effectué</option>
                        </select>
                        <button class="btn btn-primary mt-2" type="submit">Envoyer</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

</body>




@endsection
