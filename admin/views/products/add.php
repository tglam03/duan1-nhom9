<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create</h6>
            <div style="color: red;">
                <?= (isset($_SESSION['success']) && $_SESSION['success'] != "") ? $_SESSION['success'] : ''; unset($_SESSION['success']); ?>
            </div>
        </div>
        <div class="card-body">
            <form action="<?= BASE_URL_ADMIN .'?act=product-create' ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label class="form-label">Tên sản phẩm:</label>
                            <input type="text" class="form-control" placeholder="Tên sản phẩm" name="ten_hh">
                            <span class=" text-warning"><?= (isset($errors['ten_hh'])&& $errors['ten_hh'] != "")?$errors['ten_hh']:'';?></span>
                        </div>
                        <div class="mb-3 mt-3">
                            <label class="form-label">Đơn giá:</label>
                            <input type="text" class="form-control" placeholder="Đơn giá" name="don_gia">
                            <span class=" text-warning"><?= (isset($errors['don_gia'])&& $errors['don_gia'] != "")?$errors['don_gia']:'';?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label class="form-label">Giảm giá:</label>
                            <input type="text" class="form-control" placeholder=" Giảm giá" name="giam_gia">
                        </div>
                        <div class="mb-3 mt-3">
                            <label class="form-label">Loại sản phẩm:</label>
                            <select class="form-control" name="loai_id">
                                <option value="" selected>Trống</option>
                                <?php foreach ($category as $ls) {
                                    extract($ls); ?>
                                    <option value="<?=$id; ?>"><?= $ten_loai; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label class="form-label">Màu sắc và kích cỡ</label>
                            <div id="variants" class="ml-4">
                                <div class="variant">
                                    <div class="d-flex">
                                        <div class="col-md-5">
                                            <label for="variant[1][mau]" class="form-label">Màu sắc:</label>
                                            <input type="color" id="variant[1][mau]" placeholder="Màu sắc" name="variant[1][mau]">
                                        </div>
                                        <div class="d-flex justify-content-center col-md-6">
                                            <label for="variant_size_1_S" class="form-label">Size:</label>
                                            <div class="mr-2 col-md-3">
                                                <div class="d-flex">
                                                    <input type="checkbox" id="variant_size_1_S" name="variant[1][size][S][]" onclick="showQuantityInput(1, 'S')" value="S">S
                                                </div>
                                                <div id="soluongsize_1_S" style="display: none;">
                                                    <label class="form-label">Số lượng:</label>
                                                    <input type="text" class=" w-100" name="variant[1][size][S][]" id="">
                                                </div>
                                            </div>
                                            <div class="mr-2 col-md-3">
                                                <div class="d-flex">
                                                    <input type="checkbox" id="variant_size_1_M" name="variant[1][size][M][]" onclick="showQuantityInput(1, 'M')" value="M">M
                                                </div>
                                                <div id="soluongsize_1_M" style="display: none;">
                                                    <label class="form-label">Số lượng:</label>
                                                    <input type="text" class=" w-100" name="variant[1][size][M][]" id="">
                                                </div>
                                            </div>
                                            <div class="mr-2 col-md-3">
                                                <div class="d-flex">
                                                    <input type="checkbox" id="variant_size_1_L" name="variant[1][size][L][]" onclick="showQuantityInput(1, 'L')" value="L">L
                                                </div>
                                                <div id="soluongsize_1_L" style="display: none;">
                                                    <label class="form-label">Số lượng:</label>
                                                    <input type="text" class=" w-100" name="variant[1][size][L][]" id="">
                                                </div>
                                            </div>
                                            <div class="mr-2 col-md-3">
                                                <div class="d-flex">
                                                    <input type="checkbox" id="variant_size_1_XL" name="variant[1][size][XL][]" onclick="showQuantityInput(1, 'XL')" value="XL">XL
                                                </div>
                                                <div id="soluongsize_1_XL" style="display: none;">
                                                    <label class="form-label">Số lượng:</label>
                                                    <input type="text" class=" w-100" name="variant[1][size][XL][]" id="">
                                                </div>
                                            </div>
                                            <div class="mr-2 col-md-3">
                                                <div class="d-flex">
                                                    <input type="checkbox" id="variant_size_1_XXL" name="variant[1][size][XXL][]" onclick="showQuantityInput(1, 'XXL')" value="XXL">XXL
                                                </div>
                                                <div id="soluongsize_1_XXL" style="display: none;">
                                                    <label class="form-label">Số lượng:</label>
                                                    <input type="text" class=" w-100" name="variant[1][size][XXL][]" id="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class=" text-warning"><?= (isset($errors[1]['size'])&& $errors[1]['size'] != "")?$errors[1]['size']:'';?></span>
                                    <span class=" text-warning"><?= (isset($errors[1]['soluong'])&& $errors[1]['soluong'] != "")?$errors[1]['soluong']:'';?></span>
                                </div>
                            </div>
                            <button type="button" class="btn btn-dark" onclick="addVariant()">Thêm biến thể</button>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label class="form-label">Hình ảnh sản phẩm:</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="hinh[]" multiple>
                                <label name="hinh" class="custom-file-label">Choose file</label>
                                <span class=" text-warning"><?= (isset($errors['hinh'])&& $errors['hinh'] != "")?$errors['hinh']:'';?></span>
                            </div>
                        </div>

                        <div class="mb-3 mt-3 o-hidden">
                            <label class="form-label">Mô tả:</label>
                            <div class="custom-file mb-3">
                                <textarea class="form-control" name="mo_ta" id="mo_ta" cols="60" rows="5"></textarea>
                                <span class=" text-warning"><?= (isset($errors['mo_ta'])&& $errors['mo_ta'] != "")?$errors['mo_ta']:'';?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-info">Thêm mới</button>
                <a href="<?= BASE_URL_ADMIN ?>?act=product" class="btn btn-danger">Back to list</a>
            </form>

        </div>
    </div>
</div>