 <div class="bg-light pt-5 pb-6">
     <div class="container trending-products">
         <div class="heading heading-flex mb-3">
             <div class="heading-left">
                 <h2 class="title">New Arrivals</h2><!-- End .title -->
             </div><!-- End .heading-left -->

         </div><!-- End .heading -->

         <div class="row">
             <div class="col-xl-5col d-none d-xl-block">
                 <div class="banner">
                     <a href="#">
                         <img src="<?=base_url()?>assets/images/demos/demo-4/banners/banner-4.jpg" alt="banner">
                     </a>
                 </div><!-- End .banner -->
             </div><!-- End .col-xl-5col -->

             <div class="col-xl-4-5col">
                 <div class="tab-content tab-content-carousel just-action-icons-sm">
                     <div class="tab-pane p-0 fade show active" id="trending-top-tab" role="tabpanel"
                         aria-labelledby="trending-top-link">
                         <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
                             data-owl-options='{
                                            "nav": true, 
                                            "dots": false,
                                            "margin": 20,
                                            "loop": false,
                                            "responsive": {
                                                "0": {
                                                    "items":2
                                                },
                                                "480": {
                                                    "items":2
                                                },
                                                "768": {
                                                    "items":3
                                                },
                                                "992": {
                                                    "items":4
                                                }
                                            }
                                        }'>
                             <?php foreach ($new_arrival as $new) {?>
                             <div class="product product-2">
                                 <figure class="product-media">

                                     <a href="<?=base_url()?>product/<?=$new['product_id']?>">
                                         <img src="data:image/jpeg;base64,<?=base64_encode($new['image'])?>"
                                             alt="Product image" class="product-image">
                                     </a>

                                     <div class="product-action-vertical">
                                         <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                     </div><!-- End .product-action -->

                                     <div class="product-action">
                                         <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to
                                                 cart</span></a>
                                         <a href="popup/quickView.html" class="btn-product btn-quickview"
                                             title="Quick view"><span>quick view</span></a>
                                     </div><!-- End .product-action -->
                                 </figure><!-- End .product-media -->

                                 <div class="product-body">
                                     <div class="product-cat">
                                         <a href="#"><?php foreach ( $category as $cat) { 
                                            if($new['category_id'] == $cat['category_id']){
                                                echo $cat['name'];
                                            }
                                         }?></a>
                                     </div><!-- End .product-cat -->
                                     <h3 class="product-title"><a href="product.html"><?=$new['name']?></a></h3>
                                     <!-- End .product-title -->
                                     <div class="product-price">
                                         PHP <?=$new['price']?>
                                     </div><!-- End .product-price -->

                                 </div><!-- End .product-body -->
                             </div><!-- End .product -->
                             <?php } ?>


                         </div><!-- End .owl-carousel -->
                     </div><!-- .End .tab-pane -->
                 </div><!-- End .tab-content -->
             </div><!-- End .col-xl-4-5col -->
         </div><!-- End .row -->
     </div><!-- End .container -->
 </div><!-- End .bg-light pt-5 pb-6 -->