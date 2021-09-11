<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=data_uker.xls");
?>
<table >
    <thead>
        <tr>
            <td>Kode Kanwil</td>
            <td>Nama kanwil</td>
            <td>Kode Branch</td>
            <td>Nama Uker</td>
        </tr>
    </thead>
    <tbody>
        <?php 
        $sql="SELECT * from uker";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {?>
            <tr>
                <td><?= $row->kode_kanwil;?></td>
                <td><?= $row->nama_kanwil;?></td>
                <td><?= $row->kode_branch;?></td>
                <td><?= $row->nama_uker;?></td>
            </tr>
        <?php }
        }
        ?>
    </tbody>
</table>