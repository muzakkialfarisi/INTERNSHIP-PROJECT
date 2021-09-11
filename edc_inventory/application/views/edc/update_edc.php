<div class="container">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <?php if ($this->session->flashdata('error')) : ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              Serial Number <strong><?= $this->session->flashdata('error'); ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
        <?php endif; ?>
        <?php foreach($edc as $data){?>
        <form action="<?= site_url('edc/update_edc_process/'.$data['sn'])?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Update <?=$data['sn']?></h5>
            </div>
            <div class="modal-body" style="font-size:14px">                    
                <div class="form-row">
                    <div class="form-group col-md">
                        <label>Serial Number</label>
                        <input type="text" class="form-control form-control-sm text-uppercase" name="sn" value="<?=$data['sn']?>" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md">
                        <label>MID</label>
                        <input type="text" class="form-control form-control-sm text-uppercase" name="mid" value="<?=$data['mid']?>" id="mid_check" maxlength="12">
                        <div id="message_mid"></div>
                    </div>
                    <div class="form-group col-md">
                        <label>TID</label>
                        <input type="text" class="form-control form-control-sm text-uppercase" name="tid" value="<?=$data['tid']?>" id="tid_check" maxlength="8">
                        <div id="message_tid"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md">
                        <label>Status</label>
                        <select class="form-control form-control-sm text-capitalize" name="status" required="">
                            <option value="<?=$data['status']?>"><?=$data['status']?></option>
                            <option value="available">Available</option>
                            <option value="delivery">Delivery</option>
                            <option value="rusak">Rusak</option>
                            <option value="terpasang">Terpasang</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md">
                        <label>Peruntukan</label>
                        <select class="form-control form-control-sm text-capitalize" name="peruntukan" required="">
                            <option value="<?=$data['peruntukan']?>"><?=$data['peruntukan']?></option>
                            <option value="Merchant">Merchant</option>
                            <option value="Brilink">Brilink</option>
                            <option value="UKER">UKER</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md">
                        <label>Posisi Kanwil</label>
                        <select class="form-control form-control-sm" name="posisi_kanwil" required="" id="posisi_kanwil">
                            <?php
                            $key = $data['posisi_kanwil'];
                            $sql="SELECT * from uker where kode_kanwil = '$key' group by nama_kanwil ";
                            $query = $this->db->query($sql);
                            if ($query->num_rows() > 0) {
                            foreach ($query->result() as $row) {?>
                                <option value="<?= $row->kode_kanwil;?>"><?= $row->nama_kanwil;?></option>
                            <?php }
                            }
                            $sql1="SELECT * from uker where kode_kanwil != '$key' group by nama_kanwil ";
                            $query = $this->db->query($sql1);
                            if ($query->num_rows() > 0) {
                            foreach ($query->result() as $row) {?>
                                <option value="<?= $row->kode_kanwil;?>"><?= $row->nama_kanwil;?></option>
                            <?php }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md">
                        <label>Posisi Kanwil</label>
                        <select class="form-control form-control-sm" name="posisi_uker" required="" id="posisi_uker"> 
                        <?php
                            $key = $data['posisi_uker'];
                            $sql="SELECT * from uker where kode_branch = '$key' group by nama_uker";
                            $query = $this->db->query($sql);
                            if ($query->num_rows() > 0) {
                            foreach ($query->result() as $row) {?>
                                <option value="<?= $row->kode_branch;?>"><?= $row->nama_uker;?></option>
                            <?php }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md">
                        <label>Merk</label>
                        <select class="form-control form-control-sm " name="merk" required="">
                            <option value="<?=$data['merk']?>"><?=$data['merk']?></option>
                            <option value="Ingenico 5100">Ingenico 5100</option>
                            <option value="Ingenico EFT930G">Ingenico EFT930G</option>
                            <option value="Ingenico iCT220">Ingenico iCT220</option>
                            <option value="Ingenico IWL220">Ingenico IWL220</option>
                            <option value="Mesin EDC SMK Offline">Mesin EDC SMK Offline</option>
                            <option value="Move 2500">Move 2500</option>
                            <option value="MPOS+ EDC Android">MPOS+ EDC Android</option>
                            <option value="Nexgo G3">Nexgo G3</option>
                            <option value="PAX 210">PAX 210</option>
                            <option value="PAX S900">PAX S900</option>
                            <option value="Verifone C680">Verifone C680</option>
                            <option value="Verifone VX 675">Verifone VX 675</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-1">
                        <label>Tipe</label>
                    </div>
                    <div class="form-group col-md text-center">
                    <input class="form-check-input" type="checkbox" name="gprs" value="1" <?php if($data['gprs']==true){echo 'checked';}?>>
                    <label class="form-check-label">
                        GPRS
                    </label>
                    </div>
                    <div class="form-group col-md text-center">
                    <input class="form-check-input" type="checkbox" name="lan" value="1" <?php if($data['lan']==true){echo 'checked';}?> >
                    <label class="form-check-label">
                        LAN
                    </label>
                    </div>
                    <div class="form-group col-md text-center">
                    <input class="form-check-input" type="checkbox" name="dialup" value="1" <?php if($data['dialup']==true){echo 'checked';}?>>
                    <label class="form-check-label">
                        Dial-Up
                    </label>
                    </div>
                    <div class="form-group col-md text-center">
                    <input class="form-check-input" type="checkbox" name="contactless" value="1" <?php if($data['contactless']==true){echo 'checked';}?>>
                    <label class="form-check-label">
                        Contactless
                    </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-secondary btn-sm text-light" href="<?= site_url('edc/index')?>">Back</a>
                <button type="submit" class="btn btn-success btn-sm">Save</button>
            </div>
        </form>
        <?php }?>
        </div>
    </div>
</div>