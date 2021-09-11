<div class="container-fluid">
  <nav class="navbar navbar-expand my-3">
    <a class="btn btn-sm btn-success text-light mr-2" href="<?= site_url('edc/v_input_edc')?>" id="form_edit">Create New EDC</a>

      <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav mr-auto">
              <li>
                <a class="btn btn-outline-secondary btn-sm" href="<?= site_url('edc/export_process')?>">Export To (.xls)</a>
              </li>
          </ul>
          <div class="form-inline">
              <form method="post">
                  <!-- <input type="text" class="form-control form-control-sm" name="" placeholder="keyword-2"> -->
                  <input type="text" class="form-control form-control-sm" name="searchKeyword" placeholder="Serial Number" value="<?php echo $searchKeyword; ?>">
                  <button type="submit" class="btn btn-primary fas fa-search" name="submitSearch" value="Search"></button>
                  <button type="submit" class="btn btn-secondary fas fa-redo" name="submitSearchReset" value="Search"></button>
              </form>
          </div>
      </div>
  </nav>

  <?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?= $this->session->flashdata('success'); ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
  <?php endif; ?>

  <table class="table table-sm table-striped text-center" style="font-size:12px;" >
    <thead class="text-dark" style="background-color:#deddfa">
      <tr style="font-weight:bold;">
        <td rowspan="2" style="vertical-align: middle;">Serial Number</td>
        <td rowspan="2" style="vertical-align: middle;">Peruntukan</td>
        <td rowspan="2" style="vertical-align: middle;">MID</td>
        <td rowspan="2" style="vertical-align: middle;">TID</td>
        <td colspan="2">Posisi</td>
        <td rowspan="2" style="vertical-align: middle;">Status</td>
        <td colspan="3">Tipe</td>
        <td rowspan="2" style="vertical-align: middle;">Contact<br>less</td>
        <td rowspan="2" style="vertical-align: middle;">Merk</td>
        <td rowspan="2" style="vertical-align: middle;">Log</td>
        <td rowspan="2" style="vertical-align: middle;">Aksi</td>
      </tr>
      <tr style="font-weight:bold;">
        <td>Kanwil</td>
        <td>UKER</td>
        <td>GPRS</td>
        <td>LAN</td>
        <td>Dial-Up</td>
      </tr>
    </thead>
    <tbody>
    <?php if(!empty($edc)){ foreach($edc as $data){ ?>
      <tr  class="text-capitalize">
        <td class="text-uppercase"><?= $data['sn'];?></td>
        <td><?= $data['peruntukan'];?></td>
        <td  class="text-uppercase"><?= $data['mid'];?></td>
        <td><?= $data['tid'];?></td>
        <td>
        <?php
        $kode = $data['posisi_kanwil'];
        $sql="SELECT nama_kanwil from uker where kode_kanwil = '$kode' group by nama_kanwil";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row){
            echo $row->nama_kanwil;
          }
        }
        ?>
        </td>
        <td>
        <?php 
        $kode = $data['posisi_uker'];
        $sql="SELECT nama_uker from uker where kode_branch = '$kode' group by nama_uker";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row){
            echo $row->nama_uker;
          }
        }
        ?>
        </td>
        <td><?= $data['status'];?></td>
        <td><?php if($data['gprs']==true){echo '<div class="fas fa-check"></div>';}else{echo '-';}?></td>
        <td><?php if($data['lan']==true){echo '<div class="fas fa-check"></div>';}else{echo '-';}?></td>
        <td><?php if($data['dialup']==true){echo '<div class="fas fa-check"></div>';}else{echo '-';}?></td>
        <td><?php if($data['contactless']==true){echo '<div class="fas fa-check"></div>';}else{echo '-';}?></td>
        <td><?= $data['merk'];?></td>
        <!-- <td><a href="<?= site_url('edc/v_log/'.$data['sn'])?>">Log</a></td> -->
        <td>
          <a type="button" class="text-primary" data-toggle="modal" data-target="#log-edc-<?=$data["sn"]?>">Log</a>
            <div class="modal fade" id="log-edc-<?=$data["sn"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"  >
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">LOG <?=$data['sn']?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <table class="table table-sm table-striped text-center" style="font-size:13px; border: 2px solid black" >
                              <thead class="text-dark" style="background-color:#deddfa">
                                  <tr style="font-weight:bold;">
                                      <!-- <td style="vertical-align: middle;">Serial Number</td> -->
                                      <td style="vertical-align: middle;">Last Modified</td>
                                      <td style="vertical-align: middle;">Username</td>
                                      <td style="vertical-align: middle;">Kegiatan</td>
                                      <td style="vertical-align: middle;">Status</td>
                                      <td style="vertical-align: middle;">Keterangan</td>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                  $sn = $data["sn"];
                                  $sql="SELECT * from log where sn = '$sn'";
                                  $query = $this->db->query($sql);
                                  if ($query->num_rows() > 0) {
                                    foreach ($query->result() as $row) 
                                    {?>
                                  <tr>
                                    <td style="vertical-align: middle;"><?php echo $row->waktu;?> </td>
                                    <td style="vertical-align: middle;"><?php echo $row->username;?> </td>
                                    <td style="vertical-align: middle;"><?php echo $row->kegiatan;?> </td>
                                    <td style="vertical-align: middle;"><?php echo $row->status;?> </td>
                                    <td style="text-align: left;">
                                    <?php
                                      $ket = json_decode($row->keterangan, true);
                                      $check = '<div class="fas fa-check"></div>';
                                      echo "<div class='row'><div class='col'>Peruntukan</div><div class='col'>: ".$ket['peruntukan']."</div></div>";
                                      echo "<div class='row'><div class='col'>MID</div><div class='col'>: ".$ket['mid']."</div></div>";
                                      echo "<div class='row'><div class='col'>TID</div><div class='col'>: ".$ket['tid']."</div></div>";
                                      echo "<div class='row'><div class='col'>Kode Kanwil</div><div class='col'>: ".$ket['posisi_kanwil']."</div></div>";
                                      echo "<div class='row'><div class='col'>Kode Branch</div><div class='col'>: ".$ket['posisi_uker']."</div></div>";
                                      if ($ket['gprs'] == '1'){
                                        echo "<div class='row'><div class='col'>GPRS</div><div class='col'>: ".$check."</div></div>";
                                      }else{
                                        echo "<div class='row'><div class='col'>GPRS</div><div class='col'>:</div></div>";
                                      }
                                      if ($ket['lan'] == '1'){
                                        echo "<div class='row'><div class='col'>LAN</div><div class='col'>: ".$check."</div></div>";
                                      }else{
                                        echo "<div class='row'><div class='col'>LAN</div><div class='col'>:</div></div>";
                                      }
                                      if ($ket['dialup'] == '1'){
                                        echo "<div class='row'><div class='col'>DialUp</div><div class='col'>: ".$check."</div></div>";
                                      }else{
                                        echo "<div class='row'><div class='col'>DialUp</div><div class='col'>:</div></div>";
                                      }
                                      if ($ket['contactless'] == '1'){
                                        echo "<div class='row'><div class='col'>Contactless</div><div class='col'>: ".$check."</div></div>";
                                      }else{
                                        echo "<div class='row'><div class='col'>Contactless</div><div class='col'>:</div></div>";
                                      }
                                      echo "<div class='row'><div class='col'>Merk</div><div class='col'>: ".$ket['merk']."</div></div>";
                                    ?>
                                    </td>
                                  </tr>
                                <?php }}?>
                              </tbody>
                          </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </td>
        <td>
          <a class="btn btn-sm btn-outline-info far fa-edit" href="<?= site_url('edc/v_update_edc/'.$data["sn"])?>"></a>
          <a class="btn btn-outline-danger btn-sm text-dark far fa-trash-alt" data-toggle="modal" data-target="#delete-edc-<?=$data["sn"]?>"></a>
            <div class="modal fade" id="delete-edc-<?=$data["sn"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Delete <?=$data['sn']?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah anda yakin?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <a type="button" class="btn btn-danger btn-sm" href="<?= site_url('edc/delete_edc_process/'.$data["sn"])?>">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </td>
      </tr>
      <?php } }else{ ?>
      <tr class="text-center"><td colspan="14">Data tidak ditemukan</td></tr>
      <?php } ?>
    </tbody>
  </table>
    <div class="row">
        <div class="col">
        <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>