@extends('layouts.admin-layout')

@section('admin-content')
<div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Liste des Articles</h5>
            <a href="{{ route('ajout.article') }}" class="btn btn-primary"> <i class="ti ti-box"></i> Ajouter des articles </a>
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
                                <h6 class="fw-semibold mb-0">ID</h6>
                            </th>
                            <th class="border-bottom-0">
                                <input type="checkbox" id="select-all-checkbox">
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Image</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Titre</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Prix</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Qté</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Categories</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Statut</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0"> Action</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                        <tr>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">{{ $article->id }}</h6>
                            </td>
                            <td>
                                <input type="checkbox" class="checkbox-column" value="{{ $article->id }}">
                            </td>
                            <td class="border-bottom-0">
                                <!-- <img src="{{ asset('storage/' . $article->image) }}" alt="Article Image" width="75"> -->
                                <img src="{{ $article->image }}" alt="Article Image" width="75" class="clickable-image" data-bs-toggle="modal" data-bs-target="#imageModal">
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{ $article->titre }}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{ number_format($article->prix, 0, ',', ' ') }} FCFA</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{ $article->quantity }}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">
                                    <b>{{ $article->subcategorie->categorie->categoriename }}</b>
                                <p><small><span class="ti ti-arrow-right"></span> {{ $article->subcategorie->subcategoryname }}</small></p>
                                </p>
                            </td>
                            <td class="border-bottom-0">
                                <div class="d-flex align-items-center gap-2">
                                    <span class=" badge <?= $article->statut === 'En ligne' ? 'bg-success' : '' ?>
                                                        <?= $article->statut === 'Brouillon' ? 'bg-danger' : '' ?> 
                                                        rounded-3 fw-semibold ">
                                        {{ $article->statut }}
                                    </span>
                                </div>
                            </td>

                            <td class="border-bottom-0">
                                <div class="flex-right" style="display: flex; justify-content: flex-left;">

                                    <a href="{{ route('details.article', $article->id) }}" class="btn btn-success btn-sm" style="margin-right: 10px;"><i class="ti ti-eye"></i> </a>
                                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary btn-sm" style="margin-right: 10px;"><i class="ti ti-edit"></i> </a>

                                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet Article ? ')"><i class="ti ti-trash"></i> </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-right mt-3">
                    <button id="update-status-btn" class="btn btn-primary"><i class="ti ti-world"></i> Mettre en ligne</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Image en grand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <!-- Les images seront ajoutées ici dynamiquement -->
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Incluez ce script à la fin de votre corps HTML -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // Gérez l'événement de clic sur le bouton update-status-btn
        $('#update-status-btn').on('click', function() {
            // Obtenez les ID des articles sélectionnés
            var selectedIds = $('.checkbox-column:checked').map(function() {
                return $(this).val();
            }).get();

            // Vérifiez si au moins un article est sélectionné
            if (selectedIds.length > 0) {
                // Envoyez une requête AJAX pour mettre à jour le statut
                $.ajax({
                    url: '{{ route("updateStatus") }}', // Utilisez la véritable route de mise à jour du statut
                    method: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'article_ids': selectedIds
                    },
                    success: function(response) {
                        // Gérez la réponse réussie
                        console.log(response);
                        // Rechargez la page ou mettez à jour l'interface utilisateur selon les besoins
                        location.reload();
                    },
                    error: function(error) {
                        // Gérez la réponse d'erreur
                        console.error(error);
                    }
                });
            } else {
                alert('Veuillez sélectionner au moins un article.');
            }
        });
    });
</script>

<script>
    const selectAllCheckbox = document.getElementById('select-all-checkbox');
    selectAllCheckbox.addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.checkbox-column');
        checkboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.clickable-image').on('click', function() {
            // Récupérez l'URL de l'image cliquée
            var imageUrl = $(this).attr('src');

            // Effacez le carousel précédent
            $('#imageCarousel .carousel-inner').empty();

            // Ajoutez une seule image au carousel
            $('#imageCarousel .carousel-inner').append(
                '<div class="carousel-item active"><img src="' + imageUrl + '" class="d-block w-100" alt="Image en grand"></div>'
            );
        });
    });
</script>


@endsection