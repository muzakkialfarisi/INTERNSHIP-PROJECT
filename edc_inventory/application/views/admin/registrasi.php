<div class="container">
  <div class="modal-dialog modal-lg" role="document" >
      <div class="modal-content" >
      <form action="<?= site_url('admin/signup_process')?>" method="post">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Registrasi</h5>
          </div>
          <div class="modal-body" style="font-size:14px">
            <?php if ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><?= $this->session->flashdata('error'); ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif; ?>
            <div class="form-row">
                <div class="form-group col-md">
                    <label>Username</label>
                    <input type="text" class="form-control " name="username" required>
                </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Password</label>
                <div class="input-group" id="show_hide_password">
                    <input type="password" class="form-control " required="" name="password" id="password">
                    <div class="input-group-append">
                        <span class="input-group-text"><a href="" class="fa fa-eye-slash" aria-hidden="true"></a></span>
                    </div>
                </div>
              </div>
              <div class="form-group col-md-6">
                <label>Confirm Password</label>
                <div class="input-group" id="show_hide_password">
                    <input type="password" class="form-control " required="" name="confirm_password" id="confirm_password">
                    <div class="input-group-append">
                        <span class="input-group-text"><a href="" class="fa fa-eye-slash" aria-hidden="true"></a></span>
                    </div>
                </div>
              </div>
              <div class="form-group col-md text-center">
                  <div id='message'></div>
              </div> 
            </div>
            <div class="form-row">
                <div class="form-group col-md">
                    <label>Tier</label>
                    <select class="form-control " name="tier" required="">
                        <option value="">Select...</option>
                        <option value="maker">Maker</option>
                        <option value="checker">Checker</option>
                        <option value="signer">Signer</option>
                    </select>
                </div>
            </div>
            
          <div class="modal-footer">
              <a class="btn btn-secondary btn-sm text-light" href="<?= site_url('admin')?>">Back</a>
              <button type="submit" class="btn btn-success btn-sm">Save</button>
          </div>
      </form>
      </div>
  </div>
</div> 
