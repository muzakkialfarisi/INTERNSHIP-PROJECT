<div class="container-fluid">
    <nav class="navbar navbar-expand my-3">
        <a class="btn btn-sm <?php if($status=='pending'){echo 'btn-warning';};?> mr-2" href="<?= site_url('checker/index')?>">Pending</a>
        <a class="btn btn-sm btn-outline-secondary mr-2" href="<?= site_url('checker/rejected')?>">Rejected</a>
        <a class="btn btn-sm btn-outline-success mr-2" href="<?= site_url('checker/approved')?>">Approved</a>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav mr-auto">
            </ul>
            <div class="form-inline">
                <form method="post">
                    <!-- <input type="text" class="form-control form-control-sm" name="" placeholder="keyword-2"> -->
                    <input type="text" class="form-control form-control-sm" name="searchKeyword" placeholder="Tanggal" value="<?php echo $searchKeyword; ?>" id="datepicker">
                    <button type="submit" class="btn btn-primary fas fa-search" name="submitSearch" value="Search"></button>
                    <button type="submit" class="btn btn-secondary fas fa-redo" name="submitSearchReset" value="Search"></button>
                </form>
            </div>
        </div>
    </nav>
    <hr class="my-0">
    <nav class="navbar navbar-expand">
        <ul class="nav navbar-nav mr-auto">
        </ul>
        <form class="form-inline">
            <input class="form-control form-control-sm" type="search " placeholder="Search ..." id="myInput">
        </form>
    </nav>
    <?php if ($this->session->flashdata('success')):?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?= $this->session->flashdata('success'); ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
    
    <?php if ($this->session->flashdata('failed')):?>
    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
        <strong><?= $this->session->flashdata('failed'); ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
        <!-- Data list table --> 
    <table class="table table-sm table-striped text-center" style="font-size:14px">
        <thead class="text-dark" style="background-color:#deddfa">
            <tr>
                <th>Tanggal</th>
                <th>Merek</th>
                <th>Implementator</th>
                <th>Keterangan</th>
                <th>Maker</th>
                <th>Checker</th>
                <th>Signer</th>
            </tr>
        </thead> 
        <tbody id="myTable">
            <?php if(!empty($checker)){ foreach($checker as $row){ ?>
            <tr>
                <td style="vertical-align: middle;"><?php echo $row['date']; ?></td>
                <td style="vertical-align: middle;"><?php echo $row['merek']; ?></td>
                <td style="vertical-align: middle;"><?php echo "<div class='row'><div class='col text-right'>BRI IT</div><div class='col text-left'>: ".$row['briit']."</div></div>"; echo "<div class='row'><div class='col text-right'>Visionet</div><div class='col text-left'>: ".$row['visionet']."</div></div>"; echo "<div class='row'><div class='col text-right'>Indopay</div><div class='col text-left'>: ".$row['indopay']."</div></div>";?></td>
                <td style="vertical-align: middle;"><?php echo $row['keterangan']; ?></td>
                <td style="vertical-align: middle;"><?php echo $row['maker']; ?></td>
                <td style="vertical-align: middle;">
                    <?php if (($row['checker'] == '') || ($row['status2'] == 0 && $row['status1'] == 1)){ ?>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle btn-sm text-warning" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                PENDING
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <a class="dropdown-item" href="<?php $key = 1; echo site_url('checker/follup_checker/'.$row['id'].'/'.$key);?>">Approve</a>
                                <a class="dropdown-item" href="<?php $key = 0; echo site_url('checker/follup_checker/'.$row['id'].'/'.$key);?>">Reject</a>
                            </div>
                        </div>
                    <?php
                    }else{
                        if($row['status2'] == 0){
                            echo "<div class='text-secondary font-weight-bold'>REJECTED</div>";
                        }elseif($row['status2'] == 1){
                            echo "<div class='text-success font-weight-bold'>APPROVED</div>";
                        }echo $row['date2'];
                    }
                    ?>
                </td>
                <td style="vertical-align: middle;"><?php 
                    if(($row['signer'] == '') || ($row['status2'] == 1 && $row['status3'] == 0) || ($row['status1'] == 1 && $row['status3'] == 0)){
                        echo "<div class='text-warning font-weight-bold'>PENDING</div>";
                    }else{
                        if($row['status3'] == 0){
                            echo "<div class='text-secondary font-weight-bold'>REJECTED</div>";
                        }elseif($row['status3'] == 1){
                            echo "<div class='text-success font-weight-bold'>APPROVED</div>";
                        }
                    echo $row['date3'];
                    }
                    ?>
                </td>
            </tr>
            <?php } }else{ ?>
            <tr class="text-center"><td colspan="9">Data tidak ditemukan</td></tr>
            <?php } ?>
        </tbody>
    </table>
    
        <!-- Display pagination links -->
    <div class="row">
        <div class="col">
        <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>