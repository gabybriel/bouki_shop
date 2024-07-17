@extends('layouts.admin-layout')

@section('admin-content')
<div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Liste des commandes</h5>

            <div class="table-responsive">
                <div class="container">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                </div>

                <table id="example" class="table text-nowrap mb-0 align-middle">

                    <thead class="text-dark fs-4" style="background-color: #eee;">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">id</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Numero</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Client</h6>
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
                            <td class="border-bottom-0">
                                <b>
                                    <p> {{ $commande->id }} </p>
                                </b>
                            </td>
                            <td class="border-bottom-0">
                                <b>
                                    <p> {{ $commande->num_commande }} </p>
                                </b>
                            </td>
                            <td class="border-bottom-0">

                                <p> {{ optional($commande->user)->name }} </p>

                            </td>
                            <td class="border-bottom-0">
                                <p>
                                    {{ $commande->created_at->format('d/m/Y') }}

                                </p>
                            </td>

                            <td class="border-bottom-0">
                                <p>
                                    {{ $commande->created_at->format('H.i.s') }}
                                </p>
                            </td>
                            <td class="border-bottom-0">
                                <p>
                                    {{ $commande->cartItems->count() }}
                                </p>
                            </td>
                            <td class="border-bottom-0">
                                <p>
                                    {{ $commande->modepaiement }}
                                </p>
                            </td>
                            <td class="border-bottom-0">
                                <div class="d-flex align-items-center gap-2">
                                    <span class=" badge <?= $commande->statut === 'En attente de paiement' ? 'bg-warning' : '' ?>
                                                        <?= $commande->statut === 'Payer' ? 'bg-success' : '' ?>
                                                        <?= $commande->statut === 'En cours' ? 'bg-primary' : '' ?>
                                                        <?= $commande->statut === 'En cours de traitement' ? 'bg-primary' : '' ?>
                                                        <?= $commande->statut === 'En attente' ? 'bg-primary' : '' ?>
                                                        <?= $commande->statut === 'Livrer' ? 'bg-success' : '' ?>
                                                        <?= $commande->statut === 'Annuler' ? 'bg-danger' : '' ?>
                                                        rounded-3 fw-semibold ">
                                        {{ $commande->statut }}
                                    </span>
                                </div>
                            </td>
                            <td class="border-bottom-0">
                                <p>
                                    <b> {{ $commande->total }} FCFA </b>
                                </p>
                            </td>
                            <td class="border-bottom-0 text-left">
                                <div class="flex-right" style="display: flex; justify-content: flex-left;">
                                    <a href="{{ route('tickets.show', $commande->id) }}" class="btn btn-info btn-sm btn-print" style="margin-right: 10px;">
                                        <i class="ti ti-printer"></i>
                                    </a>
                                    <a href="{{ route('orders.show', $commande->id) }}" class="btn btn-success btn-sm" style="margin-right: 10px;">
                                        <i class="ti ti-eye"></i>
                                    </a>
                                    <a href="{{ route('orders.edit', $commande->id) }}" class="btn btn-primary btn-sm" style="margin-right: 10px;">
                                        <i class="ti ti-edit"></i>
                                    </a>
                                    <form action="{{ route('orders.destroy', $commande->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette commande ? ')">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "order": [
                [0, 'desc'] // 0 is the index of the first column (assuming it's the ID column), 'desc' for descending order
            ]
        });
    });
</script>



@endsection
