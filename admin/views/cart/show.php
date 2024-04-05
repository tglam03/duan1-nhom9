<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Details</h6>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Thông tin loại hàng</th>
                    <th>Dữ liệu</th>
                </tr>

                <?php foreach ($users as $fieldName => $value) : ?>
                    <tr>
                        <th>
                            <?= ucfirst($fieldName) ?>
                        </th>
                        <th>
                            <?php
                            switch ($fieldName) {
                                case 'mat_khau':
                                    echo '*******';
                                    break;
                                case 'vai_tro':
                                    echo $value
                                        ? '<span class="badge badge-success">Admin</span>' :
                                        ' <span class="badge badge-warning">Member</span> ';
                                    break;
                                default:
                                    echo $value;
                                    break ;
                            }
                            ?>
                        </th>
                    </tr>
                <?php endforeach; ?>
            </table>
            <a href="<?= BASE_URL_ADMIN ?>/?act=users" class="btn btn-danger">Back to list</a>

        </div>
    </div>
</div>