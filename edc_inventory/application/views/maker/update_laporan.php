<div class="container">
  <div class="modal-dialog modal-lg" role="document" >
      <div class="modal-content" >
      <?php foreach($update as $data){?>
      <form action="<?= site_url('maker/update_laporan_process/'.$data['id'])?>" method="post">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Pengajuan Pemasangan EDC Merchant</h5>
          </div>
          <div class="modal-body" style="font-size:14px">                    
            <div class="form-row">
                <div class="form-group col-md">
                    <label>Merk</label>
                    <select class="form-control form-control-sm" name="merek" required="">
                        <option value="<?=$data['merek']?>"><?=$data['merek']?></option>
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
                <div class="form-group col-md">
                    <label>Implementator 1</label>
                    <input type="text" class="form-control form-control-sm" placeholder="BRI IT" disabled>
                </div>
                <div class="form-group col-md">
                    <label>Jumlah</label>
                    <input type="number" class="form-control form-control-sm" name="briit" value="<?=$data['briit']?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md">
                    <label>Implementator 2</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Visionet" disabled>
                </div>
                <div class="form-group col-md">
                    <label>Jumlah</label>
                    <input type="number" class="form-control form-control-sm" name="visionet" value="<?=$data['visionet']?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md">
                    <label>Implementator 3</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Indopay" disabled>
                </div>
                <div class="form-group col-md">
                    <label>Jumlah</label>
                    <input type="number" class="form-control form-control-sm" name="indopay" value="<?=$data['indopay']?>" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md">
                    <label>Keterangan</label>
                    <textarea type="text" class="form-control form-control-sm" name="keterangan" value="<?=$data['keterangan']?>"> </textarea>
                </div>
            </div>
          <div class="modal-footer">
              <a class="btn btn-secondary btn-sm text-light" href="<?= site_url('maker')?>">Back</a>
              <button type="submit" class="btn btn-success btn-sm">Save</button>
          </div>
      </form>
      <?php } ?>
      </div>
  </div>
</div> 
