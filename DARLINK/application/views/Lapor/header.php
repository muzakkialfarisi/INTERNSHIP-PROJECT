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
        <nav class="navbar navbar-expand navbar-dark" style="background-color:#84142d">
            <a class="navbar-brand" href="">
                <img src="<?= base_url();?>/images/logoG.png" width="30" height="30" class="d-inline-block align-top" alt="">
                Darlink
            </a>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url(); ?>lapor"><span class="fas fa-info-circle pr-2"></span>Report</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url(); ?>lapor/listlapor_service"><span class="	fas fa-bookmark pr-2"></span>Data Report</a>
                    </li>  
                </ul>
                <?php ?>
                <div class="form-inline">
                    <a class="nav-item nav-link active" style="color:white" href=""><i class="fas fa-user"></i> <?php echo $this->session->userdata("username"); ?></a>
                    <a class="nav-item nav-link active " style="color:white" href="<?= base_url(); ?>homepage/c_logout_lapor">Sign out  <i class="fas fa-sign-out-alt"></i></a>
                </div>
            </div>
        </nav>