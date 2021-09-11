<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=hasil.xls");
?>
<table >
    <thead class="text-dark" style="background-color:#deddfa">
        <tr>
        <td rowspan="2" style="vertical-align: middle;">Serial Number</td>
        <td rowspan="2" style="vertical-align: middle;">Peruntukan</td>
        <td rowspan="2" style="vertical-align: middle;">MID</td>
        <td rowspan="2" style="vertical-align: middle;">TID</td>
        <td colspan="2">Posisi</td>
        <td rowspan="2" style="vertical-align: middle;">Status</td>
        <td colspan="3">Tipe</td>
        <td rowspan="2" style="vertical-align: middle;">Contact<br>less</td>
        <td rowspan="2" style="vertical-align: middle;">Merk</td>
        </tr>
        <tr>
        <td>Kanwil</td>
        <td>UKER</td>
        <td>GPRS</td>
        <td>LAN</td>
        <td>Dial-Up</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($edc as $data){?>
        <tr  class="text-capitalize">
        <td><?= $data['sn'];?></td>
            <td><?= $data['peruntukan'];?></td>
            <td><?= $data['mid'];?></td>
            <td><?= $data['tid'];?></td>
            <td><?= $data['posisi_kanwil'];?></td>
            <td><?= $data['posisi_uker'];?></td>
            <td><?= $data['status'];?></td>
            <td><?= $data['gprs']?></td>
            <td><?= $data['lan']?></td>
            <td><?= $data['dialup']?></td>
            <td><?= $data['contactless']?></td>
            <td><?= $data['merk'];?></td>
        </tr>
        <?php }?>
    </tbody>
</table>