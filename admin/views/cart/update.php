<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update</h6>
        </div>
        <div class="card-body">


            <!-- thông báo thành công -->
            <?php if (isset($_SESSION['success'])) : ?>


                <div class="alert alert-success">
                    <?= $_SESSION['success'] ?>
                </div>

                <?php unset($_SESSION['success']) ?>

            <?php endif; ?>
            <!-- validate -->


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
                            <label for="vai_tro" class="form-label">Trạng thái đơn hàng</label>

                            <select class="form-control" id="trangthaidh" name="trangthaidh">

                                <option <?= $carts['status_delivery'] ==  3 ? 'selected' : null ?> value="3">Đã giao</option>
                                <option <?= $carts['status_delivery'] == -1 ? 'selected' : null ?> value="-1">Đã hủy</option>
                                <option <?= $carts['status_delivery'] ==  2 ? 'selected' : null ?> value="2">Đang giao hàng</option>
                                <option <?= $carts['status_delivery'] ==  1 ? 'selected' : null ?> value="1">Chờ lấy hàng</option>
                                <option <?= $carts['status_delivery'] ==  0 ? 'selected' : null ?> value="0">Chờ xác nhận</option>


                            </select>
                        </div>
                    </div>  
                </div>
                <input type="hidden" name="id" id="id">
                <button type="submit" class="btn btn-info">Cập nhật</button>
                <a href="<?= BASE_URL_ADMIN ?>?act=cart" class="btn btn-danger">Back to list</a>
            </form>

        </div>
    </div>
</div>