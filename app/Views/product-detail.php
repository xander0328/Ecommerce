<?= $this->include('inc/head')?>


<body>
    <div class="page-wrapper">
        <?= $this->include('inc/header')?>
        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
                        <li class="breadcrumb-item active">Product Details</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                                    <div class="row">
                                        <figure class="product-main-image">
                                            <img id="product-zoom"
                                                src="data:image/jpeg;base64,<?=base64_encode($product['image'])?>"
                                                alt="product image">

                                        </figure><!-- End .product-main-image -->


                                    </div><!-- End .row -->
                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6">
                                <div class="product-details">
                                    <h1 class="product-title"><?=$product['name']?></h1>
                                    <!-- End .product-title -->



                                    <div class="product-price">
                                        PHP <?=$product['price']?>
                                    </div><!-- End .product-price -->

                                    <div class="product-content">
                                        <p><?=$product['description']?>
                                        </p><br>
                                        <p>Stocks: <?=$product['quantity']?> </p>
                                    </div><!-- End .product-content -->



                                    <div class="details-filter-row details-row-size">
                                        <label for="qty">Qty:</label>
                                        <div class="product-details-quantity">
                                            <input type="number" id="qty" class="form-control" value="1" min="1"
                                                max="10" step="1" data-decimals="0" required>
                                        </div><!-- End .product-details-quantity -->
                                    </div><!-- End .details-filter-row -->

                                    <div class="product-details-action">
                                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>


                                    </div><!-- End .product-details-action -->

                                    <div class="product-details-footer">
                                        <div class="product-cat">
                                            <span>Category:</span>
                                            <a href="#"><?php foreach ($category as $cat) {
                                               if ($cat['category_id'] == $product['category_id'])
                                               echo $cat['name'];
                                            }?></a>
                                        </div><!-- End .product-cat -->

                                        <div class="social-icons social-icons-sm">
                                            <span class="social-label">Share:</span>
                                            <a href="#" class="social-icon" title="Facebook" target="_blank"><i
                                                    class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="Twitter" target="_blank"><i
                                                    class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="Instagram" target="_blank"><i
                                                    class="icon-instagram"></i></a>
                                            <a href="#" class="social-icon" title="Pinterest" target="_blank"><i
                                                    class="icon-pinterest"></i></a>
                                        </div>
                                    </div><!-- End .product-details-footer -->
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->


                    <?php 
                    // $len = count($prod_list);
                    $list = array();
                    $count = 0;
                    foreach ($prod_list as $val){
                        if($val['product_id'] == $product['product_id'])
                        continue;
                    
                        if ($val['category_id'] == $product['category_id']){
                            $list[$count] = $val;
                            $count++;
                        }
                    }
                    $len = count($list);
                        $toSelect = 4;
                        
                    if($len > 0){
                    ?>
                    <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->

                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                        data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>
                        <?php 
                        while($len < $toSelect){
                            $toSelect-=1;
                        }
                        if($len == 1){
                            $selected = array(array_rand($list, $toSelect)) ;                            
                        }
                        else {
                            $selected = array_rand($list, $toSelect) ;   
                        }
                       
                        foreach ($selected as $sel) { ?>

                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                <a href="<?=base_url()?>product/<?=$list[$sel]['product_id']?>">
                                    <img src="data:image/jpeg;base64,<?=base64_encode($list[$sel]['image'])?>"
                                        alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                            wishlist</span></a>
                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                        title="Quick view"><span>Quick view</span></a>
                                    <a href="#" class="btn-product-icon btn-compare"
                                        title="Compare"><span>Compare</span></a>
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">
                                        <?php foreach ($category as $val) {
                                        if ($list[$sel]['category_id'] == $val['category_id']) {
                                            echo $val['name'];
                                        }
                                    }?>
                                    </a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html"><?=$list[$sel]['name']?></a></h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    PHP <?=$list[$sel]['price']?>
                                </div><!-- End .product-price -->


                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                        <?php }?>
                    </div><!-- End .owl-carousel -->

                    <?php } ?>
                </div>
                <!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
        <!-- Plugins JS File -->
        <script src="<?=base_url()?>assets/js/jquery.min.js"></script>
        <script src="<?=base_url()?>assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?=base_url()?>assets/js/jquery.hoverIntent.min.js"></script>
        <script src="<?=base_url()?>assets/js/jquery.waypoints.min.js"></script>
        <script src="<?=base_url()?>assets/js/superfish.min.js"></script>
        <script src="<?=base_url()?>assets/js/owl.carousel.min.js"></script>
        <script src="<?=base_url()?>assets/js/bootstrap-input-spinner.js"></script>
        <script src="<?=base_url()?>assets/js/bootstrap-input-spinner.js"></script>
        <script src="<?=base_url()?>assets/js/jquery.magnific-popup.min.js"></script>
        <!-- Main JS File -->
        <script src="<?=base_url()?>assets/js/main.js"></script>
</body>