@extends('layouts.admin-layout')

@section('admin-content')
<div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
        <div class="card-body p-4">
            <h3 class="card-title fw-semibold mb-4">Details | Commande : {{ $commande->num_commande }}</h3>

            <h6><b> Client :</b> {{ $commande->user->name }} {{ $commande->user->prenoms }} </h6>
            <h6><b> Telephone :</b> {{ $commande->user->phone }}</h6>
            <h6><b> Adresse :</b> {{ $commande->adresse }}</h6>
            <h6><b> Ville : </b> {{ $commande->ville }}</h6>
            <h6><b> Numero momo :</b> {{ $commande->num_momo }} </h6>
            <br>

            <table id="example" class="table text-nowrap mb-0 align-middle">

                <thead class="text-dark fs-4" style="background-color: #eee;">
                    <tr>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Image</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Quantité</h6>
                        </th>

                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Numero</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Prix</h6>
                        </th>
                        <th>
                            Action
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($commande->cartItems as $cartItem)
                    <tr>
                        <td class="border-bottom-0">
                            <p> <img src="{{ $cartItem->article->image }}" width="75"></p>
                        </td>
                        <td class="border-bottom-0">
                            <p>
                                {{ $cartItem->quantity }}
                            </p>
                        </td>

                        <td class="border-bottom-0">
                            <p>
                                {{ $cartItem->article->numero }}
                            </p>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">
                                {{ $cartItem->price }}
                            </h6>
                        </td>
                        <td class="border-bottom-0 text-left">
                            <div class="flex-right" style="display: flex; justify-content: flex-left;">
                                <a href="{{ route('tickets.show', $commande->id) }}" class="btn btn-info btn-sm btn-print" style="margin-right: 10px;">
                                    <i class="ti ti-printer"></i>
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

@endsection
