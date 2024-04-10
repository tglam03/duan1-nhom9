<style>
    .dataTables_info {
        display: none;
    }

    .dataTables_filter {
        display: none;
    }
</style>
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Tổng thu nhập</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= (isset($tongthunhapofday) && $tongthunhapofday != "") ? number_format($tongthunhapofday) : 0; ?> VND</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Số lượng bán ra</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= (isset($soluongofday) && $soluongofday != "") ? number_format($soluongofday) : 0; ?> sản phẩm</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Thu nhập trung bình(1 ngày)
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= (isset($avgtongthunhapofOneday) && $avgtongthunhapofOneday != "") ? number_format($avgtongthunhapofOneday) : 0; ?> VND</div>
                                </div>
                                <div class="col">
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Số lượng đơn hủy</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= (isset($donhuys) && $donhuys != "") ? number_format($donhuys) : 0; ?> Đơn hàng</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Biểu đồ hàng hóa</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area" style="position: relative; width:100%; height:400px;">
                        <?php if (!empty($products)) { ?>
                            <div id="piechart" class="chart-responsive" style="width:100%; height:100%;"></div>

                            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

                            <script type="text/javascript">
                                // Load google charts
                                google.charts.load('current', {
                                    'packages': ['corechart']
                                });
                                google.charts.setOnLoadCallback(drawChart);

                                // Draw the chart and set the chart values
                                function drawChart() {
                                    var data = google.visualization.arrayToDataTable([
                                        ['Danh mục', 'Số lượng sản phẩm'],
                                        <?php
                                        $tongdm = count($products);
                                        $i = 1;
                                        foreach ($products as $products) {
                                            $soluong = '';
                                            if ($i == $tongdm) $dauphau = "";
                                            else $dauphau = ",";
                                            $soluong = $products['mau_size_soluong']['soluong'];
                                            if ($soluong == "") {
                                                $soluong = 0;
                                            }
                                            echo "['" . $products['ten_hh'] . "', $soluong]" . $dauphau;
                                            $i += 1;
                                        }
                                        ?>
                                    ]);

                                    // Optional; add a title and set the width and height of the chart
                                    var options = {
                                        'title': 'Biểu đồ thống kê hàng hóa'
                                    };

                                    // Display the chart inside the <div> element with id="piechart"
                                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                                    chart.draw(data, options);
                                }
                            </script>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>