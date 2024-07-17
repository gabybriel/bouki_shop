@extends('layouts.vendor-layout')

@section('admin-content')
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Liste des Retraits</h5>
                <a href="{{ route('portefeuille.create') }}" class="btn btn-primary"> <i class="ti ti-box"></i> Effectuer un retrait </a>
                <br><br>

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
                                <h6 class="fw-semibold mb-0">Client</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Date</h6>
                            </th>

                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Heure</h6>
                            </th>

                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Mentant</h6>
                            </th>

                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Mode</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Statut</h6>
                            </th>

                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Actions</h6>
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($finances as $finance)
                            <tr>
                                <td class="border-bottom-0">
                                    <b>
                                        <p> {{ $finance->id }} </p>
                                    </b>
                                </td>
                                <td class="border-bottom-0">
                                    <b>
                                        <p> {{ $finance->user->shopname}} </p>
                                    </b>
                                </td>

                                <td class="border-bottom-0">
                                    <p>
                                        {{ $finance->created_at->format('d/m/Y') }}

                                    </p>
                                </td>

                                <td class="border-bottom-0">
                                    <p>
                                        {{ $finance->created_at->format('H.i.s') }}
                                    </p>
                                </td>
                                <td class="border-bottom-0">
                                    <p>
                                        {{ $finance->somme }} F CFA
                                    </p>
                                </td>
                                <td class="border-bottom-0">
                                    <p>
                                        {{ $finance->mode }}
                                    </p>
                                </td>
                                <td class="border-bottom-0">
                                    <div class="d-flex align-items-center gap-2">
                                    <span class=" badge <?= $finance->statut === 'En attente' ? 'bg-warning' : '' ?>
                                                        <?= $finance->statut === 'Effectué' ? 'bg-success' : '' ?>
                                                        rounded-3 fw-semibold ">
                                        {{ $finance->statut }}
                                    </span>
                                    </div>
                                </td>

                                <td class="border-bottom-0 text-left">
                                    <div class="flex-right" style="display: flex; justify-content: flex-left;">
                                        <a href="{{ route('finances.show', $finance->id) }}" class="btn btn-success btn-sm" style="margin-right: 10px;">
                                            <i class="ti ti-eye"></i>
                                        </a>
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
