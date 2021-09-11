<div class="container-sm d-flex justify-content-center">
    <div class="px-3 py-3 bg-white border border-secondary" style="margin:0; position:absolute; top: 50%; transform: translate(0, -50%);">
        <div style="width: 350px;" class="center">
            <form action="<?php echo base_url('admin/login_process'); ?>" method="post">

                <div class="text-center">
                    <a href="<?= base_url(); ?>homepage">
                        <img class="mb-4" src="<?= base_url();?>/images/logo.png"  height="72">
                    </a>
                    <h1 class="h3 mb-3 font-weight-normal">EDC <br><i>Reporting & Inventory</i></h1>
                </div>
                <div name="alert" class="mt-3 text-center">
                    <?php if ($this->session->flashdata('error')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('error'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('success'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
                

                <div class="form-label-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" required="" name="username">
                </div>

                <div class="from-group mb-3">
                    <div class="input-group" id="show_hide_password">
                        <input type="password" class="form-control" placeholder="Password" required="" name="password" id="password"">
                        <div class="input-group-append">
                            <span class="input-group-text"><a href="" class="fa fa-eye-slash" aria-hidden="true"></a></span>
                        </div>
                    </div>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>
            <a class="dropdown-item text-center font-italic text-primary mt-2" href="<?= site_url('admin/v_signup')?>" style="font-size:14px">Sign up</a>
        </div>
    </div>
</div>