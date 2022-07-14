<?= $this->extend('\App\Views\guest\auth\template\layout'); ?>

<?= $this->section('content');  ?>

<div class="container-scroller d-flex">
    <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
        <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
            <div class="row flex-grow">
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="auth-form-transparent text-left p-2">
                        <div class="brand-logo">
                            <a href="<?= base_url(); ?>">
                                <h1 class="text-primary">
                                    Home
                                </h1>
                            </a>
                        </div>

                        <!-- form login -->
                        <form action="<?= base_url('login/process'); ?>" method="POST">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                        <span class="input-group-text bg-transparent border-right-0">
                                            <i class="mdi mdi-account-outline text-primary"></i>
                                        </span>
                                    </div>
                                    <input type="email" class="form-control form-control-lg border-left-0" id="email"
                                        name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                        <span class="input-group-text bg-transparent border-right-0">
                                            <i class="mdi mdi-lock-outline text-primary"></i>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg border-left-0"
                                        id="password" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="my-3">
                                <button type="submit"
                                    class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Login</button>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                                Belum punya akun? <a href="<?= base_url('register'); ?>" class="text-primary">Daftar</a>
                            </div>
                        </form>
                        <!-- end form login -->

                    </div>
                </div>

                <!-- footer -->
                <div class="col-lg-6 login-half-bg d-none d-lg-flex flex-row"
                    style="background-image: url('<?= base_url('/guests/images/bg_1.jpg'); ?>');">
                </div>
                <!-- end footer-->

            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

<?= $this->endSection(); ?>
