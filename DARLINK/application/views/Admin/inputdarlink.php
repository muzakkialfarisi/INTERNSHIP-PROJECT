<div class="container">
    <div class="row">
        <div class="col-3 ">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <div class="col text-center text-light form-control mb-2" style="background-color:#84142d"><h6>Input Menus</h6></div>
            <a class="nav-link active border border-dark mb-2 text-center" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">ODP Input</a>
            <a class="nav-link border border-dark mb-2 text-center" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Service Input</a>
            <a class="nav-link border border-dark mb-2 text-center" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="false">OLT Input</a>
            </div>
        </div>

        <div class="col-9">
            <div id="alert">
                <?php if ($this->session->flashdata('OLT')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Nama OLT, Slot, dan Port <strong><?= $this->session->flashdata('OLT'); ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('ODP')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Nama ODP <strong><?= $this->session->flashdata('ODP'); ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('Service')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    No Internet atau No Service <strong><?= $this->session->flashdata('Service'); ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data <strong>berhasil</strong> <?= $this->session->flashdata('success'); ?>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
            <div>
        
            <div class="tab-content" id="v-pills-tabContent">

            <div class="tab-pane fade" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
                <?php echo form_open('admin/inputOLT'); ?>
                    <div class="col text-center text-light form-control mb-2" style="background-color:#84142d"><h6>Form OLT Input</h6></div>
                    <div class="form-groupvinput-group-sm">
                        <label for="formGroupExampleInput">OLT Name</label>
                        <input type="text" class="form-control"  required="" name="hostnamegpon" id="hostnamegponolt">
                    </div>
                    <div class="form-groupvinput-group-sm">
                        <label for="formGroupExampleInput">Slot</label>
                        <input type="text" class="form-control" required="" name="slot">
                    </div>
                    <div class="form-groupvinput-group-sm">
                        <label for="formGroupExampleInput">Port</label>
                        <input type="text" class="form-control" required="" name="port">
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-success form-inline">Save</button>
                    </div>
                <?php echo form_close(); ?>
            </div>

            <div class="tab-pane fade show active" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
                <?php echo form_open('admin/inputODP'); ?>
                    <div class="col text-center text-light form-control mb-2" style="background-color:#84142d"><h6>Form ODP Input</h6></div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label>ODP Name</label>
                            <input type="text" class="form-control" required="" name="namaodp">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Capasity</label>
                            <input type="text" class="form-control" required="" name="kapodp">
                        </div>
                        <div class="form-group col-md-5">
                            <label>Coordinate</label>
                            <input type="text" class="form-control" required="" name="koorodp">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>OLT Name</label>
                            <input type="text" class="form-control" required="" name="hostnamegpon" id="hostnamegponodp">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Slot</label>
                            <input type="text" class="form-control" required="" name="slot">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Port</label>
                            <input type="text" class="form-control" required="" name="port">
                        </div>
                    </div>

                    <div class="d-flex justify-content-end ">
                        <button type="submit" class="btn btn-success form-inline">Save</button>
                    </div>
                <?php echo form_close(); ?>
            </div>

            <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
                
                <div class="col text-center text-light form-control mb-2" style="background-color:#84142d"><h6>Form Service Input</h6></div>

                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active mr-2 border border-dark" id="pills-1-tab" data-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-1" aria-selected="true">With OLT</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link  border border-dark" id="pills-2-tab" data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-2" aria-selected="false">With ODP</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
                        <?php echo form_open('admin/inputServicebyOLT'); ?>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Internet Number</label>
                                    <input type="text" class="form-control" name="numbservice">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Voice Number</label>
                                    <input type="text" class="form-control" name="numbservice2">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label>SN ONT</label>
                                    <input type="text" class="form-control" required="" name="sn">
                                </div>
                                <div class="form-group col-md-5">
                                    <label>Coordinate</label>
                                    <input type="text" class="form-control" name="koorservice">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>ONU</label>
                                    <input type="text" class="form-control" required="" name="onuservice">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>OLT Name</label>
                                    <input type="text" class="form-control" required="" name="hostnamegpon" id="hostnamegponservice">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Slot</label>
                                    <input type="text" class="form-control" required="" name="slot">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Port</label>
                                    <input type="text" class="form-control" required="" name="port">
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success form-inline">Save</button>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
                        <?php echo form_open('admin/inputServicebyODP'); ?>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Internet Number</label>
                                    <input type="text" class="form-control" name="numbservice">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Voice Number</label>
                                    <input type="text" class="form-control" name="numbservice2">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label>SN ONT</label>
                                    <input type="text" class="form-control" required="" name="sn">
                                </div>
                                <div class="form-group col-md-5">
                                    <label>Coordinate</label>
                                    <input type="text" class="form-control" name="koorservice">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>ONU</label>
                                    <input type="text" class="form-control" name="onuservice">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>ODP Name</label>
                                <input type="text" class="form-control" required="" name="namaodp">
                            </div>
                            <div class="d-flex justify-content-end mt-3">
                                <button type="submit" class="btn btn-success form-inline">Save</button>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>  
            </div>
            </div>
        </div>
    </div>
</div>