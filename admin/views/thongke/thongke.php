<style>
    .dataTables_info {
        display: none;
    }

    .dataTables_filter {
        display: none;
    }
</style>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thông kê</h1>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Lọc theo thời gian
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a href="<?= BASE_URL_ADMIN ?>" class="dropdown-item" href="#">1 ngày</a></li>
                <li><a href="<?= BASE_URL_ADMIN ?>?act=thongke&day=7" class="dropdown-item" href="#">7 ngày</a></li>
                <li><a href="<?= BASE_URL_ADMIN ?>?act=thongke&day=28" class="dropdown-item" href="#">28 ngày</a></li>
                <li><a href="<?= BASE_URL_ADMIN ?>?act=thongke&day=58" class="dropdown-item" href="#">90 ngày</a></li>
                <li><a href="<?= BASE_URL_ADMIN ?>?act=thongke&day=90" class="dropdown-item" href="#">168 ngày</a></li>
                <li><a href="<?= BASE_URL_ADMIN ?>?act=thongke&day=365" class="dropdown-item" href="#">365 ngày</a></li>
            </ul>
        </div>
    </div>

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

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Thống kê thu nhập</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã hàng hóa</th>
                                    <th>Hình ảnh</th>
                                    <th>Tên hàng hóa</th>
                                    <th>Bán ra</th>
                                    <th>Lợi nhuận</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($loadAllofdayProduct)) : ?>

                                    <?php foreach ($loadAllofdayProduct as $keyProduct => $loadAllofdayProduct) : ?>
                                        <tr>
                                            <td><?= $keyProduct + 1 ?></td>
                                            <td class="col-sm-2">HH-<?= $loadAllofdayProduct['product_id'] ?></td>
                                            <td class="col-sm-2">
                                                <img style="width:60%;" src="<?= BASE_URL . explode(',', $loadAllofdayProduct['hinh'])[0]
                                                                                ?>" class="lazy" alt="Image">
                                            </td>
                                            <td class="col-sm-4">
                                                <span class="item_cart"><?= $loadAllofdayProduct['ten_hh'] ?></span>
                                            </td>
                                            <td class="col-sm-2">
                                                <div>
                                                    <span><?= $loadAllofdayProduct['total_quantity']; ?> sản phẩm</span>
                                                </div>
                                            </td>
                                            <td class="col-sm-2">
                                                <strong><?= $total = number_format($loadAllofdayProduct['tienthu']);

                                                        ?>VND</strong>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Sản phẩm bán chạy</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Mã hàng hóa</th>
                                    <th>Hình ảnh</th>
                                    <th>Tên hàng hóa</th>
                                    <th>Bán ra</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($loadofDaytoProductQuantity)) : ?>

                                    <?php foreach ($loadofDaytoProductQuantity as $keyProduct => $loadofDaytoProductQuantity) : ?>
                                        <tr>
                                            <td class="col-sm-2">HH-<?= $loadofDaytoProductQuantity['product_id'] ?></td>
                                            <td class="col-sm-2">
                                                <img style="width:60%;" src="<?= BASE_URL . explode(',', $loadofDaytoProductQuantity['hinh'])[0]
                                                                                ?>" class="lazy" alt="Image">
                                            </td>
                                            <td class="col-sm-4">
                                                <span class="item_cart"><?= $loadofDaytoProductQuantity['ten_hh'] ?></span>
                                            </td>
                                            <td class="col-sm-2">
                                                <div>
                                                    <span><?= $loadofDaytoProductQuantity['total_quantity']; ?> sản phẩm</span>
                                                </div>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <div class="row">
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Đơn hàng chờ xác nhận</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Tổng Bill</th>
                                    <th>Tình trang đơn hàng</th>
                                    <th>Xác nhận</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($donhangchoxacnhan)) : ?>

                                    <?php foreach ($donhangchoxacnhan as $keyxacnhan => $donhangchoxacnhan) : ?>
                                        <tr>
                                            <td><?= $keyxacnhan + 1 ?></td>
                                            <td>OD-<?= $donhangchoxacnhan['idorder'] ?></td>
                                            <td>
                                                <strong><?= $total = number_format($donhangchoxacnhan['total_bill']);

                                                        ?>VND</strong>
                                            </td>
                                            <td><span class="text-danger">Chờ xác nhận</span></td>
                                            <td>
                                                <a class="btn btn-warning mt-1" onclick="return confirm('Xác nhận đơn hàng?')" href="<?= BASE_URL_ADMIN ?>?act=thongke&day=<?= isset($day) ? $day : 1; ?>&idorder=<?= $donhangchoxacnhan['idorder'] ?>&status_delivery=1">Xác nhận</a>
                                                <a class="btn btn-danger mt-1" onclick="return confirm('Xác nhận hủy?')" href="<?= BASE_URL_ADMIN ?>?act=thongke&day=<?= isset($day) ? $day : 1; ?>&idorder=<?= $donhangchoxacnhan['idorder'] ?>&status_delivery=-1">Hủy đơn</a>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Đơn hàng chờ lấy</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Tổng Bill</th>
                                    <th>Tình trang đơn hàng</th>
                                    <th>Xác nhận lấy</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($donhangdanglay)) : ?>

                                    <?php foreach ($donhangdanglay as $keylay => $donhangdanglay) : ?>
                                        <tr>
                                            <td><?= $keylay + 1 ?></td>
                                            <td>OD-<?= $donhangdanglay['idorder'] ?></td>
                                            <td>
                                                <strong><?= $total = number_format($donhangdanglay['total_bill']);

                                                        ?>VND</strong>
                                            </td>
                                            <td><span class="text-danger">Chờ lấy hàng</span></td>
                                            <td>
                                                <a class="btn btn-warning mt-1" onclick="return confirm('Xác nhận lấy thành công?')" href="<?= BASE_URL_ADMIN ?>?act=thongke&day=<?= isset($day) ? $day : 1; ?>&idorder=<?= $donhangdanglay['idorder'] ?>&status_delivery=2">Thành công</a>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Đơn hàng chờ giao</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable4" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Tổng Bill</th>
                                    <th>Tình trang đơn hàng</th>
                                    <th>Xác nhận giao</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($donhangchogiao)) : ?>

                                    <?php foreach ($donhangchogiao as $keyxacnhan => $donhangchogiao) : ?>
                                        <tr>
                                            <td><?= $keyxacnhan + 1 ?></td>
                                            <td>OD-<?= $donhangchogiao['idorder'] ?></td>
                                            <td>
                                                <strong><?= $total = number_format($donhangchogiao['total_bill']);

                                                        ?>VND</strong>
                                            </td>
                                            <td><span class="text-danger">Chờ giao hàng</span></td>
                                            <td>
                                                <a class="btn btn-warning mt-1" onclick="return confirm('Xác nhận giao thành công?')" href="<?= BASE_URL_ADMIN ?>?act=thongke&day=<?= isset($day) ? $day : 1; ?>&idorder=<?= $donhangchogiao['idorder'] ?>&status_delivery=3">Thành công</a>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Đơn hàng đã giao</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable5" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Tổng Bill</th>
                                    <th>Tình trang đơn hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($tongdondagiao)) : ?>

                                    <?php foreach ($tongdondagiao as $keylay => $tongdondagiao) : ?>
                                        <tr>
                                            <td><?= $keylay + 1 ?></td>
                                            <td>OD-<?= $tongdondagiao['idorder'] ?></td>
                                            <td>
                                                <strong><?= $total = number_format($tongdondagiao['total_bill']);

                                                        ?>VND</strong>
                                            </td>
                                            <td><span class="text-danger">Đã giao</span></td>
                                        </tr>

                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Thống kê vouche(Còn hạn)</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable6" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã voucher</th>
                                    <th>Ngày bắt đầu</th>
                                    <th>Ngày kết thúc</th>
                                    <th>Số tiền giảm</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($vocherofday)) : ?>

                                    <?php foreach ($vocherofday as $keyvocher => $vocherofday) : ?>
                                        <?php $ngaybd = date('Y/m/d', strtotime($vocherofday['ngaybd']));
                                        $ngayketthuc = date('Y/m/d', strtotime($vocherofday['ngayketthuc'])); ?>
                                        <?php if (date('Y/m/d') >= $ngaybd && date('Y/m/d') <= $ngayketthuc) { ?>
                                            <tr>
                                                <td>VCHER-<?= $vocherofday['id'] ?></td>
                                                <td><span class="text-danger"><?= $vocherofday['voucher'] ?></span></td>
                                                <td><span class="text-danger"><?= $vocherofday['ngaybd'] ?></span></td>
                                                <td><span class="text-danger"><?= $vocherofday['ngayketthuc'] ?></span></td>
                                                <td>
                                                    <strong><?= $total = number_format($vocherofday['giam']);

                                                            ?>VND</strong>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>