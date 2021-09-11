<div class="container">

    <a class="btn border border-dark bg-light text-dark mb-3 px-4" href="<?= base_url(); ?>admin/databaseAll">All</a>
    <a class="btn border border-dark bg-light text-dark mb-3 px-3" href="<?= base_url(); ?>admin/databaseOLT">OLT</a>
    <a class="btn border border-dark bg-light text-dark mb-3 px-3" href="<?= base_url(); ?>admin/databaseODP">ODP</a>
    <a class="btn border border-dark bg-light text-dark mb-3" href="<?= base_url(); ?>admin/databaseService">Service</a>
    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data <strong>berhasil</strong> <?= $this->session->flashdata('success'); ?>.
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
    <nav class="navbar">
        <a class="navbar-brand"></a>
        <form action="<?php echo base_url("admin/search_Service"); ?>" method="post">
            <div class="form-row">
                <div class="form-group col">
                    <input type="text" class="form-control form-control-sm" name="numb" placeholder="No. Intet/Voice">
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary fas fa-search"></button>
                </div>
            </div>
        </form>
    </nav>
    <table class="table table-striped table-sm text-center">
        <thead style="background-color:#84142d" class="text-light">
            <tr>
            <th scope="col">No</th>
            <th scope="col">No Internet</th>
            <th scope="col">No Voice</th>
            <th scope="col">SN ONT</th>
            <th scope="col">Koordinat</th>
            <th scope="col">ONU</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $i = 0;
            foreach($getdata as $data){
            $i = $i + 1;
        ?>
            <tr>
            <th scope="row"> <?php echo $i?>.</th>
            <td><?= $data['numbservice'];?></td>
            <td><?= $data['numbservice2'];?></td>
            <td><?= $data['sn'];?></td>
            <td><?= $data['koorservice'];?></td>
            <td><?= $data['onuservice'];?></td>
            <td>
                <!-- Button Delete -->
                <a class="btn btn-danger btn-sm text-light far fa-trash-alt" data-toggle="modal" data-target="#delete-<?= $data['numbservice'];?>-<?= $data['numbservice2'];?>"></a>
                <!-- <a class="btn btn-danger btn-sm far fa-trash-alt" data-toggle="modal" data-target="#delete" ></a> -->
                <!-- Modal -->
                <div class="modal fade" id="delete-<?= $data['numbservice'];?>-<?= $data['numbservice2'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">No Service : <?= $data['numbservice'];?> <?= $data['numbservice2'];?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                <a type="button" class="btn btn-danger btn-sm" href="<?= base_url(); ?>admin/deleteService/<?= $data['numbservice'];?>">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="btn btn-sm btn-info text-light far fa-edit" data-toggle="modal" data-target="#update-<?= $data['numbservice'];?>"></a>
                <div class="modal fade bd-example-modal-lg" id="update-<?= $data['numbservice'];?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                        <form action="<?php $key=$data['numbservice']; echo base_url("admin/editService/$key"); ?>" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle"><?= $data['numbservice'];?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">                    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>No. Internet</label>
                                        <input type="text" class="form-control" name="numbservice" value="<?= $data['numbservice'];?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>No. Voice</label>
                                        <input type="text" class="form-control" name="numbservice2" value="<?= $data['numbservice2'];?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>SN ONT</label>
                                        <input type="text" class="form-control" name="sn" value="<?= $data['sn'];?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Koordinat</label>
                                        <input type="text" class="form-control" name="koorservice" value="<?= $data['koorservice'];?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>ONU</label>
                                        <input type="text" class="form-control" name="onuservice" value="<?= $data['onuservice'];?>">
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
            </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>


