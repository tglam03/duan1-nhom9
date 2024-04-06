<style>
    .dataTables_info{
        display: none;
    }
    .dataTables_filter{
        display: none;
    }
</style>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Lọc theo thời gian
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a href="<?= BASE_URL_ADMIN ?>?act=/&day=7" class="dropdown-item" href="#">7 ngày</a></li>
                <li><a href="<?= BASE_URL_ADMIN ?>?act=/&day=28" class="dropdown-item" href="#">28 ngày</a></li>
                <li><a href="<?= BASE_URL_ADMIN ?>?act=/&day=58" class="dropdown-item" href="#">90 ngày</a></li>
                <li><a href="<?= BASE_URL_ADMIN ?>?act=/&day=90" class="dropdown-item" href="#">168 ngày</a></li>
                <li><a href="<?= BASE_URL_ADMIN ?>?act=/&day=365" class="dropdown-item" href="#">365 ngày</a></li>
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
                    <h6 class="m-0 font-weight-bold text-primary">Thống kê thu nhập</h6>
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
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
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
                    <h6 class="m-0 font-weight-bold text-primary">Biểu đồ hàng hóa</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Biểu đồ hàng hóa</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>