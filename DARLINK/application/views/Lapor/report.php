<div class="container my-3">
    <div name="alert">
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data <strong>berhasil</strong> <?= $this->session->flashdata('success'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
    </div>

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="btn border border-dark bg-light text-dark mr-2" id="pills-1-tab" data-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-1" aria-selected="true">Service</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="btn border border-dark bg-light text-dark mr-2" id="pills-2-tab" data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-2" aria-selected="false">Feed/Dist</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
            <div class="col text-center text-light form-control mb-2" style="background-color:#84142d"><h6>Report For Service</h6></div>
            <?php echo form_open('lapor/reportService'); ?>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-2">
                        <label>Tipe Laporan</label>
                    </div>
                    <div class="form-group col-md-8">
                        <select class="custom-select custom-select-sm" name="jenis" required>
                            <option value="">Choose...</option>
                            <option value="Omset Service ODP">Omset Service ODP</option>
                            <option value="Normalisasi">Normalisasi</option>
                            <option value="Provisioning">Provisioning</option>
                            <option value="Migrasi">Migrasi</option>
                        </select>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-2">
                        <label>Internet Number</label>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control form-control-sm" name="numbservice">
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-2">
                        <label>Service Number</label>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control form-control-sm" name="numbservice2">
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-2">
                        <label>Nama ODP</label>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control form-control-sm" name="namaodp">
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-2">
                        <label>QR ODP</label>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control form-control-sm" name="qrodp">
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-2">
                        <label>Port ODP</label>
                    </div> 
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control form-control-sm" name="portodp">
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-2">
                        <label>QR Dropcore</label>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control form-control-sm" name="qrdropcore">
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-2">
                        <label>Nama OLT</label>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control form-control-sm" name="hostnamegpon" id="hostnamegponolt">
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-2">
                        <label>Slot OLT</label>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control form-control-sm" name="slotgpon">
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-2">
                        <label>Port OLT</label>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control form-control-sm" name="portgpon">
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-2">
                        <label>SN ONT</label>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control form-control-sm" name="sn">
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-2">
                        <label>Nama Pelapor</label>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control form-control-sm" value="<?php echo $this->session->userdata("username");  ?>" name="pelapor" disabled>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-10">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success form-inline">Save</button>
                        </div>
                    </div>
                </div>
                
            <?php echo form_close(); ?>
        </div>
    
        <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
            <div class="col text-center text-light form-control mb-2" style="background-color:#84142d"><h6>Report For CO</h6></div>
            <?php echo form_open('lapor/reportCO'); ?>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-2">
                        <label>Tipe Laporan</label>
                    </div>
                    <div class="form-group col-md-8">
                        <select class="custom-select custom-select-sm" name="jenis" required>
                            <option value="">Choose...</option>
                            <option value="CO Feeder">CO Feeder</option>
                            <option value="CO Distribution">CO Distribution</option>
                        </select>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-2">
                        <label>Nama ODP</label>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control form-control-sm" name="namaodp">
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-2">
                        <label>Nama OLT</label>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control  form-control-sm" name="hostnamegpon" id="hostnamegponodp">
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-2">
                        <label>Slot OLT</label>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control  form-control-sm" name="slotgpon">
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-2">
                        <label>Port OLT</label>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control  form-control-sm" name="portgpon">
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-2">
                        <label>Nama Pelapor</label>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control form-control-sm" value="<?php echo $this->session->userdata("username");  ?>" name="pelapor" disabled>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-10">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success form-inline">Save</button>
                        </div>
                    </div>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>