@include('sales.layouts.header')
<div class="wrapper ">
  <div class="main-panel">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Edit Profile</h4>
                <p class="card-category">Complete your profile</p>
              </div>
              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Current Password</label>
                        <input type="text" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">New Password</label>
                        <input type="text" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Confirm New Password</label>
                        <input type="text" class="form-control">
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-info">Update Password</button>
                  {{-- <button type="button" class="btn btn-info" onclick="document.location='{{route('sales.profile.edit.password')}}'">Change Password</button> --}}
                  <div class="clearfix"></div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-profile">
              {{-- <div class="card-avatar">
                <a href="javascript:;">
                  <img class="img" src="../assets/img/faces/marc.jpg" />
                </a>
              </div>
              
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('sales.layouts.footer')
