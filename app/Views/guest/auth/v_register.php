<?= $this->extend('\App\Views\guest\auth\template\layout'); ?>

<?= $this->section('content');  ?>

<div class="container-scroller d-flex">
    <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
        <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
            <div class="row flex-grow">
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="auth-form-transparent text-left p-3">
                        <div class="brand-logo">
                            <a href="<?= base_url(); ?>">
                                <h1 class="text-primary">
                                    Home
                                </h1>
                            </a>
                        </div>

                        <!-- error -->
                        <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-danger" role="alert">
                            </hr />
                            <?php echo session()->getFlashdata('error'); ?>
                        </div>
                        <?php endif; ?>
                        <!-- end error -->

                        <!-- form register -->
                        <form action="<?= base_url('register/process'); ?>" method="POST">
                            <div class="form-group">
                                <label>Nama Depan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                        <span class="input-group-text bg-transparent border-right-0">
                                            <i class="mdi mdi-account-outline text-primary"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg border-left-0" id="fname"
                                        name="fname" placeholder="John">

                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Belakang</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                        <span class="input-group-text bg-transparent border-right-0">
                                            <i class="mdi mdi-account-outline text-primary"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg border-left-0" id="lname"
                                        name="lname" placeholder="Doe">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                        <span class="input-group-text bg-transparent border-right-0">
                                            <i class="mdi mdi-email-outline text-primary"></i>
                                        </span>
                                    </div>
                                    <input type="email" class="form-control form-control-lg border-left-0" id="email"
                                        name="email" placeholder="johndoe@mailbox.org">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                        <span class="input-group-text bg-transparent border-right-0">
                                            <i class="mdi mdi-cellphone-android text-primary"></i>
                                        </span>
                                    </div>
                                    <input type="tel" class="form-control form-control-lg border-left-0" id="telephone"
                                        name="telephone" placeholder="085999657432">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
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

                            <!-- static input status -->
                            <input type="text" id="status" name="status" value="1" hidden>
                            <!--  end static input status-->

                            <div class="mt-3">
                                <button type="submit"
                                    class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Register</button>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                                Sudah Punya Akun? <a href="<?= base_url('login'); ?>" class="text-primary">Login</a>
                            </div>
                        </form>
                        <!-- end form register -->

                    </div>
                </div>

                <!-- side background -->
                <div class="col-lg-6 register-half-bg d-none d-lg-flex flex-row"
                    style="background-image: url('<?= base_url(); ?>/guests/images/bg_2.jpg');">
                </div>
                <!-- side background -->

            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

<?= $this->endSection(); ?>