<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->
        <!-- icon -->

         <!-- jquery -->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        
        <!-- lokal -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/bootstrap/css/bootstrap.min.css">
        <script type="text/javascript" src="<?php echo base_url()?>/assets/bootstrap/js/bootstrap.min.js" ></script>

        
        <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>

        <title><?php echo $judul ?></title>
        <link rel="icon" href="<?= base_url(); ?>/images/logo.png" type="image/ico">
    </head>
    <body >
        <nav class="navbar navbar-expand navbar-dark" style="background-color:#04549c">
            <a class="navbar-brand" href="<?php if($this->session->userdata("tier")=="maker"){echo site_url('maker');}elseif($this->session->userdata("tier")=="signer"){echo site_url('signer');}elseif($this->session->userdata("tier")=="checker"){echo site_url('checker');}else{echo site_url('edc');}?>" >
                <img src="<?= base_url();?>/images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                EDC-i
            </a>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item dropdown <?php if($judul=='dashboard' || $judul=='rekap'){echo $active_tab;}?> ">
                        <a class="nav-link dropdown-toggle" aria-haspopup="true" aria-expanded="false" role="button" data-toggle="dropdown" ><span class="fas fa-home pr-2"></span>Dashboard</a>
                            <div class="dropdown-menu">
                                <?php $year = date("Y");
                                if($this->session->userdata("tier")=="admin"){
                                    echo "<a class='dropdown-item' href='".site_url('edc')."' >Data EDC</a>";
                                    echo "<a class='dropdown-item' href='".site_url('uker')."'>Data UKER</a>";
                                }else {
                                    if($this->session->userdata("tier")=="maker"){
                                        echo "<a class='dropdown-item' href='".site_url('maker')."' >Report</a>";
                                    }elseif($this->session->userdata("tier")=="checker"){
                                        echo "<a class='dropdown-item' href='".site_url('checker')."' >Report</a>";
                                    }else{
                                        echo "<a class='dropdown-item' href='".site_url('signer')."' >Report</a>";
                                    }
                                    echo "<a class='dropdown-item' href='".site_url('maker/v_rekap/'.$year)."' >Rekap</a>";
                                }
                                ?>
                                
                            </div>
                    </li>
                    <?php if($this->session->userdata("tier")=="admin"){ ?>
                    <li class="nav-item <?php if($judul=='users'){echo $active_tab;}?>">
                        <a class="nav-link" href="<?= site_url('admin/v_users'); ?>"><span class="fas fa-universal-access pr-2"></span>Access</a>
                    </li>
                    <?php } ?>
                </ul>
                <div class="form-inline">
                    <ul class="nav navbar-nav">
                        <li class="nav-item <?php if($judul=='profile'){echo $active_tab;}?> ">
                            <a class="nav-link text-capitalize" href="<?= site_url('admin/profile/'.$this->session->userdata("username")) ?>"><?php echo $this->session->userdata("username"); ?> <i class="fas fa-unlock-alt"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('admin/logout_process'); ?>">Logout <i class="fas fa-sign-out-alt"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>