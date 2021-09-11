<div class="container">
    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data <strong>berhasil</strong> <?= $this->session->flashdata('success'); ?>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <nav class="navbar">
        <a class="navbar-brand"></a>
        <form class="form-inline">
            <input class="form-control" type="search " placeholder="Search ..." id="myInput">
        </form>
    </nav>
    <table class="table table-striped table-sm text-center">
        <thead style="background-color:#84142d" class="text-light">
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
            <th scope="col">Access</th>
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
            <td><?= $data['nama'];?></td>
            <td><?= $data['username'];?></td>
            <td><?= $data['password'];?></td>
            <td>
                <?php
                    $key1 = $data['username'];
                    if($data['access'] == true){
                        echo "<a class='btn btn-success btn-sm text-light fas fa-user-check' data-toggle='modal' data-target='#access-$key1'></a>";
                    }else{
                        echo "<a class='btn btn-warning btn-sm text-light fas fa-user-times' data-toggle='modal' data-target='#access-$key1'></a>";
                    }
                ?>
                <!-- Button Delete -->
                <!-- <a class="btn btn-danger btn-sm far fa-trash-alt" data-toggle="modal" data-target="#delete" ></a> -->
                <!-- Modal -->
                <div class="modal fade" id="access-<?=$key1?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle"><?=$key1?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                <?php
                                    $key2 = $data['access'];
                                    if($key2 == false){
                                        echo '<a type="button" class="btn btn-success btn-sm" href="'.base_url().'admin/getAccess/'.$key1.'/'.$key2.'">Enable</a>';
                                    }else{
                                        echo '<a type="button" class="btn btn-warning btn-sm" href="'.base_url().'admin/getAccess/'.$key1.'/'.$key2.'">Disable</a>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <a class="btn btn-sm btn-info text-light far fa-edit" data-toggle="modal" data-target="#update-<?= $data['username'];?>"></a>
                <div class="modal fade bd-example-modal-lg" id="update-<?= $data['username'];?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                        <form action="<?php echo base_url("admin/updateUser/$key1"); ?>" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle"><?= $data['username'];?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">                    
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama" required="" value="<?= $data['nama'];?>">
                                    </div>
                                    <div class="form-group col">
                                        <label>Password</label>
                                        <div class="input-group" id="show_hide_password">
                                            <input class="form-control" type="password" name="password" value="<?= $data['password'];?>">
                                        </div>
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
                <a class="btn btn-danger btn-sm text-light far fa-trash-alt" data-toggle="modal" data-target="#delete-<?= $data['username'];?>"></a>
                <div class="modal fade" id="delete-<?= $data['username'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle"><?= $data['username'];?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                <a type="button" class="btn btn-danger btn-sm" href="<?= base_url(); ?>admin/deleteUser/<?= $data['username'];?>">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>