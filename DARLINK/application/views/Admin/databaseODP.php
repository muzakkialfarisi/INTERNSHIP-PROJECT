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
    <?php if ($this->session->flashdata('ODP')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Nama ODP <strong><?= $this->session->flashdata('ODP'); ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
    <nav class="navbar">
        <a class="navbar-brand"></a>
        <form action="<?php echo base_url("admin/search_ODP"); ?>" method="post">
            <div class="form-row">
                <div class="form-group col">
                    <input type="text" class="form-control form-control-sm" name="namaodp" placeholder="Nama ODP">
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
            <th scope="col">Nama</th>
            <th scope="col">Kapasitas</th>
            <th scope="col">Koordinat</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody id="myTable">
        <?php $i = 0;
            foreach($getdata as $data){
            $i = $i + 1;
        ?>
            <tr>
            <th scope="row"> <?php echo $i?>.</th>
            <td><?= $data['namaodp'];?></td>
            <td><?= $data['kapodp'];?></td>
            <td><?= $data['koorodp'];?></td>
            <td>
                <!-- Button Delete -->
                <a class="btn btn-danger btn-sm text-light far fa-trash-alt" data-toggle="modal" data-target="#delete-<?= $data['numbodp'];?>"></a>
                <div class="modal fade" id="delete-<?= $data['numbodp'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Nama ODP <?= $data['namaodp'];?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin? <br> Jika menghapus ODP maka service semua service yang terhubung akan terputus dari koneksi ODP
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                <a type="button" class="btn btn-danger btn-sm" href="<?= base_url(); ?>admin/deleteODP/<?= $data['numbodp'];?>">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="btn btn-sm btn-info text-light far fa-edit" data-toggle="modal" data-target="#update-<?= $data['numbodp'];?>"></a>
                <div class="modal fade bd-example-modal-lg" id="update-<?= $data['numbodp'];?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                        <form action="<?php $key=$data['numbodp']; echo base_url("admin/editODP/$key"); ?>" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle"><?= $data['namaodp'];?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">                    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Nama ODP</label>
                                        <input type="text" class="form-control" name="namaodp" value="<?= $data['namaodp'];?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Kapasitas</label>
                                        <input type="text" class="form-control" name="kapodp" value="<?= $data['kapodp'];?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Koordinat</label>
                                        <input type="text" class="form-control" name="koorodp" value="<?= $data['koorodp'];?>">
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