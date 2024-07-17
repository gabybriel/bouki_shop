@extends('layouts.admin-layout')

@section('admin-content')

    <form action="{{ route('whatsapp.store') }}" method="POST">
        @csrf
        <div class="py-4 my-2">
            <div class="row ">
                <div class="col-md-9 shadow-lg rounded py-5 ml-8">
                     <h2 class="mb-3">Nouveau message WhatsApp <i class="ti ti-brand-whatsapp"></i></h2>
                    <div class="form-group col-md-6 mt-4">
                        <label for="titre">Objet</label>
                        <input type="text" name="titre" id="titre" class="form-control"></input>
                    </div>
                    <div class="form-group col-md-9 pt-4">
                        <label for="message">Votre message :</label>
                        <textarea name="message" id="message" class="form-control" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Envoyer <i class="ti ti-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </form>
@endsection
