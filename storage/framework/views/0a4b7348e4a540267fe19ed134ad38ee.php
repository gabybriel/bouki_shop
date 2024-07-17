

<?php $__env->startSection('admin-content'); ?>

<body style="background-color: #eee;">
    <div class="row">
        <div class="col-lg-8 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">Aperçu des ventes sur 07 jours</h5>
                        </div>
                        <div>
                            <select class="form-select">
                                <option value="1">March 2023</option>
                                <option value="2">April 2023</option>
                                <option value="3">May 2023</option>
                                <option value="4">June 2023</option>
                            </select>
                        </div>
                    </div>
                    <div id="chart_div" style="width: 100%; " class="fluid"></div>
                    <div class="container views-section">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card views-card text-center mt-3">
                                    <i class="fas fa-eye views-icon"></i>
                                    <h3 class="views-count mt-3"> <i class="ti ti-chart-bar views-icon"></i> <?php echo e($vuesDuJour); ?></h3>
                                    <p class="lead">Vues aujourd'hui</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card views-card text-center mt-3">
                                    <h3 class="views-count mt-3"><i class="ti ti-chart-bar views-icon"></i> <?php echo e($vuesDuMois); ?></h3>
                                    <p class="lead">Vues ce mois-ci</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-lg-12">
                    <!-- today -->
                    <div class="card overflow-hidden">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-9 fw-semibold">Aujourd'hui</h5>
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="fw-semibold mb-3"><?php echo e($totalDuJour); ?> FCFA</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <!-- This Month -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row alig n-items-start">
                                <div class="col-8">
                                    <h5 class="card-title mb-9 fw-semibold"> Ce mois-ci </h5>
                                    <h4 class="fw-semibold mb-3"><?php echo e($totalDuMois); ?> FCFA</h4>
                                    <div class="d-flex align-items-center pb-1">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex justify-content-end">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <button class="btn btn-primary form-control" onclick="rafraichirPage()"><i class="ti ti-refresh"></i> Actualisez la page pour voir les statistiques récentes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <div class="mb-4">
                        <h5 class="card-title fw-semibold">Booster un articles</h5>
                        <p>Boostez un articles via WhatsApp</p>
                        <img src="../assets/images/logos/boost.jpg" alt="" width="100%">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Commande récente</h5>
                    <div class="table-responsive">
                        <table id="example" class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr style="background-color: #eee;">
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">№ </h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Date</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">heure</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Statut</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Total</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $commandes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commande): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0"><?php echo e($commande->num_commande); ?> </h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <span class="fw-normal"> <?php echo e($commande->created_at->format('d/m/Y')); ?></span>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal"><?php echo e($commande->created_at->format('h:i:s')); ?></p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class=" badge <?= $commande->statut === 'En attente de paiement' ? 'bg-warning' : '' ?>
                                                        <?= $commande->statut === 'Payer' ? 'bg-success' : '' ?>
                                                        <?= $commande->statut === 'En cours' ? 'bg-primary' : '' ?> 
                                                        <?= $commande->statut === 'En cours de traitement' ? 'bg-primary' : '' ?>
                                                        <?= $commande->statut === 'En attente' ? 'bg-primary' : '' ?>
                                                        <?= $commande->statut === 'Livrer' ? 'bg-success' : '' ?>
                                                        <?= $commande->statut === 'Annuler' ? 'bg-danger' : '' ?>   
                                                        rounded-3 fw-semibold ">
                                                <?php echo e($commande->statut); ?>

                                            </span>
                                        </div>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0 fs-4"><?php echo e($commande->total); ?> FCFA</h6>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    function rafraichirPage() {
        // Utilise la méthode location.reload() pour rafraîchir la page
        location.reload();
    }
</script>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Data', 'Ventes', 'Commandes'],
            ['10/12/2023', 1000, 400],

        ]);

        var options = {
            title: 'Performance',
            hAxis: {
                title: 'Vue sur une semaine',
                titleTextStyle: {
                    color: '#333'
                }
            },
            vAxis: {
                minValue: 0
            }
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Myshop\resources\views/admin-dashboard.blade.php ENDPATH**/ ?>