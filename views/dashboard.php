<main>
    <!-- phẩn đầu trang sản phẩm nổi bật -->
    <div id="carousel-home-2">
        <div class="owl-carousel owl-theme">
            <?php $titlesptop = 'Attack Air<br>Monarch';
            $psptop = 'Sản phẩm chất lượng';
            foreach ($producthot as $key => $value) : ?>
                <div class="owl-slide cover" style="background-image: url(<?= explode(',', $value['hinh'])[0]; ?>);">
                    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                        <div class="container">
                            <div class="row justify-content-center justify-content-md-start">
                                <div class="col-lg-12 static">
                                    <div class="slide-text text-center white">
                                        <h2 class="owl-slide-animated owl-slide-title"><?= ($key % 2 == 0) ? $titlesptop : 'Sản phẩm<br>Nổi bật'; ?></h2>
                                        <p class="owl-slide-animated owl-slide-subtitle">
                                            <?= ($key % 2 == 0) ? $psptop : 'Giá tốt nhất cho bạn'; ?>
                                        </p>
                                        <div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="<?= BASE_URL ?>?act=product-detail&id=<?= $value['id'] ?>" role="button">Shop Now</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <div id="icon_drag_mobile"></div>
    </div>
    <!--/carousel-->

    <!-- phẩn freeship -->
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
    <!--/feat-->

    <!-- /container -->
    <!-- đoạn mã sản phẩm bán chạy -->
    <hr class="mb-0">
    <div class="container margin_60_35">
        <div class="main_title">
            <h2>Sản phẩm</h2>
            <span></span>
            <p>Sản phẩm bán chạy nhất mọi thời đại</p>
        </div>
        <div class="row small-gutters">
            <?php foreach ($producttopselling as $key => $value) : ?>
                <div class="col-6 col-md-4 col-xl-3">
                    <div class="grid_item">
                        <figure>
                            <span class="ribbon off">-<?= $value['giam_gia']; ?>%</span>
                            <a href="<?= BASE_URL ?>?act=product-detail&id=<?= $value['id'] ?>">
                                <img class="img-fluid lazy" src="<?= explode(',', $value['hinh'])[0]; ?>" alt="">
                                <img class="img-fluid lazy" src="<?= explode(',', $value['hinh'])[0]; ?>" data-src="<?= explode(',', $value['hinh'])[1]; ?>"" alt="">
                        </a>
                        <div data-countdown=" 2019/05/15" class="countdown"><?= $value['ngay_nhap'] ?>
                    </div>
                    </figure>
                    <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i>
                    </div>
                    <a href="#0">
                        <h3><?= $value['ten_hh'] ?></h3>
                    </a>
                    <div class="price_box">
                        <span class="new_price"><?= ($value['giam_gia'] == 0) ? number_format($value['don_gia']) : number_format(($value['don_gia'] * ((100 - $value['giam_gia']) / 100))); ?>VND</span>
                        <?php if ($value['giam_gia'] > 0) { ?>
                            <span class="old_price"><?= number_format($value['don_gia']) ?>VND</span>
                        <?php } ?>
                    </div>
                    <ul>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to
                                    favorites</span></a></li>
                        <li><a href="<?= BASE_URL. '?act=cart-add&productID=' . $value['id'] . '&quantity=1'  ?>" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a>
                        </li>
                    </ul>
                </div>
                <!-- /grid_item -->
        </div>
    <?php endforeach ?>
    </div>
    <!-- /row -->
    </div>
    <!-- /end sản phẩm top sell -->
    <!-- /container -->
    <div>
        <!-- phẩn sản phẩm mới -->
        <div class="featured lazy" data-bg="url(<?= BASE_URL ?>assets/client/img/banner1.jpg)">
            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <div class="container margin_60">
                    <div class="row justify-content-center justify-content-md-start">
                        <div class="col-lg-6 wow" data-wow-offset="150">
                            <h3>Armor<br>Air Color 720</h3>
                            <p>Lightweight cushioning and durable support with a Phylon midsole</p>
                            <div class="feat_text_block">
                                <div class="price_box">
                                    <span class="new_price">$90.00</span>
                                    <span class="old_price">$170.00</span>
                                </div>
                                <a class="btn_1" href="<?= BASE_URL ?>?act=products" role="button">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /featured -->


        <!-- phẩn sản phẩm mới -->
        <div class="container margin_60_35">
            <div class="main_title">
                <h2>Sản phẩm mới</h2>
                <span>Products</span>
                <p></p>
            </div>
            <div class="owl-carousel owl-theme products_carousel">
                <?php foreach ($productnew as $key => $value) : ?>
                    <div class="item">
                        <div class="grid_item">
                            <span class="ribbon new"><?= ($key <= 2) ? 'New' : '-' . $value['giam_gia'] . '%'; ?></span>
                            <figure>
                                <a href="<?= BASE_URL  ?>?act=products">
                                    <img class="owl-lazy" src="<?= explode(',', $value['hinh'])[0]; ?>" data-src="<?= explode(',', $value['hinh'])[1]; ?>" alt="">
                                </a>
                            </figure>
                            <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i>
                            </div>
                            <a href="product-detail-1.html">
                                <h3><?= $value['ten_hh'] ?></h3>
                            </a>
                            <div class="price_box">
                                <span class="new_price"><?= ($value['giam_gia'] == 0) ? number_format($value['don_gia']) : number_format(($value['don_gia'] * ((100 - $value['giam_gia']) / 100))); ?>VND</span>
                                <?php if ($key > 2 && $value['giam_gia'] > 0) { ?>
                                    <span class="old_price"><?= number_format($value['don_gia']) ?>VND</span>
                                <?php } ?>
                            </div>
                            <ul>
                                <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to
                                            favorites</span></a></li>
                                <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a>
                                </li>
                            </ul>
                        </div>
                        <!-- /grid_item -->
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- /container -->

        <!-- last new tin mới -->
        <div class="container margin_60_35">
            <div class="main_title">
                <h2>Tin mới nhất</h2>
                <span>Blog</span>
                <p></p>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <a class="box_news" href="blog.html">
                        <figure>
                            <img src="<?= BASE_URL ?>assets/client/img/blog-thumb-placeholder.jpg" data-src="<?= BASE_URL ?>assets/client/img/blog-thumb-1.jpg" alt="" width="400" height="266" class="lazy">
                            <figcaption><strong>28</strong>Dec</figcaption>
                        </figure>
                        <ul>
                            <li>by Mark Twain</li>
                            <li>20.11.2017</li>
                        </ul>
                        <h4>Pri oportere scribentur eu</h4>
                        <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse
                            ullum vidisse....</p>
                    </a>
                </div>
                <!-- /box_news -->
                <div class="col-lg-6">
                    <a class="box_news" href="blog.html">
                        <figure>
                            <img src="<?= BASE_URL ?>assets/client/img/blog-thumb-placeholder.jpg" data-src="<?= BASE_URL ?>assets/client/img/blog-thumb-2.jpg" alt="" width="400" height="266" class="lazy">
                            <figcaption><strong>28</strong>Dec</figcaption>
                        </figure>
                        <ul>
                            <li>By Jhon Doe</li>
                            <li>20.11.2017</li>
                        </ul>
                        <h4>Duo eius postea suscipit ad</h4>
                        <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse
                            ullum vidisse....</p>
                    </a>
                </div>
                <!-- /box_news -->
                <div class="col-lg-6">
                    <a class="box_news" href="blog.html">
                        <figure>
                            <img src="<?= BASE_URL ?>assets/client/img/blog-thumb-placeholder.jpg" data-src="<?= BASE_URL ?>assets/client/img/blog-thumb-3.jpg" alt="" width="400" height="266" class="lazy">
                            <figcaption><strong>28</strong>Dec</figcaption>
                        </figure>
                        <ul>
                            <li>By Luca Robinson</li>
                            <li>20.11.2017</li>
                        </ul>
                        <h4>Elitr mandamus cu has</h4>
                        <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse
                            ullum vidisse....</p>
                    </a>
                </div>
                <!-- /box_news -->
                <div class="col-lg-6">
                    <a class="box_news" href="blog.html">
                        <figure>
                            <img src="<?= BASE_URL ?>assets/client/img/blog-thumb-placeholder.jpg" data-src="<?= BASE_URL ?>assets/client/img/blog-thumb-4.jpg" alt="" width="400" height="266" class="lazy">
                            <figcaption><strong>28</strong>Dec</figcaption>
                        </figure>
                        <ul>
                            <li>By Paula Rodrigez</li>
                            <li>20.11.2017</li>
                        </ul>
                        <h4>Id est adhuc ignota delenit</h4>
                        <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse
                            ullum vidisse....</p>
                    </a>
                </div>
                <!-- /box_news -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
</main>