@if ($errors->any())
    <div {{ $attributes }}>
        
        <ul class="mt-3 list-disc list-inside text-sm text-red-600 alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
