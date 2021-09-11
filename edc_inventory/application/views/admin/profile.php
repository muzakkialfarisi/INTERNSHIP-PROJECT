<div class="container">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <?php if ($this->session->flashdata('error')) : ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              Password <strong><?= $this->session->flashdata('error'); ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('success')) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              Password <strong><?= $this->session->flashdata('success'); ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
        <?php endif; ?>
      <form action="<?= site_url('admin/change_profile_process/').$this->session->userdata('username')?>" method="post">
        <div class="modal-header">
            <h5 class="modal-title">Change Password</h5>
        </div>
        <div class="modal-body" style="font-size:14px">                    
          <div class="form-row">
            <div class="form-group col-md">
                <label>Username</label>
                <input type="text" class="form-control form-control" name="username" disabled="" value="<?=$this->session->userdata("username")?>">
            </div>
          </div>
          <div class="form-row">
              <div class="form-group col-md-6">
                <label>New Password</label>
                <div class="input-group" id="show_hide_password">
                    <input type="password" class="form-control" required="" name="password" id="password">
                    <div class="input-group-append">
                        <span class="input-group-text"><a href="" class="fa fa-eye-slash" aria-hidden="true"></a></span>
                    </div>
                </div>
              </div>
              <div class="form-group col-md-6">
                <label>Confirm Password</label>
                <div class="input-group" id="show_hide_password">
                    <input type="password" class="form-control" required="" name="confirm_password" id="confirm_password">
                    <div class="input-group-append">
                        <span class="input-group-text"><a href="" class="fa fa-eye-slash" aria-hidden="true"></a></span>
                    </div>
                </div>
              </div>
              <div class="form-group col-md text-center">
                  <div id='message'></div>
              </div> 
          </div>
        </div>
        <div class="modal-footer">
            <?php
              if($this->session->userdata("tier")=="admin"){
                  echo '<a class="btn btn-secondary btn-sm text-light" href="'.site_url('edc').'">Back</a>';
              }else if($this->session->userdata("tier")=="maker"){
                echo '<a class="btn btn-secondary btn-sm text-light" href="'.site_url('maker').'">Back</a>';
              }
            ?>
            
            <button type="submit" class="btn btn-success btn-sm">Save</button>
        </div>
      </form>
      </div>
  </div>
</div>