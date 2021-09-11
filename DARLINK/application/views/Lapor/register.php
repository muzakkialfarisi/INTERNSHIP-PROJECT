<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script type="text/javascript" src="jquery.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="icon" href="<?= base_url(); ?>/images/logoG.png" type="image/ico">
        <title><?php echo $judul ?></title>
    </head>
    <body style="background-color:#deddfa">
        <div class="container justify-content-center pt-4">
            <form action="<?php echo base_url('homepage/c_regist_lapor'); ?>" method="post">
                <div class="text-center">
                    <a href="<?= base_url(); ?>homepage">
                        <img class="mb-4" src="<?= base_url();?>/images/logoG.png"  height="72">
                    </a>
                    <h1 class="h3 mb-3 font-weight-normal">Sign UP</h1>
                </div> 
                <div class="text-center">
                    <?php if (validation_errors() || $this->session->flashdata('result')) { ?>
                        <div class="alert alert-error">
                            <strong style="color:red">Warning!</strong><br>
                            <?php echo validation_errors(); ?>
                            <?php echo $this->session->flashdata('result'); ?>
                        </div>
                    <?php } ?>
                </div>                  
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-5">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" required="">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" required="">
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3">
                        <label>Password</label>
                        <div class="input-group" id="show_hide_password">
                            <input class="form-control" type="password" name="password" id="password" required="">
                            <div class="input-group-addon">
                                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3">   
                        <label>Confirm Password</label>
                        <div class="input-group" id="show_hide_password">
                            <input class="form-control" type="password" name="confirm_password" id="confirm_password" required="">
                            <div class="input-group-addon">
                                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <div id='message'></div>
                    </div> 
                </div>                   
                <div class="row justify-content-center">
                    <div class="col-8 text-right">
                        <button type="submit" class="btn btn-success btn float-right ml-3">Save</button>
                        <a class="nav-link font-italic " href="<?= base_url(); ?>homepage">HomePage</a>
                    </div>
                </div>
            </form>
        </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password input').attr("type") == "text"){
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass( "fa-eye-slash" );
                $('#show_hide_password i').removeClass( "fa-eye" );
            }else if($('#show_hide_password input').attr("type") == "password"){
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass( "fa-eye-slash" );
                $('#show_hide_password i').addClass( "fa-eye" );
            }
        });
    });
    $('#password, #confirm_password').on('keyup', function () {
    if ($('#password').val() == $('#confirm_password').val()) {
        $('#message').html('Matching').css('color', 'green');
    } else 
        $('#message').html('Not Matching').css('color', 'red');
    });
    </script>
  </body>
</html>