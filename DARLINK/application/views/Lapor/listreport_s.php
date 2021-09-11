<div class="container-fluid my-3">
    <a class="btn border border-dark bg-light text-dark mr-2" href="<?= base_url(); ?>lapor/listlapor_service">Service</a>
    <a class="btn border border-dark bg-light text-dark mr-2" href="<?= base_url(); ?>lapor/listlapor_co">Feed/Dist</a>
    <div name="alert" class="mt-3">
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data <strong>berhasil</strong> <?= $this->session->flashdata('success'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
    </div>
    <nav class="navbar">
        <a class="navbar-brand"></a>
        <form action="<?php echo base_url("lapor/search_report_s"); ?>" method="post">
            <div class="form-row">
                <div class="form-group col">
                    <select class="form-control form-control-sm" name="status">
                        <option value="">Status...</option>
                        <option value="0">Wait</option>
                        <option value="2">Decline</option>
                        <option value="1">Done</option>
                    </select>
                </div>
                <div class="form-group col">
                    <input type="text" class="form-control form-control-sm" name="pelapor" placeholder="Pelapor">
                </div>
                <div class="form-group col">
                    <input type="text" class="form-control form-control-sm" name="tanggal" placeholder="Tanggal" id="datepicker">
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary fas fa-search"></button>
                </div>
            </div>
        </form>
    </nav>
    <table class="table table-striped table-sm text-center" style="font-size:13px">
        <thead class="text-light" style="background-color:#84142d">
            <tr >
                <td scope="col">Status</td>
                <td scope="col">Tipe Report</td>
                <td scope="col">No.Service</td>
                <td scope="col">No.Internet</td>
                <td scope="col">Nama ODP</td>
                <td scope="col">Port ODP</td>
                <td scope="col">QR ODP</td>
                <td scope="col">QR Dropcore</td>
                <td scope="col">Nama OLT</td>
                <td scope="col">Slot/Port OLT</td>
                <td scope="col">SN ONT</td>
                <td scope="col">Pelapor</td>
                <td scope="col">Tanggal</td>
                <td scope="col">Aksi</td>
            </tr>
        </thead>
        <tbody id="myTable">
        <?php 
            // $i = 0;
            foreach($dataReport as $data){
            // $i = $i + 1;
        ?>
            <tr>
            <td>
                <?php 
                    if ($data['status'] == 1){
                        echo "<div class='bg-success' style='font-size:13px'>Done</div>";                        
                    }else if ($data['status'] == 0){
                        echo "<div class='bg-warning' style='font-size:13px'>Waiting</div>";
                    }else{
                        echo "<div class='bg-secondary text-light' style='font-size:13px'>Decline</div>";
                    }
                ?>
            </td>
            <td><?= $data['jenis'];?></td>
            <td><?= $data['numbservice'];?></td>
            <td><?= $data['numbservice2'];?></td>
            <td><?= $data['namaodp'];?></td>
            <td><?= $data['portodp'];?></td>
            <td><?= $data['qrodp'];?></td>
            <td><?= $data['qrdropcore'];?></td>
            <td><?= $data['hostnamegpon'];?></td>
            <td><?= $data['slotgpon'];?> / <?= $data['portgpon'];?></td>
            <td><?= $data['sn'];?></td>
            <td><?= $data['pelapor'];?></td>
            <td> <?php echo date("d-m-y", strtotime($data['tanggal']));?></td>
            <td>
                <a class="btn btn-sm btn-info text-light far fa-edit" data-toggle="modal" data-target="#update-<?= $data['id'];?>-<?php if($data['status']<>1){echo 0;};?>-<?php if($this->session->userdata("username")==$data['pelapor']){echo $kunci="cocok";}else{echo $kunci="tidak";}; ?>"></a>
                    <div class="modal fade bd-example-modal-lg" id="update-<?= $data['id'];?>-0-cocok" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <form action="<?php $key=$data['id']; echo base_url("lapor/updateReport_s/$key"); ?>" method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle"><?= $data['jenis'];?>, <?= $data['pelapor'];?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">  
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Tipe Laporan</label>
                                            <select class="custom-select" name="jenis" required>
                                                <option value="<?= $data['jenis'];?>"><?= $data['jenis'];?></option>
                                                <option value="Omset Service ODP">Omset Service ODP</option>
                                                <option value="Normalisasi">Normalisasi</option>
                                                <option value="Provisioning">Provisioning</option>
                                                <option value="Migrasi">Migrasi</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Internet Number</label>
                                            <input type="text" class="form-control" name="numbservice" value="<?= $data['numbservice'];?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Service Number</label>
                                            <input type="text" class="form-control" value="<?= $data['numbservice2'];?>" name="numbservice2">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-5">
                                            <label>Nama ODP</label>
                                            <input type="text" class="form-control" value="<?= $data['namaodp'];?>" name="namaodp">
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label>QR ODP</label>
                                            <input type="text" class="form-control" value="<?= $data['qrodp'];?>" name="qrodp">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Port ODP</label>
                                            <input type="text" class="form-control" value="<?= $data['portodp'];?>" name="portodp">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>QR Dropcore</label>
                                            <input type="text" class="form-control" value="<?= $data['qrdropcore'];?>" name="qrdropcore">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Nama OLT</label>
                                            <input type="text" class="form-control" value="<?= $data['hostnamegpon'];?>" name="hostnamegpon">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Slot OLT</label>
                                            <input type="text" class="form-control" value="<?= $data['slotgpon'];?>" name="slotgpon">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Port OLT</label>
                                            <input type="text" class="form-control" value="<?= $data['portgpon'];?>" name="portgpon">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label>SN ONT</label>
                                            <input type="text" class="form-control" value="<?= $data['sn'];?>" name="sn">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Nama Pelapor</label>
                                            <input type="text" class="form-control" placeholder="<?php echo $this->session->userdata("username"); ?>" value="<?php echo $this->session->userdata("username");  ?>" name="pelapor" disabled>
                                        </div>
                                    </div>
                                </div>                      
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                <!-- <a class='btn btn-sm btn-danger text-light far fa-trash-alt'></a> -->
                <a class="btn btn-danger btn-sm text-light far fa-trash-alt" data-toggle="modal" data-target="#delete-<?= $data['id'];?>-<?php if($data['status']<>1){echo 0;};?>-<?php if($this->session->userdata("username")==$data['pelapor']){echo $kunci="cocok";}else{echo $kunci="tidak";}; ?>"></a>
                <div class="modal fade" id="delete-<?= $data['id'];?>-0-cocok" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle"><?= $data['jenis'];?>, <?= $data['pelapor'];?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                <a type="button" class="btn btn-danger btn-sm" href="<?= base_url(); ?>lapor/deleteReport_s/<?= $data['id'];?>">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            </tr>
        <?php }?>
        </tbody>	
    </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>