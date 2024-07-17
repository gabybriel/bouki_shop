@extends('layouts.admin-layout')

@section('admin-content')
<div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4"> Rapport des ventes</h5>

            <div class="container">
                <!-- Ajouter un formulaire pour choisir les dates -->
                <form action="{{ route('rapports.index') }}" method="get">
                    @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <label for="start_date">Date de début</label>
                            <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                        </div>
                        <div class="col">
                            <label for="end_date">Date de fin</label>
                            <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary mt-4">Filtrer</button>
                        </div>
                    </div>
                    <div class="col">
                        <label for="apply_discount">
                            <input type="checkbox" name="apply_discount" id="apply_discount">
                            Retirer les frais Mobile Money
                        </label>
                    </div><br>
                </form>

                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
            </div>

            <div class="table-responsive">
                <table id="example" class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4" style="background-color: #eee;">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Numero</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Date</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Heure</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Article</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Mode</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Statut</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Total</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Actions</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($commandes as $commande)
                        <tr>
                            <td class="border-bottom-0"><b>
                                    <p>{{ $commande->num_commande }}</p>
                                </b></td>
                            <td class="border-bottom-0">
                                <p>{{ $commande->created_at->format('d/m/Y') }}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p>{{ $commande->created_at->format('h.m.s') }}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p>{{ $commande->cartItems->count() }}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p>{{ $commande->modepaiement }}</p>
                            </td>
                            <td class="border-bottom-0">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge 
                                            @if($commande->statut === 'En attente de paiement') bg-warning
                                            @elseif($commande->statut === 'Payer') bg-success
                                            @elseif($commande->statut === 'En cours' || $commande->statut === 'En cours de traitement' || $commande->statut === 'En attente') bg-primary
                                            @elseif($commande->statut === 'Livrer') bg-success
                                            @elseif($commande->statut === 'Annuler') bg-danger
                                            @endif
                                            rounded-3 fw-semibold">
                                        {{ $commande->statut }}
                                    </span>
                                </div>
                            </td>
                            <td class="border-bottom-0">
                                <p><b>{{ $commande->cartItems->sum('price') }} FCFA</b></p>
                            </td>
                            <td class="border-bottom-0 text-left">
                                <div class="flex-right" style="display: flex; justify-content: flex-left;">
                                    <a href="" class="btn btn-info btn-sm" style="margin-right: 10px;"><i class="ti ti-printer"></i></a>
                                    <a href="{{ route('orders.show', $commande->id) }}" class="btn btn-success btn-sm" style="margin-right: 10px;"><i class="ti ti-eye"></i> Voir</a>
                                    <a href="{{ route('orders.edit', $commande->id) }}" class="btn btn-primary btn-sm" style="margin-right: 10px;"><i class="ti ti-edit"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Afficher le total des commandes -->
                <div class="mt-4">
                    <p class="fw-bold">
                        Total des commandes filtrées : {{ round($totalCommandes) }} FCFA
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection