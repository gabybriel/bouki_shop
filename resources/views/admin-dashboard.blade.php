@extends('layouts.admin-layout')

@section('admin-content')

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
                                <select class="form-select" id="month-select"></select>
                            </div>
                        </div>
                        <div id="chart_div" style="width: 100%; " class="fluid"></div>
                        <div class="container views-section">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card views-card text-center mt-3">
                                        <i class="fas fa-eye views-icon"></i>
                                        <h3 class="views-count mt-3"> <i class="ti ti-chart-bar views-icon"></i>
                                            {{ $vuesDuJour }}</h3>
                                        <p class="lead">Vues aujourd'hui</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card views-card text-center mt-3">
                                        <h3 class="views-count mt-3"><i class="ti ti-chart-bar views-icon"></i>
                                            {{ $vuesDuMois }}</h3>
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
                                        <h4 class="fw-semibold mb-3">{{ $totalDuJour }} FCFA</h4>
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
                                        <h4 class="fw-semibold mb-3">{{ $totalDuMois }} FCFA</h4>
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
                                <h5>Total des commissions :</h5>
                                <h4>{{ number_format($mesCommissions, 2) }} F CFA</h4>
                                {{-- <button class="btn btn-primary form-control" onclick="rafraichirPage()"><i class="ti ti-refresh"></i> Actualisez la page pour voir les statistiques récentes</button> --}}
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
                                    @foreach ($commandes as $commande)
                                        <tr>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">{{ $commande->num_commande }} </h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <span class="fw-normal"> {{ $commande->created_at->format('d/m/Y') }}</span>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $commande->created_at->format('h:i:s') }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <div class="d-flex align-items-center gap-2">
                                                    <span
                                                        class=" badge <?= $commande->statut === 'En attente de paiement' ? 'bg-warning' : '' ?>
                                                        <?= $commande->statut === 'Payer' ? 'bg-success' : '' ?>
                                                        <?= $commande->statut === 'En cours' ? 'bg-primary' : '' ?>
                                                        <?= $commande->statut === 'En cours de traitement' ? 'bg-primary' : '' ?>
                                                        <?= $commande->statut === 'En attente' ? 'bg-primary' : '' ?>
                                                        <?= $commande->statut === 'Livrer' ? 'bg-success' : '' ?>
                                                        <?= $commande->statut === 'Annuler' ? 'bg-danger' : '' ?>
                                                        rounded-3 fw-semibold ">
                                                        {{ $commande->statut }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0 fs-4">{{ $commande->total }} FCFA</h6>
                                            </td>
                                        </tr>
                                    @endforeach
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
@endsection
