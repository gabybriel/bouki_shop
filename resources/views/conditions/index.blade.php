@extends('layouts.admin-layout')

@section('admin-content')

<body style="background-color: #676767;">
    <div class="col-lg-8 d-flex align-items-stretch mx-auto">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4"> <i class="ti ti-file"></i>CONDITIONS GÉNÉRALES DE VENTES</h5>
                @if ($conditions->isEmpty())
                <a href="{{ route('conditions.create') }}" class="btn btn-primary"> <i class="ti ti-file"></i> Creer votre CGV </a>
                @endif
                <br><br>
                <div class="table-responsive">
                    <div class="container">
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                    </div>
                    @foreach ($conditions as $condition)
                    <p> {!! $condition->cgv !!} </p>
                    <a href="{{ route('conditions.edit', $condition->id) }}" class="btn btn-primary btn-sm" style="margin-right: 10px;">
                        <i class="ti ti-edit"></i> Modifier les conditions générales de ventes
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>

@endsection