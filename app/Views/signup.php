<?= $this->include('inc/head')?>

<body class="d-flex justify-content-center align-items-center" style="background-color: #F4F7FF">
    <div class="container">
        <div class="form-box">
            <div class="form-tab">
                <ul class="nav nav-pills nav-fill" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link active" id="register-tab-2" data-toggle="tab" href="#register-2" role="tab"
                            aria-controls="register-2" aria-selected="true">Register</a>
                    </li>
                </ul>
                <div class="tab-content">

                    <div class="tab-pane fade show active" id="register-2" role="tabpanel"
                        aria-labelledby="register-tab-2">
                        <?php if(isset($validation)){?>
                        <div class="alert alert-warning">
                            <?=$validation->listErrors()?>
                        </div>
                        <?php } ?>
                        <form action="/signup" method="post">
                            <div class="form-group">
                                <label for="register-email-2">Username *</label>
                                <input type="text" class="form-control" id="register-email-2" name="username" required>
                            </div><!-- End .form-group -->

                            <div class="form-group">
                                <label for="register-password-2">Password *</label>
                                <input type="password" class="form-control" id="register-password-2" name="password"
                                    required>
                            </div><!-- End .form-group -->

                            <div class="form-group">
                                <label for="register-password-2">Confirm Password *</label>
                                <input type="password" class="form-control" id="register-password-2"
                                    name="confirm_password" required>
                            </div><!-- End .form-group -->

                            <div class="form-footer">
                                <button type="submit" class="btn btn-outline-primary-2">
                                    <span>SIGN UP</span>
                                </button>
                                <a href="login_form" class="text-decoration-none">LOG IN</a>
                            </div><!-- End .form-footer -->
                        </form>
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .form-tab -->
        </div><!-- End .form-box -->
    </div><!-- End .container -->
    <?= $this->include('inc/script');?>
</body>