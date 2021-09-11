<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="icon" href="<?= base_url(); ?>/images/logoG.png" type="image/ico">
        <title><?php echo $judul ?></title>
    </head>
    <body style="background-color:#deddfa">
    
        <div class="container-sm d-flex justify-content-center pt-4">
            <div style="width: 350px;" class="center">
                
              
                <form action="<?php echo base_url('homepage/c_login_admin'); ?>" method="post">
                    <div class="text-center">
                        <a href="<?= base_url(); ?>homepage">
                            <img class="mb-4" src="<?= base_url();?>/images/logoG.png"  height="72">
                        </a>
                        <h1 class="h3 mb-3 font-weight-normal">Login for Admin</h1>
                    </div>
                    <div class="text-center">
                        <?php if (validation_errors() || $this->session->flashdata('result_login')) { ?>
                            <div class="alert alert-error">
                                <strong style="color:red">Warning!</strong><br>
                                <?php echo validation_errors(); ?>
                                <?php echo $this->session->flashdata('result_login'); ?>
                            </div>    
                        <?php } ?>
                    </div>
                    <div class="form-label-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" required="" name="username">
                    </div>
                    <div class="form-label-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" required="" name="password">
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                </form>

                <div class="text-center pt-4">
                    <a class="nav-link font-italic" href="<?= base_url(); ?>homepage" style="color:blue">back to home page</a>
                </div>
            </div>
        </div>
        
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>