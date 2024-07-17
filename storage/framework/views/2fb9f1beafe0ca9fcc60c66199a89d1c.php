

<?php $__env->startSection('admin-content'); ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Modifier l'article</h5>

        <div class="card">
            <div class="card-body">
                <?php if($errors->any()): ?>
                <div>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p class="alert alert-danger"><?php echo e($error); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>
                <form method="post" action="<?php echo e(route('articles.update', $article->id)); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="taille" class="form-label">Taille</label>
                            <input type="text" class="form-control" id="taille" name="taille" placeholder=" XL, XXL, S, M..." value="<?php echo e(old('taille', $article->taille)); ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="prix" class="form-label">Prix</label>
                            <input type="number" class="form-control" id="prix" name="prix" placeholder="FCFA" value="<?php echo e(old('prix', $article->prix)); ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="numero" class="form-label">Numero</label>
                            <input type="text" class="form-control" id="numero" name="numero" placeholder="Numero" value="<?php echo e(old('numero', $article->numero)); ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="categorie_id" class="form-label">Categorie</label>
                            <select id="categorie_id" name="categorie_id" class="form-select">
                                <option value="">Seclectionner</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>" <?php echo e(old('categorie_id', $article->categorie_id) == $category->id ? 'selected' : ''); ?>>
                                    <?php echo e($category->categoriename); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <small class="form-text text-muted">Une categorie n'est pas disponible ? <a href="<?php echo e(route('categories.create')); ?>">Creer une nouvelle categorie</a></small>
                        </div>
                        <div class="col-md-4">
                            <label for="image" class="form-label">Image de l'article</label>
                            <input type="file" id="image" name="image" class="form-control" onchange="displayImage(this)">
                            <small class="form-text text-muted">Glissez-déposez ou cliquez pour télécharger une image..</small>
                            <div id="image-preview">
                                <?php if($article->image): ?>
                                <img src="<?php echo e($article->image); ?>" class="img-fluid mt-2" alt="Image de l'article">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="images" class="form-label">Images de galerie <sma>(Facultatif)</sma></label>
                            <input type="file" id="images" name="images[]" class="form-control" multiple onchange="displayImages(this)">
                            <small class="form-text text-muted">Sélectionnez jusqu'à 4 images...</small>
                            <div id="images-preview">
                                <?php if($article->images): ?>
                                <?php $__currentLoopData = json_decode($article->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <img src="<?php echo e(asset('storage/' . $image)); ?>" class="img-fluid mt-2" alt="Image de la galerie" width="100">
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="statut" name="statut" value="<?php echo e(old('statut', $article->statut)); ?>">

                    <!-- start accordion -->
                    <div class="accordion mb-5" id="accordionExample">
                        <div class="accordion-item text-white">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Article variable (Configurer la taille)
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <a class="btn btn-dark btn-sm " href=""> <b>Ajouter une Taille</b> </a>

                                    <div class="card  mt-3 mb-3">
                                        <div class="row">
                                            <div class="col-md-0">
                                                <span class="badge bg-primary mb-3">XL</span>
                                                <span class="badge bg-primary mb-3">L</span>
                                                <span class="badge bg-primary mb-3">M</span>
                                                <span class="badge bg-primary mb-3">S</span>
                                                <span class="badge bg-primary mb-3">XL</span>
                                                <span class="badge bg-primary mb-3">L</span>
                                                <span class="badge bg-primary mb-3">M</span>
                                                <span class="badge bg-primary mb-3">S</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Article variable (Configurer la couleur)
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <a class="btn btn-dark btn-sm " href=""> <b>Ajouter les couleurs</b> </a>

                                    <div class="card  mt-3 mb-3">
                                        <div class="row">
                                            <div class="col-md-0">
                                                <span class="badge bg-success mb-3 badge-pill"></span>
                                                <span class="badge bg-dark mb-3 badge-pill"></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end accordion -->

                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" onclick="setStatut('statut_publish')"> <i class="ti ti-world"></i> Publier</button>
                            <button type="submit" class="btn btn-secondary" onclick="setStatut('statut_save')"> <i class="fa fa-save"></i>Sauvegarder</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<!-- For single image pre-view -->
<script>
    function displayImage(input) {
        const preview = document.getElementById('image-preview');
        while (preview.firstChild) {
            preview.removeChild(preview.firstChild);
        }

        const file = input.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'img-fluid mt-2'; // Optional: Bootstrap class for responsive images
                preview.appendChild(img);
            };

            reader.readAsDataURL(file);
        }
    }
</script>

<!-- For multiple images preview -->
<script>
    function displayImages(input) {
        const preview = document.getElementById('images-preview');
        while (preview.firstChild) {
            preview.removeChild(preview.firstChild);
        }

        const files = input.files;

        for (const file of files) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'img-fluid mt-2'; // Optionnel : classe Bootstrap pour des images réactives
                preview.appendChild(img);
            };

            reader.readAsDataURL(file);
        }
    }
</script>


<script>
    function setStatut(statutValue) {
        // Définissez la valeur du champ 'statut' en fonction du bouton cliqué
        document.getElementById('statut').value = (statutValue === 'statut_publish') ? 'En ligne' : 'Brouillon';
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Myshop\resources\views/articles/edit.blade.php ENDPATH**/ ?>