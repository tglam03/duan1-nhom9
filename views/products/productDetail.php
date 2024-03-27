<main>
    <?php foreach ($products as  $product) : ?>
        <div class="container margin_30">
            <!-- phẩn ảnh sản phẩm -->
            <div class="row">
                <div class="col-md-6">
                    <div class="all">
                        <div class="slider">

                            <div class="owl-carousel owl-theme main">
                                <?php
                                $hinhs = explode(',', $product['hinh']);
                                $sohinh = sizeof($hinhs);
                                if ($sohinh > 1) {
                                    foreach ($hinhs as $hinh) {
                                        echo '<div style="background-image: url(' . BASE_URL . $hinh . ');" class="item-box"></div>';
                                    }
                                }
                                ?>
                            </div>
                            <div class="left nonl"><i class="ti-angle-left"></i></div>
                            <div class="right"><i class="ti-angle-right"></i></div>
                        </div>
                        <div class="slider-two">
                            <div class="owl-carousel owl-theme thumbs">
                                <?php
                                if ($sohinh > 1) {
                                    foreach ($hinhs as $key => $hinh) {
                                        echo '<div style="background-image: url(' . BASE_URL . $hinh . ');" class="item' . (($key == 1) ? ' active' : '') . '"></div>';
                                    }
                                }
                                ?>
                            </div>
                            <div class="left-t nonl-t"></div>
                            <div class="right-t"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="#">Trang chủ</a></li>
                            <li><a href="#">Danh mục</a></li>
                            <li>Trang hoạt động</li>
                        </ul>
                    </div>
                    <!-- /page_header -->

                    <!-- thông tin sản phẩm -->
                    <div class="prod_info">
                        <h1><?= $product['ten_hh']; ?><small style="margin-left: 2vw; color:cadetblue; font-size: 1vw;">Còn: <?= $product['mau_size_soluong']['soluong']; ?>sp</small></h1>
                        <p><small>SKU: <?= $product['id']; ?>SM</small><br></p>
                        <div class="prod_options">
                            <div class="row">
                                <label class="col-xl-5 col-lg-5 col-md-6 col-6 pt-0"><strong>Màu</strong></label>
                                <div class="col-xl-4 col-lg-5 col-md-6 col-6 colors">
                                    <ul id="colorList">
                                        <?php foreach (explode(',', $product['mau_size_soluong']['mau']) as $keymau => $mausp) { ?>
                                            <li><a href="#0" style="background-color: <?= $mausp; ?>;" class="color color_<?= $keymau; ?> <?= ($keymau == 0) ? 'active' : ''; ?>"></a></li>
                                        <?php }; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-xl-5 col-lg-5 col-md-6 col-6"><strong>Size</strong> - Size Guide <a href="#0" data-bs-toggle="modal" data-bs-target="#size-modal"><i class="ti-help-alt"></i></a></label>
                                <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                    <div class="custom-select-form">
                                        <select class="wide">
                                            <?php foreach (explode(',', $product['mau_size_soluong']['size']) as $keysize => $sizesp) {
                                                if ($keysize == 0) echo '<option value="' . $sizesp . '" ac>Small (' . $sizesp . ')</option>';
                                                else echo '<option value="' . $sizesp . '">' . $sizesp . '</option>';
                                            }; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-xl-5 col-lg-5 col-md-6 col-6"><strong>Số lượng</strong></label>
                                <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                    <div class="numbers-row">
                                        <input type="text" value="1" id="Số_lượng_1" data-min="0" data-max="<?= $product['mau_size_soluong']['soluong']; ?>" class="qty2" name="Số_lượng_1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 col-md-6">
                                <div class="price_main"> <span class="new_price">$<?= ($product['giam_gia'] == 0) ? $product['don_gia'] : ($product['don_gia'] * ((100 - $product['giam_gia']) / 100)); ?></span>
                                    <?php if ($product['giam_gia'] > 0) { ?>
                                        <span class="percentage">-<?= $product['giam_gia'] ?>%</span>
                                        <span class="old_price">$<?= $product['don_gia'] ?></span>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="btn_add_to_cart"><a href="#0" class="btn_1">Add to Cart</a></div>
                            </div>
                        </div>
                    </div>
                    <!-- /prod_info -->

                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->

        <div class="tabs_product">
            <div class="container">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a id="tab-A" href="#pane-A" class="nav-link active" data-bs-toggle="tab" role="tab">Mô tả</a>
                    </li>
                    <li class="nav-item">
                        <a id="tab-B" href="#pane-B" class="nav-link" data-bs-toggle="tab" role="tab">Đánh giá</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /tabs_product phẩn đánh giá và mo tả -->
        <div class="tab_content_wrapper">
            <div class="container">
                <div class="tab-content" role="tablist">
                    <div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
                        <div class="card-header" role="tab" id="heading-A">
                            <h5 class="mb-0">
                                <a class="collapsed" data-bs-toggle="collapse" href="#collapse-A" aria-expanded="false" aria-controls="collapse-A">
                                    Mô tả
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
                            <div class="card-body">
                                <div class="row justify-content-between">
                                    <div class="col-lg-6">
                                        <h3>Details</h3>
                                        <p><?= $product['mo_ta']; ?></p>
                                    </div>
                                    <div class="col-lg-5">
                                        <h3>Thông số sản phẩm</h3>
                                        <div class="table-responsive">
                                            <table class="table table-sm table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td><strong>Màu sắc</strong></td>
                                                        <td class="d-flex"> <?php foreach (explode(',', $product['mau_size_soluong']['mau']) as $mausp) { ?><div class="btnhinhtron" style="background-color:<?= $mausp; ?>;"></div><?php }; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Size</strong></td>
                                                        <td>
                                                            <?php foreach (explode(',', $product['mau_size_soluong']['size']) as $sizesp) { ?><?= $sizesp; ?>,<?php }; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Số lượng</strong></td>
                                                        <td><?= $product['mau_size_soluong']['soluong']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /table-responsive -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /TAB A -->
                    <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                        <div class="card-header" role="tab" id="heading-B">
                            <h5 class="mb-0">
                                <a class="collapsed" data-bs-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
                                    Đánh giá
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
                            <div class="card-body">
                                <div class="row justify-content-between">
                                    <div class="col-lg-6">
                                        <div class="review_content">
                                            <div class="clearfix add_bottom_10">
                                                <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><em>5.0/5.0</em></span>
                                                <em>Published 54 minutes ago</em>
                                            </div>
                                            <h4>"Commpletely satisfied"</h4>
                                            <p>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola sea. Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="review_content">
                                            <div class="clearfix add_bottom_10">
                                                <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star empty"></i><i class="icon-star empty"></i><em>4.0/5.0</em></span>
                                                <em>Published 1 day ago</em>
                                            </div>
                                            <h4>"Always the best"</h4>
                                            <p>Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->
                                <div class="row justify-content-between">
                                    <div class="col-lg-6">
                                        <div class="review_content">
                                            <div class="clearfix add_bottom_10">
                                                <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star empty"></i><em>4.5/5.0</em></span>
                                                <em>Published 3 days ago</em>
                                            </div>
                                            <h4>"Outstanding"</h4>
                                            <p>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola sea. Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="review_content">
                                            <div class="clearfix add_bottom_10">
                                                <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><em>5.0/5.0</em></span>
                                                <em>Published 4 days ago</em>
                                            </div>
                                            <h4>"Excellent"</h4>
                                            <p>Sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->
                                <p class="text-end"><a href="leave-review.html" class="btn_1">Leave a review</a></p>
                            </div>
                            <!-- /card-body -->
                        </div>
                    </div>
                    <!-- /tab B -->
                </div>
                <!-- /tab-content -->
            </div>
            <!-- /container -->
        </div>
        <!-- /tab_content_wrapper -->


        <!-- sản phẩm liên quan dổ sản phẩm ra -->
        <div class="container margin_60_35">
            <div class="main_title">
                <h2>BEST SELLER</h2>
                <!-- sản phẩm -->
            </div>
            <div class="owl-carousel owl-theme products_carousel">
                <?php foreach ($productscungloai as $productscungloai) : ?>
                    <div class="item">
                        <div class="grid_item">
                            <span class="ribbon new">-<?= $productscungloai['giam_gia'] ?>%</span>
                            <figure>
                                <a href="<?= BASE_URL; ?>?act=product-detail&id=<?= $productscungloai['id'] ?>">
                                    <img class="owl-lazy" src="<?= explode(',', $productscungloai['hinh'])[0]; ?>" data-src="<?= explode(',', $productscungloai['hinh'])[0]; ?>" alt="">
                                </a>
                            </figure>
                            <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                            <a href="<?= BASE_URL; ?>?act=product-detail&id=<?= $productscungloai['id'] ?>">
                                <h3><?= $productscungloai['ten_hh'] ?></h3>
                            </a>
                            <div class="price_box">
                                <span class="new_price">$<?= ($productscungloai['giam_gia'] == 0) ? $productscungloai['don_gia'] : ($productscungloai['don_gia'] * ((100 - $productscungloai['giam_gia']) / 100)); ?></span>
                                <?php if ($productscungloai['giam_gia'] > 0) { ?>
                                    <span class="old_price">$<?= $productscungloai['don_gia'] ?></span>
                                <?php } ?>
                            </div>
                            <ul>
                                <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                                <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                            </ul>
                        </div>
                        <!-- /grid_item -->
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- /products_carousel -->
        </div>
        <!-- /container -->

        <div class="feat">
            <div class="container">
                <ul>
                    <li>
                        <div class="box">
                            <i class="ti-gift"></i>
                            <div class="justify-content-center">
                                <h3>Free Shipping</h3>
                                <p>For all oders over $99</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="box">
                            <i class="ti-wallet"></i>
                            <div class="justify-content-center">
                                <h3>Secure Payment</h3>
                                <p>100% secure payment</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="box">
                            <i class="ti-headphone-alt"></i>
                            <div class="justify-content-center">
                                <h3>24/7 Support</h3>
                                <p>Online top support</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    <?php endforeach; ?>
    <!--/feat-->
</main>