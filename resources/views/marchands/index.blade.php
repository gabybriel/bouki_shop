@extends('layouts.admin-layout')

@section('admin-content')
<div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4"> <i class="ti ti-user"></i> Liste des Marchands</h5>

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
                                <h6 class="fw-semibold mb-0">ID</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Nom</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Prenoms</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Email</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Telephone</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Rôle</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0"> Action</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">{{ $user->id }}</h6>
                            </td>
                            <td class="border-bottom-0">
                                {{ $user->name }}
                            </td>
                            <td class="border-bottom-0">
                                {{ $user->prenoms }}
                            </td>
                            <td class="border-bottom-0">
                                {{ $user->email }}
                            </td>
                            <td class="border-bottom-0">
                                {{ $user->phone }}
                            </td>
                            <td class="border-bottom-0">
                                @if ($user->is_admin)
                                Administrateur
                                @elseif ($user->is_visitor)
                                Client
                                @elseif ($user->is_vendor)
                                Marchand
                                @elseif ($user->is_danied)
                                Utilisateur banni
                                @endif
                            </td>
                            <td class="border-bottom-0">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm" style="margin-right: 10px;">
                                    <i class="ti ti-edit"></i> Modifier
                                </a>
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