<div class="container-fluid">
    <!-- <hr class="my-0"> -->
    <nav class="navbar navbar-expand my-3">
        <a class="btn btn-sm <?php if($status=='pending'){echo 'btn-warning';};?> mr-2" href="<?= site_url('maker/index')?>">Pending</a>
        <a class="btn btn-sm btn-outline-secondary mr-2" href="<?= site_url('maker/rejected')?>">Rejected</a>
        <a class="btn btn-sm btn-outline-success mr-2" href="<?= site_url('maker/approved')?>">Approved</a>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav mr-auto">
            </ul>
            <div class="form-inline">
                <form method="post">
                    <input type="text" class="form-control form-control-sm" name="searchKeyword" placeholder="Tanggal" id="datepicker" value="<?php echo $searchKeyword; ?>">
                    <button type="submit" class="btn btn-primary fas fa-search" name="submitSearch" value="Search"></button>
                    <button type="submit" class="btn btn-secondary fas fa-redo" name="submitSearchReset" value="Search"></button>
                </form>
            </div>
        </div>
    </nav>
    <hr class="my-0">
    <nav class="navbar navbar-expand">
    <a class="btn btn-sm btn-success text-light" href="<?= site_url('maker/v_input_laporan');?>">Buat Laporan</a>
        <ul class="nav navbar-nav mr-auto">
        </ul>
        <form class="form-inline">
            <input class="form-control form-control-sm" type="search " placeholder="Search ..." id="myInput">
        </form>
    </nav>
    <?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?= $this->session->flashdata('success'); ?></strong>
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
                <th>Aksi</th>
            </tr>
        </thead> 
        <tbody id="myTable">
            <?php if(!empty($maker)){ foreach($maker as $row){ ?>
            <tr>
                <td style="vertical-align: middle;"><?php echo $row['date']; ?></td>
                <td style="vertical-align: middle;"><?php echo $row['merek']; ?></td>
                <td style="vertical-align: middle;"><?php echo "<div class='row'><div class='col text-right'>BRI IT</div><div class='col text-left'>: ".$row['briit']."</div></div>"; echo "<div class='row'><div class='col text-right'>Visionet</div><div class='col text-left'>: ".$row['visionet']."</div></div>"; echo "<div class='row'><div class='col text-right'>Indopay</div><div class='col text-left'>: ".$row['indopay']."</div></div>";?></td>
                <td style="vertical-align: middle;"><?php echo $row['keterangan']; ?></td>
                <td style="vertical-align: middle;"><?php echo $row['maker']; ?></td>
                <td style="vertical-align: middle;">
                    <?php
                        if($row['status1'] == 1 && $row['status2'] == 0){
                            echo "<div class='text-warning font-weight-bold'>PENDING</div>";
                        }else{
                            if($row['status2'] == 0){
                                echo "<div class='text-secondary font-weight-bold'>REJECTED</div>";
                            }elseif($row['status2'] == 1){
                                echo "<div class='text-success font-weight-bold'>APPROVED</div>";
                            }
                            echo $row['date2'];
                        }
                    
                    ?>
                </td>
                <td style="vertical-align: middle;">
                    <?php 
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
                <td style="vertical-align: middle;">
                    <a class="btn btn-sm btn-outline-info far fa-edit <?php if($row['status2']==1 || $row['maker']<>$this->session->userdata("username")){echo "disabled";}?>" href="<?= site_url('maker/v_update_laporan/'.$row['id'])?>"></a>
                    <a class="btn btn-outline-danger btn-sm text-dark far fa-trash-alt <?php if($row['status2']==1 || $row['maker']<>$this->session->userdata("username")){echo "disabled";}?>" data-toggle="modal" data-target="#delete-<?=$row['id']?>" ></a>
                    <?php if($row['status1'] == 0  && $row['status2'] == 0 && $row['status3'] == 0) { ?>
                        <div class="py-1"></div>
                        <a class="btn btn-success btn-sm text-light" data-toggle="modal" data-target="#ajul-<?=$row['id']?>">Ajukan Ulang</a>
                    <?php } ?>
                    <div class="modal fade" id="delete-<?=$row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="exampleModalCenterTitle">Delete</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?=$row['merek']?> / <?=$row['date']?>
                                    <br>Apakah anda yakin?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                    <a type="button" class="btn btn-danger btn-sm" href="<?= site_url('maker/delete_process/'.$row['id'])?>">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div><div class="modal fade" id="ajul-<?=$row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="exampleModalCenterTitle">Ajukan Ulang</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?=$row['merek']?> / <?=$row['date']?>
                                    <br>Apakah anda yakin?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                    <a type="button" class="btn btn-success btn-sm" href="<?= site_url('maker/ajukan_ulang/'.$row['id'])?>">Ajukan Ulang</a>
                                </div>
                            </div>
                        </div>
                    </div>
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