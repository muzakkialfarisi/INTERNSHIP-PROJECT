<!doctype html>
<html lang="en">
    <head>
    </head>
    <body style="background-color:#deddfa">
        <?php
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=tableSplitter.xlsx");
        ?>
        <div class="container">
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
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </body>
</html>