@extends('layouts.admin-layout')

@section('admin-content')
<div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Liste des categories</h5>
            <a href="{{ route('categories.create') }}" class="btn btn-primary"> <i class="ti ti-cards"></i> Ajouter des categories </a>
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
                    <colgroup>
                        <col style="width: 10%;">
                        <col style="width: 30%;">
                        <col style="width: 30%;">
                        <col style="width: 20%;">
                    </colgroup>
                    <thead class="text-dark fs-4" style="background-color: #eee;">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Id</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Categories</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Images</h6>
                            </th>
                            <th class="border-bottom-0 text-left">
                                <h6 class="fw-semibold mb-0">Boutton Action</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">{{ $category->id }}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-1">{{ $category->categoriename }}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-1"><img src="{{ $category->image }}" width="50" class="rounded">
                                </h6>
                            </td>
                            <td class="border-bottom-0 text-left">
                                <div class="flex-right" style="display: flex; justify-content: flex-left;">
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm" style="margin-right: 10px;">
                                        <i class="ti ti-edit"></i> Modifier
                                    </a>

                                    @if ($category->articles->isEmpty())
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ? ')">
                                            <i class="ti ti-trash"></i> Supprimer
                                        </button>
                                    </form>
                                    @endif
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