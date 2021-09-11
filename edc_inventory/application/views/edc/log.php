<div class="container mt-4">
    <table class="table table-sm table-striped text-center" style="font-size:13px; border: 2px solid black" >
        <thead class="text-dark" style="background-color:#deddfa">
            <tr style="font-weight:bold;">
                <td style="vertical-align: middle;">Serial Number</td>
                <td style="vertical-align: middle;">Last Modified</td>
                <td style="vertical-align: middle;">Username</td>
                <td style="vertical-align: middle;">Status</td>
                <td style="vertical-align: middle;">Kegiatan</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($edc as $data){?>
            <tr  class="text-capitalize">
                <td><?= $data['sn'];?></td>
                <td><?= $data['waktu'];?></td>
                <td><?= $data['username'];?></td>
                <td><?= $data['status'];?></td>
                <td><?= $data['kegiatan'];?></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>