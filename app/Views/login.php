<?= $this->include('inc/head')?>

<body class="d-flex justify-content-center align-items-center" style="background-color: #F4F7FF">
    <div class="container">
        <?php echo session()->get('isLoggedin');?>
        <div class="form-box">
            <div class="form-tab">
                <ul class="nav nav-pills nav-fill" role="tablist">
                    <li class="nav-item ">
                        <a class="nav-link active" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab"
                            aria-controls="signin-2" aria-selected="false">Sign In</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
                        <?php if(session()->getFlashdata('msg')) {?>
                        <div class="alert alert-warning">
                            <?=session()->getFlashdata('msg')?>
                        </div>
                        <?php } ?>
                        <form action="/login" method="post">
                            <div class="form-group">
                                <label for="singin-email-2">Username *</label>
                                <input type="text" class="form-control" id="singin-email-2" name="username" required>
                            </div><!-- End .form-group -->

                            <div class="form-group">
                                <label for="singin-password-2">Password *</label>
                                <input type="password" class="form-control" id="singin-password-2" name="password"
                                    required>
                            </div><!-- End .form-group -->

                            <div class="form-footer">
                                <button type="submit" class="btn btn-outline-primary-2">
                                    <span>LOG IN</span>
                                </button>
                                <a href="signup_form" class="text-decoration-none">SIGN UP</a>
                            </div><!-- End .form-footer -->
                        </form>
                    </div><!-- .End .tab-pane -->

                </div><!-- End .tab-content -->
            </div><!-- End .form-tab -->
        </div><!-- End .form-box -->
    </div><!-- End .container -->
</body>