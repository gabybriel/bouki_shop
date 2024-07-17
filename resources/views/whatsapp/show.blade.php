@extends('layouts.admin-layout')

@section('admin-content')

    <div class="container mt-4">
        <h1>Objet: {{ $whatsapp->titre}}</h1>

        <div class="whatsapps mt-4" >
            <h3>Message:</h3>
            <p class="p-3 ml-8">
                {{$whatsapp->message}}
            </p>
            <p><b>Date: {{ $whatsapp->created_at->format('d/m/Y') }}</b></p>
        </div>
        <hr>

        <div class="py-4">
            <a href="{{route('whatsapp.index')}}" class="btn btn-primary mr-6"><i class="ti ti-arrow-left"></i> Retour</a>
            <form action="{{route('whatsapp.destroy', $whatsapp->id)}}" class="text-end" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger btn-sm delete-btn">
                    <i class="ti ti-trash"></i> Supprimer
                </button>
            </form>

        </div>
    </div>

@endsection
