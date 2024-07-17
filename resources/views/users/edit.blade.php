<!-- resources/views/your/edit/view.blade.php -->

@extends('layouts.admin-layout')

@section('admin-content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4"><i class="ti ti-user"></i> Modifier l'utilisateur </h5>

        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                <div>
                    @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                </div>
                @endif
                <form method="post" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put') <!-- Use the "put" method for update -->

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                        </div>
                        <div class="col-md-6">
                            <label for="prenoms" class="form-label">Prenoms</label>
                            <input type="text" class="form-control" id="prenoms" name="prenoms" value="{{ $user->prenoms }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Telephone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="is_admin" class="form-label">Est Administrateur</label>
                            <select id="is_admin" name="is_admin" class="form-select">
                                <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Oui</option>
                                <option value="0" {{ !$user->is_admin ? 'selected' : '' }}>Non</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="is_vendor" class="form-label">Est Marchand</label>
                            <select id="is_vendor" name="is_vendor" class="form-select">
                                <option value="1" {{ $user->is_vendor ? 'selected' : '' }}>Oui</option>
                                <option value="0" {{ !$user->is_vendor ? 'selected' : '' }}>Non</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="is_visitor" class="form-label">Est Client</label>
                            <select id="is_visitor" name="is_visitor" class="form-select">
                                <option value="1" {{ $user->is_visitor ? 'selected' : '' }}>Oui</option>
                                <option value="0" {{ !$user->is_visitor ? 'selected' : '' }}>Non</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="shopname" class="form-label">Nom de la Boutique</label>
                            <input type="text" class="form-control" id="shopname" name="shopname" value="{{ $user->shopname }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="password" class="form-label">Nouveau mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="col-md-6">
                            <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>
                    </div>

                    <!-- Add input fields for other user attributes -->

                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary"> <i class="ti ti-world"></i> Enregistrer les modifications</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection