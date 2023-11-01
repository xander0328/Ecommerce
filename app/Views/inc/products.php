  <div class="container for-you mt-3" id="all_products">
      <div class="heading heading-flex mb-3">
          <div class="heading-left">
              <h2 class="title">All Products</h2><!-- End .title -->
          </div><!-- End .heading-left -->

          <div class="heading-right">
              <div class="dropdown category-dropdown">
                  <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                      aria-expanded="false" data-display="static" title="Browse Categories">
                      Categories &nbsp;<i class="icon-angle-down"></i>
                  </a>

                  <div class="dropdown-menu">
                      <nav class="side-nav">
                          <ul class="menu-vertical sf-arrows">
                              <?php foreach ($menu_category as $cat) : 
                            ?>
                              <li><a href="category/<?=$cat['category_id']?>"><?=$cat['name']?></a></li>
                              <?php endforeach; ?>
                          </ul><!-- End .menu-vertical -->
                      </nav><!-- End .side-nav -->
                  </div><!-- End .dropdown-menu -->
              </div><!-- End .category-dropdown -->
          </div><!-- End .heading-right -->
      </div><!-- End .heading -->

      <div class="products">
          <div class="row justify-content-center"><?php foreach ($product as $prod) {?>
              <div class="col-6 col-md-4 col-lg-3">

                  <div class="product product-2">
                      <figure class="product-media">
                          <a href="<?=base_url()?>product/<?=$prod['product_id']?>">
                              <img src="data:image/jpeg;base64,<?=base64_encode($prod['image'])?>" alt="Product image"
                                  class="product-image">
                          </a>

                          <div class="product-action-vertical">
                              <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                          </div><!-- End .product-action -->

                          <div class="product-action">
                              <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                              <a href="popup/quickView.html" class="btn-product btn-quickview"
                                  title="Quick view"><span>quick
                                      view</span></a>
                          </div><!-- End .product-action -->
                      </figure><!-- End .product-media -->

                      <div class="product-body">
                          <div class="product-cat">
                              <a href="#"><?php foreach ( $category as $cat) { 
                                            if($prod['category_id'] == $cat['category_id']){
                                                echo $cat['name'];
                                            }
                                         }?></a>
                          </div><!-- End .product-cat -->
                          <h3 class="product-title"><?= $prod['name']?></h3>
                          <!-- End .product-title -->
                          <div class="product-price">
                              <span class="new-price">PHP <?=$prod['price']?></span>
                          </div><!-- End .product-price -->


                      </div><!-- End .product-body -->
                  </div><!-- End .product -->

              </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
              <?php }?>
          </div><!-- End .row -->
      </div><!-- End .products -->
  </div><!-- End .container -->