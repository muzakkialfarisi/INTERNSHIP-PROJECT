<div style="background-color:#deddfa" class="py-5">
    <div class="container">

        <div class="accordion" id="accordionExample">

            <div class="card">
                <div class="card-header bg-light text-center" id="heading3">
                    <h5 class="mb-0">
                        <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                            Serach by ODP
                        </button>
                    </h5>
                </div>
                <div id="collapse3" class="collapse show" aria-labelledby="heading3" data-parent="#accordionExample">
                    <div class="card-body">
                        <?php echo form_open('homepage/search2'); ?>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Nama ODP</label>
                                <input type="text" class="form-control" required="" name="namaodp">
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary form-inline">Search <i class='fas fa-search'></i></button>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-light text-center" id="heading4">
                    <h5 class="mb-0">
                        <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                            Serach by Service
                        </button>
                    </h5>
                </div>
                <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordionExample">
                    <div class="card-body">
                        <?php echo form_open('homepage/search3'); ?>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Nomor Internet/Voice</label>
                                <input type="text" class="form-control" required="" name="numbservice">
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary form-inline">Search <i class='fas fa-search'></i></button>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-light text-center" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        Search by OLT
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <?php echo form_open('homepage/search1'); ?>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nama OLT</label>
                                    <input type="text" class="form-control" required="" name="hostnamegpon" id="hostnamegponolt">
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
                                <button type="submit" class="btn btn-primary form-inline">Search <i class='fas fa-search'></i></button>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>