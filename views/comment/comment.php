<?php
session_start();
$mahh = $_REQUEST['mahh'];
// Require file trong commons
require_once '../../commons/env.php';
require_once '../../commons/helper.php';
require_once '../../commons/connect-db.php';
require_once '../../commons/model.php';
// Require file trong controllers và models
require_file(PATH_CONTROLLER);
require_once '../../models/productdetail.php';
$dsbl = loadAllBinhluan($mahh);
?>
<div class="row">
    <div>
        <div class="review_content">
            <div class="clearfix add_bottom_10">
                <div class="d-flex justify-content-around">
                    <h4 class="col-lg-2 text-warning">Mã Bình Luận</h4>
                    <h4 class="col-lg-4 text-warning">Nội Dung</h4>
                    <h4 class="col-lg-3 text-warning">Ngày Bình Luận</h4>
                    <h4 class="col-lg-3 text-warning">Người Bình Luận</h4>
                </div>
                <?php foreach ($dsbl as $key => $dsbl) { ?>
                    <div class="d-flex justify-content-around">
                        <p class="col-lg-2"><?= $key + 1 ?>-MT-<?= $dsbl['id']; ?></p>
                        <p class="col-lg-4"><?= $dsbl['noi_dung']; ?></p>
                        <p class="col-lg-3"><?= $dsbl['ngay_bl']; ?></p>
                        <p class="col-lg-3"><?= $dsbl['user']; ?></p>
                    </div>
                <?php }; ?>
            </div>
        </div>
    </div>
</div>
<!-- /row -->
<div class="row">
    <div class="col">
        <form method="post" action="<?= $_SERVER['PHP_SELF']; ?>" class="row g-2 align-items-center">
            <div class="col">
                <label class="visually-hidden">Bình luận:</label>
                <input type="text" class="form-control" name="noidung" placeholder="Bình luận..." style="width: 100%;">
            </div>
            <div class="col-auto">
                <input type="hidden" name="mahh" value="<?= $mahh; ?>">
                <input type="submit" name="binhluan" class="btn btn-primary">
            </div>
        </form>
        <span class=" text-bg-success"><?= (isset($_SESSION['tbnoi_dung']) &&  $_SESSION['tbnoi_dung'] != '') ?  $_SESSION['tbnoi_dung'] : ''; ?></span>
    </div>
</div>
<?php
if (isset($_POST['binhluan']) && $_POST['binhluan']) {
    if (isset($_SESSION['user']) && $_SESSION['user'] != "") {
        $kh_id = $_SESSION['user']['id'];
        $noi_dung = $_POST['noidung'];
        $ngay_bl = date('H:i:s d/m/Y');
        $data = [
            'hh_id' => $mahh,
            'kh_id' => $kh_id,
            'noi_dung' => $noi_dung,
            'ngay_bl' => $ngay_bl,
        ];
        $_SESSION['tbnoi_dung'] = '';
        //check ten hàng hóa
        if (!empty($data)) {
            //check dongia
            if (empty($data['noi_dung'])) {
                $_SESSION['tbnoi_dung'] = 'Nội dung bắt buộc phải nhập';
            } elseif (strlen($data['noi_dung']) < 10) {
                $_SESSION['tbnoi_dung'] = 'Nội dung phải lớn hơn 10 ký tự';
            }
        }
        if (empty($_SESSION['tbnoi_dung'])) {
            insert('binh_luan', $data);
        }
    } else {
        $_SESSION['tbnoi_dung'] = 'Đăng nhập để sử dụng chức năng';
    }
    header('Location:' . $_SERVER['HTTP_REFERER']);
    exit();
}
?>