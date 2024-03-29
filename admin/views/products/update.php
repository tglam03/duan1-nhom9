<div class="container-fluid" onload="showDefaultQuantityInputs()">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?>
        <a class="btn btn-info" href="<?= BASE_URL_ADMIN ?>?act=product">Back to list</a>
    </h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center">
            <h6 class="m-0 mr-3 font-weight-bold text-primary">Update</h6>
            <div style="color: red;">
                <?= (isset($_SESSION['success']) && $_SESSION['success'] != "") ? $_SESSION['success'] : '';unset($_SESSION['success']); ?>
            </div>
        </div>
        <div class="card-body">
                <form action="<?= BASE_URL_ADMIN . '?act=product-update&id=' . $product['id'] . '' ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 mt-3">
                                <label class="form-label">Tên sản phẩm:</label>
                                <input type="text" class="form-control" placeholder="Tên sản phẩm" name="ten_hh" value="<?= $product['ten_hh']; ?>">
                                <span class=" text-warning"><?= (isset($errors['ten_hh']) && $errors['ten_hh'] != "") ? $errors['ten_hh'] : ''; ?></span>
                            </div>
                            <div class="mb-3 mt-3">
                                <label class="form-label">Đơn giá:</label>
                                <input type="text" class="form-control" placeholder="Đơn giá" name="don_gia" value="<?= $product['don_gia']; ?>">
                                <span class=" text-warning"><?= (isset($errors['don_gia']) && $errors['don_gia'] != "") ? $errors['don_gia'] : ''; ?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 mt-3">
                                <label class="form-label">Giảm giá:</label>
                                <input type="text" class="form-control" placeholder=" Giảm giá" name="giam_gia" value="<?= $product['giam_gia']; ?>">
                                <span class=" text-warning"><?= (isset($errors['giam_gia']) && $errors['giam_gia'] != "") ? $errors['giam_gia'] : ''; ?></span>
                            </div>
                            <div class="mb-3 mt-3">
                                <label class="form-label">Loại sản phẩm:</label>
                                <select class="form-control" name="loai_id">
                                    <option value="" <?=empty($product['loai_id'])?'checked':'';?>>Trống</option>
                                    <?php foreach ($category as $ls) {
                                        extract($ls); ?>
                                        <option value="<?= $id; ?>" <?= ($id == $product['loai_id']) ? 'selected' : ''; ?>><?= $ten_loai; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 mt-3">
                                <label class="form-label">Màu sắc và kích cỡ</label>
                                <!-- biến thể -->
                                <div id="variants" class="ml-4">
                                    <div class="variant">
                                        <?php $mangsize = [];
                                        $mangsoluong = [];
                                        $mangid = [];
                                        foreach ($productsColorsandsize['mau'] as $key => $mau) :
                                            foreach ($productsColorsandsize['size'] as $size) {
                                                if ($mau['id'] == $size['mau_id']) {
                                                    if ($size['size'] == 'S') {
                                                        $mangsize[$key]['s'] = 1;
                                                        $mangsoluong[$key]['s'] = $size['soluong'];
                                                        $mangid[$key]['s'] = $size['id'];
                                                    }
                                                    if ($size['size'] == 'M') {
                                                        $mangsize[$key]['m'] = 1;
                                                        $mangsoluong[$key]['m'] = $size['soluong'];
                                                        $mangid[$key]['m'] = $size['id'];
                                                    }
                                                    if ($size['size'] == 'L') {
                                                        $mangsize[$key]['l'] = 1;
                                                        $mangsoluong[$key]['l'] = $size['soluong'];
                                                        $mangid[$key]['l'] = $size['id'];
                                                    }
                                                    if ($size['size'] == 'XL') {
                                                        $mangsize[$key]['xl'] = 1;
                                                        $mangsoluong[$key]['xl'] = $size['soluong'];
                                                        $mangid[$key]['xl'] = $size['id'];
                                                    }
                                                    if ($size['size'] == 'XXL') {
                                                        $mangsize[$key]['xxl'] = 1;
                                                        $mangsoluong[$key]['xxl'] = $size['soluong'];
                                                        $mangid[$key]['xxl'] = $size['id'];
                                                    }
                                                }
                                            } ?>
                                            <div class="d-flex">
                                                <div class="col-md-5">
                                                    <label for="variant[<?= $key + 1 ?>][mau]" class="form-label">Màu sắc:</label>
                                                    <input type="hidden" name="variant[<?= $key + 1 ?>][idmau]" value="<?= $mau['id']; ?>">
                                                    <input type="color" id="variant[<?= $key + 1 ?>][mau]" value="<?= $mau['mau']; ?>" placeholder="Màu sắc" name="variant[<?= $key + 1 ?>][mau]">
                                                </div>
                                                <div class="d-flex justify-content-center col-md-6">
                                                    <label for="variant_size_<?= $key + 1 ?>_S" class="form-label">Size:</label>
                                                    <div class="mr-2 col-md-3">
                                                        <div class="d-flex">
                                                            <input type="checkbox" <?= (isset($mangsize[$key]['s']) && $mangsize[$key]['s'] == 1) ? 'checked' : ''; ?> id="variant_size_<?= $key + 1 ?>_S" name="variant[<?= $key + 1 ?>][size][S][]" onclick="showQuantityInput(<?= $key + 1 ?>, 'S')" value="S">S
                                                        </div>
                                                        <div id="soluongsize_<?= $key + 1 ?>_S" style="display: none;">
                                                            <label class="form-label">Số lượng:</label>
                                                            <input type="text" value="<?= (isset($mangsoluong[$key]['s']) && $mangsoluong[$key]['s'] > 0) ? $mangsoluong[$key]['s'] : ''; ?>" class=" w-100" name="variant[<?= $key + 1 ?>][size][S][]" id="">
                                                        </div>
                                                    </div>
                                                    <div class="mr-2 col-md-3">
                                                        <div class="d-flex">
                                                            <input type="checkbox" <?= (isset($mangsize[$key]['m']) && $mangsize[$key]['m'] == 1) ? 'checked' : ''; ?> id="variant_size_<?= $key + 1 ?>_M" name="variant[<?= $key + 1 ?>][size][M][]" onclick="showQuantityInput(<?= $key + 1 ?>, 'M')" value="M">M
                                                        </div>
                                                        <div id="soluongsize_<?= $key + 1 ?>_M" style="display: none;">
                                                            <label class="form-label">Số lượng:</label>
                                                            <input type="text" value="<?= (isset($mangsoluong[$key]['m']) && $mangsoluong[$key]['m'] > 0) ? $mangsoluong[$key]['m'] : ''; ?>" class=" w-100" name="variant[<?= $key + 1 ?>][size][M][]" id="">
                                                        </div>
                                                    </div>
                                                    <div class="mr-2 col-md-3">
                                                        <div class="d-flex">
                                                            <input type="checkbox" <?= (isset($mangsize[$key]['l']) && $mangsize[$key]['l'] == 1) ? 'checked' : ''; ?> id="variant_size_<?= $key + 1 ?>_L" name="variant[<?= $key + 1 ?>][size][L][]" onclick="showQuantityInput(<?= $key + 1 ?>, 'L')" value="L">L
                                                        </div>
                                                        <div id="soluongsize_<?= $key + 1 ?>_L" style="display: none;">
                                                            <label class="form-label">Số lượng:</label>
                                                            <input type="text" class=" w-100" value="<?= (isset($mangsoluong[$key]['l']) && $mangsoluong[$key]['l'] > 0) ? $mangsoluong[$key]['l'] : ''; ?>" name="variant[<?= $key + 1 ?>][size][L][]" id="">
                                                        </div>
                                                    </div>
                                                    <div class="mr-2 col-md-3">
                                                        <div class="d-flex">
                                                            <input type="checkbox" <?= (isset($mangsize[$key]['xl']) && $mangsize[$key]['xl'] == 1) ? 'checked' : ''; ?> id="variant_size_<?= $key + 1 ?>_XL" name="variant[<?= $key + 1 ?>][size][XL][]" onclick="showQuantityInput(<?= $key + 1 ?>, 'XL')" value="XL">XL
                                                        </div>
                                                        <div id="soluongsize_<?= $key + 1 ?>_XL" style="display: none;">
                                                            <label class="form-label">Số lượng:</label>
                                                            <input type="text" class=" w-100" value="<?= (isset($mangsoluong[$key]['xl']) && $mangsoluong[$key]['xl'] > 0) ? $mangsoluong[$key]['xl'] : ''; ?>" name="variant[<?= $key + 1 ?>][size][XL][]" id="">
                                                        </div>
                                                    </div>
                                                    <div class="mr-2 col-md-3">
                                                        <div class="d-flex">
                                                            <input type="checkbox" <?= (isset($mangsize[$key]['xxl']) && $mangsize[$key]['xxl'] == 1) ? 'checked' : ''; ?> id="variant_size_<?= $key + 1 ?>_XXL" name="variant[<?= $key + 1 ?>][size][XXL][]" onclick="showQuantityInput(<?= $key + 1 ?>, 'XXL')" value="XXL">XXL
                                                        </div>
                                                        <div id="soluongsize_<?= $key + 1 ?>_XXL" style="display: none;">
                                                            <label class="form-label">Số lượng:</label>
                                                            <input type="text" class=" w-100" value="<?= (isset($mangsoluong[$key]['xxl']) && $mangsoluong[$key]['xxl'] > 0) ? $mangsoluong[$key]['xxl'] : ''; ?>" name="variant[<?= $key + 1 ?>][size][XXL][]" id="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span class=" text-warning"><?= (isset($errors[1]['size']) && $errors[1]['size'] != "") ? $errors[1]['size'] : ''; ?></span>
                                                <span class=" text-warning"><?= (isset($errors[1]['soluong']) && $errors[1]['soluong'] != "") ? $errors[1]['soluong'] : ''; ?></span>
                                            </div>
                                            <!-- Lấy id size -->
                                            <input type="hidden" name="variant[<?= $key + 1 ?>][size][S][idsize]" value="<?= (isset($mangid[$key]['s']) && $mangid[$key]['s'] != '') ? $mangid[$key]['s'] : ''; ?>">
                                            <input type="hidden" name="variant[<?= $key + 1 ?>][size][M][idsize]" value="<?= (isset($mangid[$key]['m']) && $mangid[$key]['m'] != '') ? $mangid[$key]['m'] : ''; ?>">
                                            <input type="hidden" name="variant[<?= $key + 1 ?>][size][L][idsize]" value="<?= (isset($mangid[$key]['l']) && $mangid[$key]['l'] != '') ? $mangid[$key]['l'] : ''; ?>">
                                            <input type="hidden" name="variant[<?= $key + 1 ?>][size][XL][idsize]" value="<?= (isset($mangid[$key]['xl']) && $mangid[$key]['xl'] != '') ? $mangid[$key]['xl'] : ''; ?>">
                                            <input type="hidden" name="variant[<?= $key + 1 ?>][size][XXL][idsize]" value="<?= (isset($mangid[$key]['xxl']) && $mangid[$key]['xxl'] != '') ? $mangid[$key]['xxl'] : ''; ?>">
                                        <?php endforeach; ?>
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
                                    <div class="slideshow-container">
                                        <?php
                                        $a = 1;
                                        $hinhs = explode(',', $product['hinh']);
                                        $sohinh = sizeof($hinhs);
                                        if($sohinh>1){
                                                                                    foreach ($hinhs as $hinh) {
                                            $a++;
                                            echo '  <div class="mySlides fade">
                                                        <div class="numbertext">' . $a . ' / ' . $sohinh . '</div>
                                                            <img class="sizehinhsp" src="' . BASE_URL . $hinh . '" style="width:100%">
                                                        <div class="text">Hình ' . $a . '</div>
                                                    </div>';
                                            if ($a == $sohinh) {
                                                $a = 0;
                                            }
                                        }
                                        }
                                        ?>
                                        <div style="text-align:center">
                                            <?php if($sohinh>1){
                                                for ($i = 1; $i <= $sohinh; $i++) {
                                                    echo '<span class="dot"></span>';
                                                };
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <label name="hinh" class="custom-file-label">Choose file</label>
                                    <span class=" text-warning"><?= (isset($errors['hinh']) && $errors['hinh'] != "") ? $errors['hinh'] : ''; ?></span>
                                </div>
                            </div>

                            <div class="mb-3 mt-3 o-hidden">
                                <label class="form-label">Mô tả:</label>
                                <div class="custom-file mb-3">
                                    <textarea class="form-control" name="mo_ta" id="mo_ta" cols="60" rows="5" value="<?= $product['mo_ta']; ?>"><?= $product['mo_ta']; ?></textarea>
                                    <span class=" text-warning"><?= (isset($errors['mo_ta']) && $errors['mo_ta'] != "") ? $errors['mo_ta'] : ''; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="hinh" value="<?= $product['hinh']; ?>">
                    <button type="submit" name="submit" class="btn btn-info">Cập nhật</button>
                </form>
        </div>
    </div>
</div>
<script>
let slideIndex = 0; // Sử dụng key để tạo slideIndex riêng cho mỗi slideshow
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        // Ẩn tất cả các slide
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }

        // Tăng slideIndex và kiểm tra xem nó có vượt qua số lượng slides hay không
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1;
        }

        // Loại bỏ lớp "active" từ tất cả các nút điều hướng
        for (i = 0; i < dots.length; i++) {
            dots[i].classList.remove("active");
        }

        // Hiển thị slide hiện tại và thêm lớp "active" vào nút điều hướng tương ứng
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].classList.add("active");

        // Gọi lại hàm này sau 1 giây để chuyển đổi slide
        setTimeout(showSlides, 1000);
    }
</script>