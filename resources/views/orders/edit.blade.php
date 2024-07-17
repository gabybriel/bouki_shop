@extends('layouts.admin-layout')

@section('admin-content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Mettre à jour le statut de la commande - {{ $commande->num_commande }}</h5>

        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    {{ $error }}
                    @endforeach
                </div>
                @endif
                <form method="post" action="{{ route('orders.update', $commande->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="row mb-1">
                        <div class="col-md-4">
                            <label for="statut" class="form-label">Statut</label>
                            <select class="form-select" id="statut" name="statut" required>
                                <option value="En attente de paiement" {{ $commande->statut === 'En attente de paiement' ? 'selected' : '' }}>En attente de paiement</option>
                                <option value="Payer" {{ $commande->statut === 'Payer' ? 'selected' : '' }}>Payer</option>
                                <option value="En cours" {{ $commande->statut === 'En cours' ? 'selected' : '' }}>En cours</option>
                                <option value="En cours de traitement" {{ $commande->statut === 'En cours de traitement' ? 'selected' : '' }}>En cours de traitement</option>
                                <option value="En attente" {{ $commande->statut === 'En attente' ? 'selected' : '' }}>En attente</option>
                                <option value="Livrer" {{ $commande->statut === 'Livrer' ? 'selected' : '' }}>Livrer</option>
                            </select>
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