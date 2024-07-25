

<?php $__env->startSection('admin-content'); ?>

    <body style="background-color: #eee;">
        <div class="row">
            <div class="col-lg-8 d-flex align-items-strech">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                            <div class="mb-3 mb-sm-0">
                                <h5 class="card-title fw-semibold">Aperçu des ventes et commandes sur 07 jours</h5>
                            </div>
                            <div>
                                <select class="form-select" id="month-select"></select>
                            </div>

                        </div>
                        <div id="chart_div" style="width: 100%;"></div>
                        <div class="container views-section">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card views-card text-center mt-3 mb-3">
                                        <i class="fas fa-eye views-icon"></i>
                                        <h3 class="views-count mt-3"> <i class="ti ti-chart-bar views-icon"></i>
                                            <?php echo e($vuesDuJour); ?></h3>
                                        <p class="lead">Vues sur vos articles <br> aujourd'hui</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card views-card text-center mt-3 mb-3">
                                        <h3 class="views-count mt-3"><i class="ti ti-chart-bar views-icon"></i>
                                            <?php echo e($vuesDuMois); ?></h3>
                                        <p class="lead">Vues sur vos articles <br> ce mois-ci</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="row alig n-items-start">
                                <div class="col-12">
                                    <h4 class="card-title mb-9 fw-semibold">
                                        <i class="ti ti-wallet views-icon"></i> Portefeuille
                                    </h4>
                                    <h4 class="fw-semibold mb-3" id="total-sum">Total :
                                        <?php if($totalSum > 0): ?>
                                            <?php echo e(number_format($totalSum, 2)); ?> FCFA
                                        <?php else: ?>
                                            0 FCFA
                                        <?php endif; ?>
                                    </h4>
                                    <h6><a href="<?php echo e(route('vendors.create')); ?>">Effectuer un retrait <i
                                                class="ti ti-arrow-right"></i></a></h6>
                                    <div class="d-flex align-items-center pb-1">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex justify-content-end">
                                        <h5><?php echo e($mesCommissions); ?> </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Utilisez le totalSum directement depuis le contrôleur
                const totalSum = <?php echo json_encode($totalSum, 15, 512) ?>;
                console.log('Total Sum:', totalSum);
            });
        </script>

    </body>

    <script>
        function rafraichirPage() {
            // Utilise la méthode location.reload() pour rafraîchir la page
            location.reload();
        }
    </script>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            populateMonthOptions();
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(function() {
                drawChart(getCurrentMonth());
            });

            document.getElementById('month-select').addEventListener('change', function() {
                var selectedMonth = this.value;
                drawChart(selectedMonth);
            });
        });

        function getCurrentMonth() {
            var today = new Date();
            return today.getMonth() + 1; // Months are zero-based, so we add 1
        }

        function populateMonthOptions() {
            var monthSelect = document.getElementById('month-select');
            var today = new Date();
            var currentYear = today.getFullYear();
            var currentMonth = today.getMonth() + 1; // Months are zero-based

            var monthNames = ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre',
                'Octobre', 'Novembre', 'Decembre'
            ];

            for (var i = currentMonth; i >= 1; i--) {
                var option = document.createElement('option');
                option.value = i;
                option.text = monthNames[i - 1] + ' ' + currentYear;
                monthSelect.appendChild(option);
            }
        }

        function drawChart(month) {
            var data;

            // Replace this switch case with your actual data fetching logic
            switch (month) {
                case '1':
                    data = google.visualization.arrayToDataTable([
                        ['Date', 'Ventes', 'Commandes'],
                        ['01/01/' + new Date().getFullYear(), 1000, 400],
                        ['02/01/' + new Date().getFullYear(), 1170, 460],
                        ['03/01/' + new Date().getFullYear(), 660, 1120],
                        ['04/01/' + new Date().getFullYear(), 1030, 540]
                    ]);
                    break;
                case '2':
                    data = google.visualization.arrayToDataTable([
                        ['Date', 'Ventes', 'Commandes'],
                        ['01/02/' + new Date().getFullYear(), 800, 300],
                        ['02/02/' + new Date().getFullYear(), 920, 410],
                        ['03/02/' + new Date().getFullYear(), 500, 1000],
                        ['04/02/' + new Date().getFullYear(), 1200, 600]
                    ]);
                    break;
                case '3':
                    data = google.visualization.arrayToDataTable([
                        ['Date', 'Ventes', 'Commandes'],
                        ['01/03/' + new Date().getFullYear(), 1100, 400],
                        ['02/03/' + new Date().getFullYear(), 900, 460],
                        ['03/03/' + new Date().getFullYear(), 700, 1120],
                        ['04/03/' + new Date().getFullYear(), 1300, 540]
                    ]);
                    break;
                case '4':
                    data = google.visualization.arrayToDataTable([
                        ['Date', 'Ventes', 'Commandes'],
                        ['01/04/' + new Date().getFullYear(), 1500, 500],
                        ['02/04/' + new Date().getFullYear(), 1000, 600],
                        ['03/04/' + new Date().getFullYear(), 1200, 700],
                        ['04/04/' + new Date().getFullYear(), 1400, 800]
                    ]);
                    break;
                    // Add cases for other months similarly...
                default:
                    data = google.visualization.arrayToDataTable([
                        ['Date', 'Ventes', 'Commandes'],
                        ['01/02/' + new Date().getFullYear(), 1000, 800],
                        ['02/02/' + new Date().getFullYear(), 1500, 390],
                        ['03/02/' + new Date().getFullYear(), 1500, 550],
                        ['04/02/' + new Date().getFullYear(), 3200, 600]
                    ]);
                    break;
            }

            var options = {
                title: 'Performances',
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

<?php echo $__env->make('layouts.vendor-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bouki\resources\views/vendor-dashboard.blade.php ENDPATH**/ ?>