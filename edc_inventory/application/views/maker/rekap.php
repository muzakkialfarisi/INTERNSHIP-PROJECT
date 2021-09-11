<div class="container-fluid">
    <nav class="navbar navbar-expand my-3">
        <!-- <a class="btn btn-outline-secondary btn-sm" href="" id="form_edit">Export to .xls</a> -->

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav mr-auto">
            </ul>
            <div class="form-inline">
                <form action="<?= site_url('maker/tahun_rekap')?>" method="post">
                    <select type="text" class="form-control form-control-sm" name="yearpicker" id="yearpicker">
                        <option value="">Tahun...</option>
                    </select>
                    <script>
                        for (i = new Date().getFullYear(); i > 2018; i--){
                            $('#yearpicker').append($('<option />').val(i).html(i));
                        }
                    </script>
                    <button type="submit" class="btn btn-primary fas fa-search" name="submitSearch" value="Search"></button>
                </form>
            </div>
        </div>
    </nav>

    <div>
        <h5 class="text-center"> IMPLEMENTASI EDC TAHUN <?php echo $tahun; ?> </h5>
    </div>

    <?php { ?>
    <table class="table table-sm table-striped text-center mt-3 table-bordered" style="font-size:12px;" >
        <thead class="text-dark" style="background-color:#deddfa">
            <tr style="font-weight:bold;">
                <td rowspan="2" style="vertical-align: middle;">IMPLEMEN<BR>TATOR</td>
                <td rowspan="2" style="vertical-align: middle;">STATUS</td>
                <td colspan="12" style="vertical-align: middle;">BULAN IMPLEMENTASI</td>
                <td rowspan="2" style="vertical-align: middle;">TOTAL</td>
            </tr>
            <tr style="font-weight:bold;">
                <td>JAN</td>
                <td>FEB</td>
                <td>MAR</td>
                <td>APR</td>
                <td>MEI</td>
                <td>JUN</td>
                <td>JUL</td>
                <td>AGT</td>
                <td>SEP</td>
                <td>OKT</td>
                <td>NOV</td>
                <td>DES</td>
            </tr>
        </thead>
        <tbody>
            <tr class="text-capitalize">
                <td style="vertical-align: middle;" rowspan="2">BRI IT</td>
                <td>Done</td>                
                <td><?php foreach($jan as $data) { $b1 = $data['briit']; echo $b1;}?></td>
                <td><?php foreach($feb as $data) { $b2 = $data['briit']; echo $b2;}?></td>
                <td><?php foreach($mar as $data) { $b3 = $data['briit']; echo $b3;}?></td>
                <td><?php foreach($apr as $data) { $b4 = $data['briit']; echo $b4;}?></td>
                <td><?php foreach($mei as $data) { $b5 = $data['briit']; echo $b5;}?></td>
                <td><?php foreach($jun as $data) { $b6 = $data['briit']; echo $b6;}?></td>
                <td><?php foreach($jul as $data) { $b7 = $data['briit']; echo $b7;}?></td>
                <td><?php foreach($agt as $data) { $b8 = $data['briit']; echo $b8;}?></td>
                <td><?php foreach($sep as $data) { $b9 = $data['briit']; echo $b9;}?></td>
                <td><?php foreach($okt as $data) { $b10 = $data['briit']; echo $b10;}?></td>
                <td><?php foreach($nov as $data) { $b11 = $data['briit']; echo $b11;}?></td>
                <td><?php foreach($des as $data) { $b12 = $data['briit']; echo $b12;}?></td>
                <td style="font-weight:bold;"><?php echo $briit = $b1+$b2+$b3+$b4+$b5+$b6+$b7+$b8+$b9+$b10+$b11+$b12 ?></td>
            </tr>
            <tr class="text-capitalize">
                <td>Pending</td>
                <td><?php foreach($xjan as $data) { $xb1 = $data['briit']; echo $xb1;}?></td>
                <td><?php foreach($xfeb as $data) { $xb2 = $data['briit']; echo $xb2;}?></td>
                <td><?php foreach($xmar as $data) { $xb3 = $data['briit']; echo $xb3;}?></td>
                <td><?php foreach($xapr as $data) { $xb4 = $data['briit']; echo $xb4;}?></td>
                <td><?php foreach($xmei as $data) { $xb5 = $data['briit']; echo $xb5;}?></td>
                <td><?php foreach($xjun as $data) { $xb6 = $data['briit']; echo $xb6;}?></td>
                <td><?php foreach($xjul as $data) { $xb7 = $data['briit']; echo $xb7;}?></td>
                <td><?php foreach($xagt as $data) { $xb8 = $data['briit']; echo $xb8;}?></td>
                <td><?php foreach($xsep as $data) { $xb9 = $data['briit']; echo $xb9;}?></td>
                <td><?php foreach($xokt as $data) { $xb10 = $data['briit']; echo $xb10;}?></td>
                <td><?php foreach($xnov as $data) { $xb11 = $data['briit']; echo $xb11;}?></td>
                <td><?php foreach($xdes as $data) { $xb12 = $data['briit']; echo $xb12;}?></td>
                <td style="font-weight:bold;"><?php echo $xbriit = $xb1+$xb2+$xb3+$xb4+$xb5+$xb6+$xb7+$xb8+$xb9+$xb10+$xb11+$xb12 ?></td>
            </tr>
            <tr class="text-capitalize">
                <td style="vertical-align: middle;" rowspan="2">VISIONET</td>
                <td>Done</td>  
                <td><?php foreach($jan as $data) { $v1 = $data['visionet']; echo $v1;}?></td>
                <td><?php foreach($feb as $data) { $v2 = $data['visionet']; echo $v2;}?></td>
                <td><?php foreach($mar as $data) { $v3 = $data['visionet']; echo $v3;}?></td>
                <td><?php foreach($apr as $data) { $v4 = $data['visionet']; echo $v4;}?></td>
                <td><?php foreach($mei as $data) { $v5 = $data['visionet']; echo $v5;}?></td>
                <td><?php foreach($jun as $data) { $v6 = $data['visionet']; echo $v6;}?></td>
                <td><?php foreach($jul as $data) { $v7 = $data['visionet']; echo $v7;}?></td>
                <td><?php foreach($agt as $data) { $v8 = $data['visionet']; echo $v8;}?></td>
                <td><?php foreach($sep as $data) { $v9 = $data['visionet']; echo $v9;}?></td>
                <td><?php foreach($okt as $data) { $v10 = $data['visionet']; echo $v10;}?></td>
                <td><?php foreach($nov as $data) { $v11 = $data['visionet']; echo $v11;}?></td>
                <td><?php foreach($des as $data) { $v12 = $data['visionet']; echo $v12;}?></td>
                <td style="font-weight:bold;"><?php echo $visionet = $v1+$v2+$v3+$v4+$v5+$v6+$v7+$v8+$v9+$v10+$v11+$v12 ?></td>
            </tr>
            <tr class="text-capitalize">
                <td>Pending</td>
                <td><?php foreach($xjan as $data) { $xv1 = $data['visionet']; echo $xv1;}?></td>
                <td><?php foreach($xfeb as $data) { $xv2 = $data['visionet']; echo $xv2;}?></td>
                <td><?php foreach($xmar as $data) { $xv3 = $data['visionet']; echo $xv3;}?></td>
                <td><?php foreach($xapr as $data) { $xv4 = $data['visionet']; echo $xv4;}?></td>
                <td><?php foreach($xmei as $data) { $xv5 = $data['visionet']; echo $xv5;}?></td>
                <td><?php foreach($xjun as $data) { $xv6 = $data['visionet']; echo $xv6;}?></td>
                <td><?php foreach($xjul as $data) { $xv7 = $data['visionet']; echo $xv7;}?></td>
                <td><?php foreach($xagt as $data) { $xv8 = $data['visionet']; echo $xv8;}?></td>
                <td><?php foreach($xsep as $data) { $xv9 = $data['visionet']; echo $xv9;}?></td>
                <td><?php foreach($xokt as $data) { $xv10 = $data['visionet']; echo $xv10;}?></td>
                <td><?php foreach($xnov as $data) { $xv11 = $data['visionet']; echo $xv11;}?></td>
                <td><?php foreach($xdes as $data) { $xv12 = $data['visionet']; echo $xv12;}?></td>
                <td style="font-weight:bold;"><?php echo $xvisionet = $xv1+$xv2+$xv3+$xv4+$xv5+$xv6+$xv7+$xv8+$xv9+$xv10+$xv11+$xv12 ?></td>
            </tr>
            <tr class="text-capitalize">
                <td style="vertical-align: middle;" rowspan="2">INDOPAY</td>
                <td class="text-">Done</td>  
                <td><?php foreach($jan as $data) { $i1 = $data['indopay']; echo $i1;}?></td>
                <td><?php foreach($feb as $data) { $i2 = $data['indopay']; echo $i2;}?></td>
                <td><?php foreach($mar as $data) { $i3 = $data['indopay']; echo $i3;}?></td>
                <td><?php foreach($apr as $data) { $i4 = $data['indopay']; echo $i4;}?></td>
                <td><?php foreach($mei as $data) { $i5 = $data['indopay']; echo $i5;}?></td>
                <td><?php foreach($jun as $data) { $i6 = $data['indopay']; echo $i6;}?></td>
                <td><?php foreach($jul as $data) { $i7 = $data['indopay']; echo $i7;}?></td>
                <td><?php foreach($agt as $data) { $i8 = $data['indopay']; echo $i8;}?></td>
                <td><?php foreach($sep as $data) { $i9 = $data['indopay']; echo $i9;}?></td>
                <td><?php foreach($okt as $data) { $i10 = $data['indopay']; echo $i10;}?></td>
                <td><?php foreach($nov as $data) { $i11 = $data['indopay']; echo $i11;}?></td>
                <td><?php foreach($des as $data) { $i12 = $data['indopay']; echo $i12;}?></td>
                <td style="font-weight:bold;"><?php echo $indopay = $i1+$i2+$i3+$i4+$i5+$i6+$i7+$i8+$i9+$i10+$i11+$i12 ?></td>
            </tr>
            <tr class="text-capitalize">
                <td>Pending</td>
                <td><?php foreach($xjan as $data) { $xi1 = $data['indopay']; echo $xi1;}?></td>
                <td><?php foreach($xfeb as $data) { $xi2 = $data['indopay']; echo $xi2;}?></td>
                <td><?php foreach($xmar as $data) { $xi3 = $data['indopay']; echo $xi3;}?></td>
                <td><?php foreach($xapr as $data) { $xi4 = $data['indopay']; echo $xi4;}?></td>
                <td><?php foreach($xmei as $data) { $xi5 = $data['indopay']; echo $xi5;}?></td>
                <td><?php foreach($xjun as $data) { $xi6 = $data['indopay']; echo $xi6;}?></td>
                <td><?php foreach($xjul as $data) { $xi7 = $data['indopay']; echo $xi7;}?></td>
                <td><?php foreach($xagt as $data) { $xi8 = $data['indopay']; echo $xi8;}?></td>
                <td><?php foreach($xsep as $data) { $xi9 = $data['indopay']; echo $xi9;}?></td>
                <td><?php foreach($xokt as $data) { $xi10 = $data['indopay']; echo $xi10;}?></td>
                <td><?php foreach($xnov as $data) { $xi11 = $data['indopay']; echo $xi11;}?></td>
                <td><?php foreach($xdes as $data) { $xi12 = $data['indopay']; echo $xi12;}?></td>
                <td style="font-weight:bold;"><?php echo $xindopay = $xi1+$xi2+$xi3+$xi4+$xi5+$xi6+$xi7+$xi8+$xi9+$xi10+$xi11+$xi12 ?></td>
            </tr>
        </tbody>
        <tfoot>
            <tr style="background-color:#deddfa;font-weight:bold;">
                <td style="vertical-align: middle;" rowspan="2">TOTAL</td>
                <td class="text-">Done</td> 
                <td><?php echo $b1+$v1+$i1 ?></td>
                <td><?php echo $b2+$v2+$i2 ?></td>
                <td><?php echo $b3+$v3+$i3 ?></td>
                <td><?php echo $b4+$v4+$i4 ?></td>
                <td><?php echo $b5+$v5+$i5 ?></td>
                <td><?php echo $b6+$v6+$i6 ?></td>
                <td><?php echo $b7+$v7+$i7 ?></td>
                <td><?php echo $b8+$v8+$i8 ?></td>
                <td><?php echo $b9+$v9+$i9 ?></td>
                <td><?php echo $b10+$v10+$i10 ?></td>
                <td><?php echo $b11+$v11+$i11 ?></td>
                <td><?php echo $b12+$v12+$i12 ?></td>
                <td><?php echo $briit+$visionet+$indopay ?></td>
            </tr>
            <tr style="font-weight:bold;">
                <td>Pending</td>
                <td><?php echo $xb1+$xv1+$xi1 ?></td>
                <td><?php echo $xb2+$xv2+$xi2 ?></td>
                <td><?php echo $xb3+$xv3+$xi3 ?></td>
                <td><?php echo $xb4+$xv4+$xi4 ?></td>
                <td><?php echo $xb5+$xv5+$xi5 ?></td>
                <td><?php echo $xb6+$xv6+$xi6 ?></td>
                <td><?php echo $xb7+$xv7+$xi7 ?></td>
                <td><?php echo $xb8+$xv8+$xi8 ?></td>
                <td><?php echo $xb9+$xv9+$xi9 ?></td>
                <td><?php echo $xb10+$xv10+$xi10 ?></td>
                <td><?php echo $xb11+$xv11+$xi11 ?></td>
                <td><?php echo $xb12+$xv12+$xi12 ?></td>
                <td><?php echo $xbriit+$xvisionet+$xindopay ?></td>
            </tr>
        </tfoot>
    </table>
    <?php } ?>
</div>