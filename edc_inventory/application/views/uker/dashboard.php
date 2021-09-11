<div class="container-fluid">
    <nav class="navbar navbar-expand my-3">
        <!-- <a class="btn btn-sm btn-success text-light mr-2" href="<?= site_url('edc/v_input_edc')?>">Create New EDC</a> -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav mr-auto">
                <li>
                    <a class="btn btn-outline-secondary btn-sm" href="<?= site_url('uker/export')?>">Export To (.xls)</a>
                </li>
            </ul>
            <div class="form-inline">
                <form method="post">
                    <!-- <input type="text" class="form-control form-control-sm" name="" placeholder="keyword-2"> -->
                    <input type="text" class="form-control form-control-sm" name="searchKeyword" placeholder="Nama Kanwil/Uker" value="<?php echo $searchKeyword; ?>">
                    <button type="submit" class="btn btn-primary fas fa-search" name="submitSearch" value="Search"></button>
                    <button type="submit" class="btn btn-secondary fas fa-redo" name="submitSearchReset" value="Search"></button>
                </form>
            </div>
        </div>
    </nav>

        <!-- Data list table --> 
    <table class="table table-sm table-striped text-center" style="font-size:14px">
        <thead class="text-dark" style="background-color:#deddfa">
            <tr>
                <th>Kode Branch</th>
                <th>Nama Uker</th>
                <th>Kode Kanwil</th>
                <th>Nama Kanwil</th>
            </tr>
        </thead> 
        <tbody>
            <?php if(!empty($uker)){ foreach($uker as $row){ ?>
            <tr>
                <td><?php echo $row['kode_branch']; ?></td>
                <td><?php echo $row['nama_uker']; ?></td>
                <td><?php echo $row['kode_kanwil']; ?></td>
                <td><?php echo $row['nama_kanwil']; ?></td>
            </tr>
            <?php } }else{ ?>
            <tr class="text-center"><td colspan="7">Data tidak ditemukan</td></tr>
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