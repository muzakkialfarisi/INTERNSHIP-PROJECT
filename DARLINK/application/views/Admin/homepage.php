<div class="container-fluid my-4">
  <div class="row">
    <div class="col-6">
      <div class="col text-center mb-4"><h6>Report Service</h6></div>
      <table class="table table-striped table text-center" style="font-size:13px">
        <thead style="background-color:#84142d" class="text-light">
          <tr >
            <td rowspan="2">Type</td>
            <td colspan="3">Status</td>
            <td rowspan="2">Jumlah</td>
          </tr>
          <tr>
            <td class="bg-success"><?php $key="s1"; echo "<a class='text-light' href='".site_url('admin/searchDashboard/'.$key.'')."'>Done</a>";?></td>
            <td class="bg-warning"><?php $key="s0"; echo "<a class='text-light' href='".site_url('admin/searchDashboard/'.$key.'')."'>Wait</a>";?></td>
            <td class="bg-secondary"><?php $key="s2"; echo "<a class='text-light' href='".site_url('admin/searchDashboard/'.$key.'')."'>Declined</a>";?></td>
          </tr>
        </thead>
        <tbody >
          <tr>
            <td><?php $key="migrasi"; echo "<a class='text-dark' href='".site_url('admin/searchDashboard/'.$key.'')."'>Migrasi</a>";?></td>
            <td><?php 
              $sql="SELECT count(*) as status from report_service where jenis = 'migrasi' and status = 1";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php $key="migrasi1"; echo "<a class='text-dark' href='".site_url('admin/searchDashboard/'.$key.'')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
            <td><?php 
              $sql="SELECT count(*) as status from report_service where jenis = 'migrasi' and status = 0";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php $key="migrasi0"; echo "<a class='text-dark' href='".site_url('admin/searchDashboard/'.$key.'')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
            <td><?php 
              $sql="SELECT count(*) as status from report_service where jenis = 'migrasi' and status = 2";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php $key="migrasi2"; echo "<a class='text-dark' href='".site_url('admin/searchDashboard/'.$key.'')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
            <td><?php 
              $sql="SELECT count(*) as status from report_service where jenis = 'migrasi'";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php $key="migrasi"; echo "<a class='text-dark' href='".site_url('admin/searchDashboard/'.$key.'')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
          </tr>
          <tr>
            <td><?php $key="normalisasi"; echo "<a class='text-dark' href='".site_url('admin/searchDashboard/'.$key.'')."'>Normalisasi</a>";?></td>
            <td><?php 
              $sql="SELECT count(*) as status from report_service where jenis = 'normalisasi' and status = 1";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php $key="normalisasi1"; echo "<a class='text-dark' href='".site_url('admin/searchDashboard/'.$key.'')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
            <td>
            <?php 
              $sql="SELECT count(*) as status from report_service where jenis = 'normalisasi' and status = 0";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php $key="normalisasi0"; echo "<a class='text-dark' href='".site_url('admin/searchDashboard/'.$key.'')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
            <td><?php 
              $sql="SELECT count(*) as status from report_service where jenis = 'normalisasi' and status = 2";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php $key="normalisasi2"; echo "<a class='text-dark' href='".site_url('admin/searchDashboard/'.$key.'')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
            <td>
            <?php 
              $sql="SELECT count(*) as status from report_service where jenis = 'normalisasi'";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php $key="normalisasi"; echo "<a class='text-dark' href='".site_url('admin/searchDashboard/'.$key.'')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
          </tr>
          <tr>
            <td><?php $key="osodp"; echo "<a class='text-dark' href='".site_url('admin/searchDashboard/'.$key.'')."'>Omset Service ODP</a>";?></td>
            <td><?php 
              $sql="SELECT count(*) as status from report_service where jenis = 'omset service odp' and status = 1";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php $key="osodp1"; echo "<a class='text-dark' href='".site_url('admin/searchDashboard/'.$key.'')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
            <td><?php 
              $sql="SELECT count(*) as status from report_service where jenis = 'omset service odp' and status = 0";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php $key="osodp0"; echo "<a class='text-dark' href='".site_url('admin/searchDashboard/'.$key.'')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
            <td><?php 
              $sql="SELECT count(*) as status from report_service where jenis = 'omset service odp' and status = 2";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php $key="osodp2"; echo "<a class='text-dark' href='".site_url('admin/searchDashboard/'.$key.'')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
            <td><?php 
              $sql="SELECT count(*) as status from report_service where jenis = 'omset service odp'";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php $key="osodp"; echo "<a class='text-dark' href='".site_url('admin/searchDashboard/'.$key.'')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
          </tr>
          <tr>
            <td><?php $key="pro"; echo "<a class='text-dark' href='".site_url('admin/searchDashboard/'.$key.'')."'>Provisioning</a>";?></td>
            <td><?php 
              $sql="SELECT count(*) as status from report_service where jenis = 'provisioning' and status = 1";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php $key="pro1"; echo "<a class='text-dark' href='".site_url('admin/searchDashboard/'.$key.'')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
            <td><?php 
              $sql="SELECT count(*) as status from report_service where jenis = 'provisioning' and status = 0";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php $key="pro0"; echo "<a class='text-dark' href='".site_url('admin/searchDashboard/'.$key.'')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
            <td><?php 
              $sql="SELECT count(*) as status from report_service where jenis = 'provisioning' and status = 2";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php $key="pro2"; echo "<a class='text-dark' href='".site_url('admin/searchDashboard/'.$key.'')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
            <td><?php 
              $sql="SELECT count(*) as status from report_service where jenis = 'provisioning'";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php $key="pro"; echo "<a class='text-dark' href='".site_url('admin/searchDashboard/'.$key.'')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
          </tr>
        </tbody>
        <tfoot style="background-color:#84142d" class="text-light">
          <tr >
            <td>Jumlah</td>
            <td><?php 
              $sql="SELECT count(*) as status from report_service where status = 1";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php $key="s1"; echo "<a class='text-light' href='".site_url('admin/searchDashboard/'.$key.'')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
            <td><?php 
              $sql="SELECT count(*) as status from report_service where status = 0";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php $key="s0"; echo "<a class='text-light' href='".site_url('admin/searchDashboard/'.$key.'')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
            <td><?php 
              $sql="SELECT count(*) as status from report_service where status = 2";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php $key="s2"; echo "<a class='text-light' href='".site_url('admin/searchDashboard/'.$key.'')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
            <td><?php 
              $sql="SELECT count(*) as status from report_service";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php echo "<a class='text-light' href='".site_url('admin/v_listreport_s')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
          </tr>
        </tfoot>
      </table>
    </div>
    
    
    <div class="col-6">
      <div class="col text-center mb-4"><h6>Report Feeder & Distribution</h6></div>
      <table class="table table-striped table text-center" style="font-size:13px">
        <thead style="background-color:#84142d" class="text-light">
          <tr >
            <td rowspan="2">Type</td>
            <td colspan="3">Status</td>
            <td rowspan="2">Jumlah</td>
          </tr>
          <tr>
            <td class="bg-success"><?php $key="co1"; echo "<a class='text-light' href='".site_url('admin/searchDashboard/'.$key.'')."'>Done</a>";?></td>
            <td class="bg-warning"><?php $key="co0"; echo "<a class='text-light' href='".site_url('admin/searchDashboard/'.$key.'')."'>Wait</a>";?></td>
            <td class="bg-secondary"><?php $key="co2"; echo "<a class='text-light' href='".site_url('admin/searchDashboard/'.$key.'')."'>Decline</a>";?></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?php $key="cof"; echo "<a class='text-dark' href='".site_url('admin/searchDashboard/'.$key.'')."'>CO Feeder</a>";?></td>
            <td><?php 
              $sql="SELECT count(*) as status from report_co where jenis = 'co feeder' and status =1 ";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php $key="cof1"; echo "<a class='text-dark' href='".site_url('admin/searchDashboard/'.$key.'')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
            <td><?php 
              $sql="SELECT count(*) as status from report_co where jenis = 'co feeder' and status =0 ";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php $key="cof0"; echo "<a class='text-dark' href='".site_url('admin/searchDashboard/'.$key.'')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
            <td><?php 
              $sql="SELECT count(*) as status from report_co where jenis = 'co feeder' and status =2 ";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php $key="cof2"; echo "<a class='text-dark' href='".site_url('admin/searchDashboard/'.$key.'')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
            <td><?php 
              $sql="SELECT count(*) as status from report_co where jenis = 'co feeder' ";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php $key="cof"; echo "<a class='text-dark' href='".site_url('admin/searchDashboard/'.$key.'')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
          </tr>
          <tr>
            <td><?php $key="cod"; echo "<a class='text-dark' href='".site_url('admin/searchDashboard/'.$key.'')."'>CO Distribution</a>";?></td>
            <td><?php 
              $sql="SELECT count(*) as status from report_co where jenis = 'co distribution' and status =1";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php $key="cod1"; echo "<a class='text-dark' href='".site_url('admin/searchDashboard/'.$key.'')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
            <td><?php 
              $sql="SELECT count(*) as status from report_co where jenis = 'co distribution' and status =0 ";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php $key="cod0"; echo "<a class='text-dark' href='".site_url('admin/searchDashboard/'.$key.'')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
            <td><?php 
              $sql="SELECT count(*) as status from report_co where jenis = 'co distribution' and status =2 ";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php $key="cod2"; echo "<a class='text-dark' href='".site_url('admin/searchDashboard/'.$key.'')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
            <td><?php 
              $sql="SELECT count(*) as status from report_co where jenis = 'co distribution'";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php $key="cod"; echo "<a class='text-dark' href='".site_url('admin/searchDashboard/'.$key.'')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
          </tr>
        </tbody>
        <tfoot style="background-color:#84142d" class="text-light">
          <tr >
            <td>Jumlah</td>
            <td><?php 
              $sql="SELECT count(*) as status from report_co where status = 1 ";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php $key="co1"; echo "<a class='text-light' href='".site_url('admin/searchDashboard/'.$key.'')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
            <td><?php 
              $sql="SELECT count(*) as status from report_co where status = 0 ";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php $key="co0"; echo "<a class='text-light' href='".site_url('admin/searchDashboard/'.$key.'')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
            <td><?php 
              $sql="SELECT count(*) as status from report_co where status =2 ";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php $key="co2"; echo "<a class='text-light' href='".site_url('admin/searchDashboard/'.$key.'')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
            <td><?php 
              $sql="SELECT count(*) as status from report_co ";
              $query = $this->db->query($sql);
              if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {?>
                   <?php echo "<a class='text-light' href='".site_url('admin/v_listreport_co/'.$key.'')."'>$row->status</a>";?>
              <?php }
              }
            ?></td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>