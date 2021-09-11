<div class="container">
    <a class="btn border border-dark bg-light text-dark mb-3 px-4" href="<?= base_url(); ?>admin/databaseAll">All</a>
    <a class="btn border border-dark bg-light text-dark mb-3 px-3" href="<?= base_url(); ?>admin/databaseOLT">OLT</a>
    <a class="btn border border-dark bg-light text-dark mb-3 px-3" href="<?= base_url(); ?>admin/databaseODP">ODP</a>
    <a class="btn border border-dark bg-light text-dark mb-3" href="<?= base_url(); ?>admin/databaseService">Service</a>
    <a class="btn btn-warning btn-sm float-right" target="_blank" href="<?= base_url(); ?>admin/export">Export Data</a>
    <div name="alert">
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil <strong><?= $this->session->flashdata('success'); ?></strong>
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
    </div>
    <nav class="navbar">
        <a class="navbar-brand"></a>
        <form action="<?php echo base_url("admin/search_All"); ?>" method="post">
            <div class="form-row">
                <div class="form-group col">
                    <input type="text" class="form-control form-control-sm" name="hostnamegpon" placeholder="Nama OLT" id="hostnamegponolt">
                </div>
                <div class="form-group col">
                    <input type="text" class="form-control form-control-sm" name="namaodp" placeholder="Nama ODP">
                </div>
                <div class="form-group col">
                    <input type="text" class="form-control form-control-sm" name="numbservice" placeholder="No. Inet/Voice">
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
            <th scope="col">No.</th>
            <th scope="col">Nama OLT</th>
            <th scope="col">Slot/Port OLT</th>
            <th scope="col">Nama ODP</th>
            <th scope="col">No. Inet</th>
            <th scope="col">No. Voice</th>
            <th scope="col">SN ONT</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $i = 0;
            foreach($getdata as $data){
            $i = $i + 1;
        ?>
            <tr >
            <th> <?php echo $i?>.</th>
            <td><?= $data['hostnamegpon'];?></td>
            <td><?= $data['slot'];?> / <?= $data['port'];?></td>
            <td><?= $data['namaodp'];?></td>
            <td><?= $data['numbservice'];?></td>
            <td><?= $data['numbservice2'];?></td>
            <td><?= $data['sn'];?></td>
            <td>
            <a class="btn btn-sm btn-info text-light far fa-edit" data-toggle="modal" data-target="#update-<?= $data['numbservice'];?>-<?= $data['numbodp'];?>"></a>
            <div class="modal fade bd-example-modal-lg" id="update-<?= $data['numbservice'];?>-<?= $data['numbodp'];?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <form action="<?php $key1=$data['numbservice']; $key2=$data['numbsplitter']; echo base_url("admin/updateSplitter/$key1/$key2"); ?>" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">No Service : <?= $data['numbservice'];?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                   
                            <div class="form-row">
                                <div class="form-group col">
                                    <label>Nama ODP</label>
                                    <input type="text" class="form-control" name="namaodp" required="" value="<?= $data['namaodp'];?>">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success btn-sm">Update</button>
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