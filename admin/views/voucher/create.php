<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create</h6>
        </div>
        <div class="card-body">

            <!-- in ra thông báo thành công -->
            <?php if (isset($_SESSION['success'])) : ?>

                <div class="alert alert-success">
                    <?= $_SESSION['success'] ?>
                </div>

                <?php unset($_SESSION['success']) ?>

            <?php endif; ?>

            <!-- in ra validate -->
            <?php if (isset($_SESSION['errors'])) : ?>

                <div class="alert alert-danger">
                    <ul>

                        <?php foreach ($_SESSION['errors'] as $error) : ?>

                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>

                </div>

                <?php unset($_SESSION['errors']) ?>
            <?php endif; ?>

            <form class="user" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="voucher" class="form-label">Tên Voucher</label>
                            <input type="text" class="form-control" value="" id="voucher" placeholder="Voucher" name="voucher">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="ngaybd" class="form-label">Ngày bắt đầu</label>
                            <input type="date" class="form-control" value="" id="user" placeholder="Ngày bắt đầu" name="ngaybd">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="ngayketthuc" class="form-label">Ngày kết thúc</label>
                            <input type="date" class="form-control" value="" id="	ngayketthuc" placeholder=" Ngày kết thúc" name="ngayketthuc">
                        </div>
                    
                    </div>

                <button type="submit" class="btn btn-info">Thêm mới</button>
                <a href="<?= BASE_URL_ADMIN ?>/?act=voucher" class="btn btn-danger">Back to list</a>
            </form>

        </div>
    </div>
</div>


<?php if (isset($_SESSION['data'])) {
    unset($_SESSION['data']);
} ?>