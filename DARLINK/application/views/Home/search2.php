<div style="background-color:#deddfa" class="py-5">    
    <div class="container">
        <div class="text-center mb-3">
            <a href="<?= base_url(); ?>homepage" class="nav-link text-dark" role="button" aria-pressed="true"><span class="fa fa-home mr-1"></span>Home</a>
            <lable class="bg-light px-2 py-1"><?php echo 'Search by: '.$searchKey?></lable>
        </div>
        <table class="table table-striped table-sm text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" colspan="6">Tabel OLT</th>
                </tr>
            </thead>
                <tr class="thead-light">
                    <th scope="col">No</th>
                    <th scope="col">Host Name OLT</th>
                    <th scope="col">Slot</th>
                    <th scope="col">Port</th>
                </tr>
            <tbody>
            <?php $i = 0;
                foreach($dataOLT as $data){
                $i = $i + 1;
            ?>
                <tr>
                <th scope="row"> <?php echo $i?>.</th>
                <td><?= $data['hostnamegpon'];?></td>
                <td><?= $data['slot'];?></td>
                <td><?= $data['port'];?></td>
                </tr>
            <?php }?>
            </tbody>
        </table>

        <table class="table table-striped table-sm text-center mt-5">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" colspan="6">Tabel Service</th>
                </tr>
            </thead>
                <tr class="thead-light">
                    <th scope="col">No</th>
                    <th scope="col">No Internet</th>
                    <th scope="col">No Voice</th>
                    <th scope="col">SN ONT</th>
                    <th scope="col">Koordinat</th>
                    <th scope="col">ONU</th>
                </tr>
            <tbody>
            <?php $i = 0;
                foreach($dataService as $data){
                $i = $i + 1;
            ?>
                <tr>
                <th scope="row"> <?php echo $i?>.</th>
                <td><?= $data['numbservice'];?></td>
                <td><?= $data['numbservice2'];?></td>
                <td><?= $data['sn'];?></td>
                <td><?= $data['koorservice'];?></td>
                <td><?= $data['onuservice'];?></td>
                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
</div>