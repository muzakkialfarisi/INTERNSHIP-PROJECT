<div class="container">
    <nav class="navbar navbar-expand my-3">
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav mr-auto">
            </ul>
            <div class="form-inline">
                <form method="post">
                    <input type="text" class="form-control form-control-sm" name="searchKeyword" placeholder="username" value="<?php echo $searchKeyword; ?>">
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
    <?php if ($this->session->flashdata('error')) : ?>
    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
        <strong><?= $this->session->flashdata('error'); ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
    <table class="table table-sm table-striped text-center" style="font-size:14px">
        <thead class="text-dark" style="background-color:#deddfa">
            <tr>
                <th>Username</th>
                <th>Nama</th>
                <th>Password</th>
                <th>Akses</th>
                <th>Aksi</th>
            </tr>
        </thead> 
        <tbody id="myTable">
            <?php if(!empty($user)){ foreach($user as $row){ ?>
            <tr>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td>
                    <a class="btn btn-sm text-light <?php if($row['status']==1){echo 'fas fa-user-check btn-success';}else{echo 'fas fa-user-times btn-warning';}?>" href="<?= site_url('admin/update_status/'.$row['username'].'/'.$row['status'])?>"></a>
                </td>
                <td>
                    <a class="btn btn-danger btn-sm far fa-trash-alt" data-toggle="modal" data-target="#delete-<?=$row['username']?>" ></a>
                    <div class="modal fade" id="delete-<?=$row['username']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="exampleModalCenterTitle">Hapus Akun</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?=$row['username']?>
                                    <br>Apakah anda yakin?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                    <a type="button" class="btn btn-danger btn-sm" href="<?= site_url('admin/delete_akun/'.$row['username'])?>">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <?php } }else{ ?>
            <tr class="text-center"><td colspan="9">Data tidak ditemukan</td></tr>
            <?php } ?>
        </tbody>
    </table>
    
        <!-- Display pagination links -->
    <div class="row">
        <div class="col">
        <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>