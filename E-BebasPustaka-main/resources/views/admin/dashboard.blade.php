@extends('layouts/admin')
@section('title', 'Dashboard')

@section('content')
    <!-- INFO -->
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box custom-box bg-white">
                    <div class="inner">
                        <br>
                        <h3>{{$new_thesis}}</h3>
                        <p>Ajuan Baru E-Thesis</p>
                        <a href="/thesis/request" class="stretched-link"></a>
                    </div>
                    <div class="icon">
                        <i class="fas fa-book"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box custom-box bg-white">
                <div class="inner">
                    <br>
                    <h3>{{$new_resource}}</h3>
                    <p>Ajuan Baru E-Resource</p>
                    <a href="/resource/request" class="stretched-link"></a>
                </div>
                <div class="icon">
                    <i class="fas fa-lightbulb"></i>
                </div>
            </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box custom-box bg-white">
                    <div class="inner">
                        <br>
                        <h3>{{$new_ask}}</h3>
                        <p>Pertanyaan Baru</p>
                        <a href="/ask/request" class="stretched-link"></a>
                    </div>
                    <div class="icon">
                        <i class="fas fa-comment"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </div>

    <!-- CHART -->
    <div class="container-fluid">
        <!-- E-Thesis Delivery -->
        <div class="row">
            <!-- Layanan E-Thesis Delivery -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Grafik Layanan E-Thesis</h3>
                        <ul class="nav nav-tabs card-header-tabs float-right" id="thesis-graph-list" role="tablist">
                            <li class="nav-item">
                            <a class="nav-link active" href="#thesisMonthly" role="tab" aria-controls="thesisMonthly" aria-selected="true">Bulanan</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link"  href="#thesisYearly" role="tab" aria-controls="thesisYearly" aria-selected="false">Tahunan</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content mt-3">
                            <div class="tab-pane active" id="thesisMonthly" role="tabpanel" aria-labelledby="thesisMonthly-tab">
                                <div class="chart">
                                    <canvas id="thesisMonthlyChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <div class="tab-pane" id="thesisYearly" role="tabpanel" aria-labelledby="thesisYearly-tab">
                                <div class="chart">
                                    <canvas id="thesisYearlyChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

            <!-- Pustakawan E-Thesis Delivery -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Grafik Pustakawan E-Thesis</h3>
                        <ul class="nav nav-tabs card-header-tabs float-right" id="thesis-pustakawan-graph-list" role="tablist">
                            <li class="nav-item">
                            <a class="nav-link active" href="#thesisPustakawanMonthly" role="tab" aria-controls="thesisPustakawanMonthly" aria-selected="true">Bulanan</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link"  href="#thesisPustakawanYearly" role="tab" aria-controls="thesisPustakawanYearly" aria-selected="false">Tahunan</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content mt-3">
                            <div class="tab-pane active" id="thesisPustakawanMonthly" role="tabpanel" aria-labelledby="thesisPustakawanMonthly-tab">
                                <div class="chart">
                                    <canvas id="thesisPustakawanMonthlyChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <div class="tab-pane" id="thesisPustakawanYearly" role="tabpanel" aria-labelledby="thesisPustakawanYearly-tab">
                                <div class="chart">
                                    <canvas id="thesisPustakawanYearlyChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>

        <!-- E-Resource Delivery -->
        <div class="row">
            <!-- Layanan E-Resource Delivery -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Grafik Layanan E-Resource</h3>
                        <ul class="nav nav-tabs card-header-tabs float-right" id="resource-graph-list" role="tablist">
                            <li class="nav-item">
                            <a class="nav-link active" href="#resourceMonthly" role="tab" aria-controls="resourceMonthly" aria-selected="true">Bulanan</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link"  href="#resourceYearly" role="tab" aria-controls="resourceYearly" aria-selected="false">Tahunan</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content mt-3">
                            <div class="tab-pane active" id="resourceMonthly" role="tabpanel" aria-labelledby="resourceMonthly-tab">
                                <div class="chart">
                                    <canvas id="resourceMonthlyChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <div class="tab-pane" id="resourceYearly" role="tabpanel" aria-labelledby="resourceYearly-tab">
                                <div class="chart">
                                    <canvas id="resourceYearlyChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-->

            <!-- Pustakawan E-Resource Delivery -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Grafik Pustakawan E-Resource</h3>
                        <ul class="nav nav-tabs card-header-tabs float-right" id="resource-pustakawan-graph-list" role="tablist">
                            <li class="nav-item">
                            <a class="nav-link active" href="#resourcePustakawanMonthly" role="tab" aria-controls="resourcePustakawanMonthly" aria-selected="true">Bulanan</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link"  href="#resourcePustakawanYearly" role="tab" aria-controls="resourcePustakawanYearly" aria-selected="false">Tahunan</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content mt-3">
                            <div class="tab-pane active" id="resourcePustakawanMonthly" role="tabpanel" aria-labelledby="resourcePustakawanMonthly-tab">
                                <div class="chart">
                                    <canvas id="resourcePustakawanMonthlyChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <div class="tab-pane" id="resourcePustakawanYearly" role="tabpanel" aria-labelledby="resourcePustakawanYearly-tab">
                                <div class="chart">
                                    <canvas id="resourcePustakawanYearlyChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-->
        </div>

        <!-- Ask a Librarian -->
        <div class="row">
            <!-- Layanan Ask a Librarian -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Grafik Layanan Ask a Librarian</h3>
                        <ul class="nav nav-tabs card-header-tabs float-right" id="ask-graph-list" role="tablist">
                            <li class="nav-item">
                            <a class="nav-link active" href="#askMonthly" role="tab" aria-controls="askMonthly" aria-selected="true">Bulanan</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link"  href="#askYearly" role="tab" aria-controls="askYearly" aria-selected="false">Tahunan</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content mt-3">
                            <div class="tab-pane active" id="askMonthly" role="tabpanel" aria-labelledby="askMonthly-tab">
                                <div class="chart">
                                    <canvas id="askMonthlyChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <div class="tab-pane" id="askYearly" role="tabpanel" aria-labelledby="askYearly-tab">
                                <div class="chart">
                                    <canvas id="askYearlyChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

            <!-- Pustakawan Ask a Librarian -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Grafik Pustakawan Ask a Librarian</h3>
                        <ul class="nav nav-tabs card-header-tabs float-right" id="ask-pustakawan-graph-list" role="tablist">
                            <li class="nav-item">
                            <a class="nav-link active" href="#askPustakawanMonthly" role="tab" aria-controls="askPustakawanMonthly" aria-selected="true">Bulanan</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link"  href="#askPustakawanYearly" role="tab" aria-controls="askPustakawanYearly" aria-selected="false">Tahunan</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content mt-3">
                            <div class="tab-pane active" id="askPustakawanMonthly" role="tabpanel" aria-labelledby="askPustakawanMonthly-tab">
                                <div class="chart">
                                    <canvas id="askPustakawanMonthlyChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <div class="tab-pane" id="askPustakawanYearly" role="tabpanel" aria-labelledby="askPustakawanYearly-tab">
                                <div class="chart">
                                    <canvas id="askPustakawanYearlyChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-->
        </div>

    </div><!-- /.container-fluid -->

@endsection


@section('javascript')
<script src="{{asset('AdminLTE')}}/plugins/chart.js/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script>

<script>
    $(function () {
        function doughnutChartFunction(graphTitle) {
            var doughnutChartOptions = {
                responsive              : true,
                maintainAspectRatio     : false,
                datasetFill             : false,
                plugins: {
                    labels: [ 
                        {
                            render: 'value',
                            fontColor: '#fff'
                        },
                        {
                            render: 'label',
                            position: 'outside',
                            fontSize: 10,
                            overlap: false
                        }
                    ]
                },
                title: {
                    display: true,
                    text: graphTitle
                },
                legend: {
                    position: 'bottom'
                }
            }
            
            return doughnutChartOptions;
        }

        var color =  ['#56e2cf','#56aee2','#5668e2','#8a56e2','#cf56e2','#e256ae','#e25668','#e28956', '#e2cf56','#aee256', '#68e256','#56e289'];

        // E-THESIS DELIVERY CHART - KATEGORI
        var thesis_monthly = <?php echo json_encode($thesis_monthly); ?>;
        var thesis_yearly = <?php echo json_encode($thesis_yearly); ?>;
        var thesis_monthly_list = <?php echo json_encode($thesis_monthly_list); ?>;
        var thesis_yearly_list = <?php echo json_encode($thesis_yearly_list); ?>;

        var thesisMonthlyCanvas = document.getElementById("thesisMonthlyChart");
        var thesisMonthlyChartData = {
            labels  : thesis_monthly_list,
            datasets:  [{
                data: thesis_monthly,
                backgroundColor: color,
                hoverOffset: 4
            }]
        };

        var thesisMonthlyChart = new Chart(thesisMonthlyCanvas, {
            type: 'doughnut',
            data:  thesisMonthlyChartData,
            options: doughnutChartFunction('Grafik Layanan E-Thesis Delivery Bulan Ini')
        })

        var thesisYearlyCanvas = document.getElementById("thesisYearlyChart");
        var thesisYearlyChartData = {
            labels  : thesis_yearly_list,
            datasets:  [{
                data: thesis_yearly,
                backgroundColor: color,
                hoverOffset: 4
            }]
        };
    
        var thesisYearlyChart = new Chart(thesisYearlyCanvas, {
            type: 'doughnut',
            data:  thesisYearlyChartData,
            options: doughnutChartFunction('Grafik Layanan E-Thesis Delivery Tahun Ini')
        })

        // E-THESIS DELIVERY CHART - PUSTAKAWAN
        var thesis_pustakawan_monthly = <?php echo json_encode($thesis_pustakawan_monthly); ?>;
        var thesis_pustakawan_yearly = <?php echo json_encode($thesis_pustakawan_yearly); ?>;
        var thesis_pustakawan_monthly_list = <?php echo json_encode($thesis_pustakawan_monthly_list); ?>;
        var thesis_pustakawan_yearly_list = <?php echo json_encode($thesis_pustakawan_yearly_list); ?>;

        var thesisPustakawanMonthlyCanvas = document.getElementById("thesisPustakawanMonthlyChart");
        var thesisPustakawanMonthlyChartData = {
            labels  : thesis_pustakawan_monthly_list,
            datasets:  [{
                data: thesis_pustakawan_monthly,
                backgroundColor: color,
                hoverOffset: 4
            }]
        };

        var thesisPustakawanMonthlyChart = new Chart(thesisPustakawanMonthlyCanvas, {
            type: 'doughnut',
            data:  thesisPustakawanMonthlyChartData,
            options: doughnutChartFunction('Grafik Pustakawan E-Thesis Delivery Bulan Ini')
        })

        var thesisPustakawanYearlyCanvas = document.getElementById("thesisPustakawanYearlyChart");
        var thesisPustakawanYearlyChartData = {
            labels  : thesis_pustakawan_yearly_list,
            datasets:  [{
                data: thesis_pustakawan_yearly,
                backgroundColor: color,
                hoverOffset: 4
            }]
        };
    
        var thesisPustakawanYearlyChart = new Chart(thesisPustakawanYearlyCanvas, {
            type: 'doughnut',
            data:  thesisPustakawanYearlyChartData,
            options: doughnutChartFunction('Grafik Pustakawan E-Thesis Delivery Tahun Ini')
        })

        // E-RESOURCE DELIVERY CHART - KATEGORI
        var resource_monthly = <?php echo json_encode($resource_monthly); ?>;
        var resource_yearly = <?php echo json_encode($resource_yearly); ?>;
        var resource_monthly_list = <?php echo json_encode($resource_monthly_list); ?>;
        var resource_yearly_list = <?php echo json_encode($resource_yearly_list); ?>;

        var resourceMonthlyCanvas = document.getElementById("resourceMonthlyChart");
        var resourceMonthlyChartData = {
            labels  : resource_monthly_list,
            datasets:  [{
                data: resource_monthly,
                backgroundColor: color,
                hoverOffset: 4
            }]
        };

        var resourceMonthlyChart = new Chart(resourceMonthlyCanvas, {
            type: 'doughnut',
            data:  resourceMonthlyChartData,
            options: doughnutChartFunction('Grafik Layanan E-Resource Delivery Bulan Ini')
        })

        var resourceYearlyCanvas = document.getElementById("resourceYearlyChart");
        var resourceYearlyChartData = {
            labels  : resource_yearly_list,
            datasets:  [{
                data: resource_yearly,
                backgroundColor: color,
                hoverOffset: 4
            }]
        };
    
        var resourceYearlyChart = new Chart(resourceYearlyCanvas, {
            type: 'doughnut',
            data:  resourceYearlyChartData,
            options: doughnutChartFunction('Grafik Layanan E-Resource Delivery Tahun Ini')
        })

        // E-RESOURCE DELIVERY CHART - PUSTAKAWAN
        var resource_pustakawan_monthly = <?php echo json_encode($resource_pustakawan_monthly); ?>;
        var resource_pustakawan_yearly = <?php echo json_encode($resource_pustakawan_yearly); ?>;
        var resource_pustakawan_monthly_list = <?php echo json_encode($resource_pustakawan_monthly_list); ?>;
        var resource_pustakawan_yearly_list = <?php echo json_encode($resource_pustakawan_yearly_list); ?>;

        var resourcePustakawanMonthlyCanvas = document.getElementById("resourcePustakawanMonthlyChart");
        var resourcePustakawanMonthlyChartData = {
            labels  : resource_pustakawan_monthly_list,
            datasets:  [{
                data: resource_pustakawan_monthly,
                backgroundColor: color,
                hoverOffset: 4
            }]
        };

        var resourcePustakawanMonthlyChart = new Chart(resourcePustakawanMonthlyCanvas, {
            type: 'doughnut',
            data:  resourcePustakawanMonthlyChartData,
            options: doughnutChartFunction('Grafik Pustakawan E-Resource Delivery Bulan Ini')
        })

        var resourcePustakawanYearlyCanvas = document.getElementById("resourcePustakawanYearlyChart");
        var resourcePustakawanYearlyChartData = {
            labels  : resource_pustakawan_yearly_list,
            datasets:  [{
                data: resource_pustakawan_yearly,
                backgroundColor: color,
                hoverOffset: 4
            }]
        };
    
        var resourcePustakawanYearlyChart = new Chart(resourcePustakawanYearlyCanvas, {
            type: 'doughnut',
            data:  resourcePustakawanYearlyChartData,
            options: doughnutChartFunction('Grafik Pustakawan E-Resource Delivery Tahun Ini')
        })

        // ASK A LIBRARIAN - KATEGORI
        var ask_monthly = <?php echo json_encode($ask_monthly); ?>;
        var ask_yearly = <?php echo json_encode($ask_yearly); ?>;
        var ask_monthly_list = <?php echo json_encode($ask_monthly_list); ?>;
        var ask_yearly_list = <?php echo json_encode($ask_yearly_list); ?>;

        var askMonthlyCanvas = document.getElementById("askMonthlyChart");
        var askMonthlyChartData = {
            labels  : ask_monthly_list,
            datasets:  [{
                data: ask_monthly,
                backgroundColor: color,
                hoverOffset: 4
            }]
        };

        var askMonthlyChart = new Chart(askMonthlyCanvas, {
            type: 'doughnut',
            data:  askMonthlyChartData,
            options: doughnutChartFunction('Grafik Layanan Ask a Librarian Delivery Bulan Ini')
        })

        var askYearlyCanvas = document.getElementById("askYearlyChart");
        var askYearlyChartData = {
            labels  : ask_yearly_list,
            datasets:  [{
                data: ask_yearly,
                backgroundColor: color,
                hoverOffset: 4
            }]
        };
    
        var askYearlyChart = new Chart(askYearlyCanvas, {
            type: 'doughnut',
            data:  askYearlyChartData,
            options: doughnutChartFunction('Grafik Layanan Ask a Librarian Delivery Tahun Ini')
        })

        // ASK A LIBRARIAN - PUSTAKAWAN
        var ask_pustakawan_monthly = <?php echo json_encode($ask_pustakawan_monthly); ?>;
        var ask_pustakawan_yearly = <?php echo json_encode($ask_pustakawan_yearly); ?>;
        var ask_pustakawan_monthly_list = <?php echo json_encode($ask_pustakawan_monthly_list); ?>;
        var ask_pustakawan_yearly_list = <?php echo json_encode($ask_pustakawan_yearly_list); ?>;

        var askPustakawanMonthlyCanvas = document.getElementById("askPustakawanMonthlyChart");
        var askPustakawanMonthlyChartData = {
            labels  : ask_pustakawan_monthly_list,
            datasets:  [{
                data: ask_pustakawan_monthly,
                backgroundColor: color,
                hoverOffset: 4
            }]
        };

        var askPustakawanMonthlyChart = new Chart(askPustakawanMonthlyCanvas, {
            type: 'doughnut',
            data:  askPustakawanMonthlyChartData,
            options: doughnutChartFunction('Grafik Pustakawan Ask a Librarian Delivery Bulan Ini')
        })

        var askPustakawanYearlyCanvas = document.getElementById("askPustakawanYearlyChart");
        var askPustakawanYearlyChartData = {
            labels  : ask_pustakawan_yearly_list,
            datasets:  [{
                data: ask_pustakawan_yearly,
                backgroundColor: color,
                hoverOffset: 4
            }]
        };
    
        var askPustakawanYearlyChart = new Chart(askPustakawanYearlyCanvas, {
            type: 'doughnut',
            data:  askPustakawanYearlyChartData,
            options: doughnutChartFunction('Grafik Pustakawan Ask a Librarian Delivery Tahun Ini')
        })
       
    })
    $('#thesis-graph-list a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')
    })
    $('#thesis-pustakawan-graph-list a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')
    })
    
    $('#resource-graph-list a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')
    })
    $('#resource-pustakawan-graph-list a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')
    })

    $('#ask-graph-list a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')
    })
    $('#ask-pustakawan-graph-list a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')
    })
</script>
    
@endsection

