<div class="intro-slider-container mb-5">
    <?php
    if(session()->has('alert')){
        $alert = session('alert');
        echo "<script>alert('$alert');</script>";
        session()->remove('alert');
    }
    ?>
    <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl" data-owl-options='{
                        "dots": true,
                        "nav": false, 
                        "responsive": {
                            "1200": {
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
        <div class="intro-slide"
            style="background-image: url(<?= base_url() ?>assets/images/demos/demo-4/slider/slide-2.png);">
            <div class="container intro-content">
                <div class="row justify-content-end">
                    <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                        <h3 class="intro-subtitle text-third">Deals and Promotions</h3><!-- End .h3 intro-subtitle -->
                        <h1 class="intro-title">Beats by</h1>
                        <h1 class="intro-title">Dre Studio 3</h1><!-- End .intro-title -->

                        <div class="intro-price">
                            <sup class="intro-old-price">PHP3499.95</sup>
                            <span class="text-third">
                                PHP2799<sup>.99</sup>
                            </span>
                        </div><!-- End .intro-price -->

                        <a href="#all_products" class="btn btn-primary btn-round">
                            <span>Shop More</span>
                            <i class="icon-long-arrow-right"></i>
                        </a>
                    </div><!-- End .col-lg-11 offset-lg-1 -->
                </div><!-- End .row -->
            </div><!-- End .intro-content -->
        </div><!-- End .intro-slide -->

        <div class="intro-slide"
            style="background-image: url(<?= base_url() ?>assets/images/demos/demo-4/slider/slide-1.png);">
            <div class="container intro-content">
                <div class="row justify-content-end">
                    <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                        <h3 class="intro-subtitle text-primary">New Arrival</h3><!-- End .h3 intro-subtitle -->
                        <h1 class="intro-title">Apple iPad Pro <br>12.9 Inch, 64GB </h1><!-- End .intro-title -->

                        <div class="intro-price">
                            <sup>Today:</sup>
                            <span class="text-primary">
                                PHP23,999<sup>.99</sup>
                            </span>
                        </div><!-- End .intro-price -->

                        <a href="#all_products" class="btn btn-primary btn-round">
                            <span>Shop More</span>
                            <i class="icon-long-arrow-right"></i>
                        </a>
                    </div><!-- End .col-md-6 offset-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .intro-content -->
        </div><!-- End .intro-slide -->
    </div><!-- End .intro-slider owl-carousel owl-simple -->

    <span class="slider-loader"></span><!-- End .slider-loader -->
</div><!-- End .intro-slider-container -->