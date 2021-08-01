@include('sales.layouts.header')
<div style="justify-content: center; align-content:center; width:90%;">
  <div class="container">
    <div class="content" style="margin:auto">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10">
            <div class="card">
              <div class="card-header card-header-primary bg-info">
                <h4 class="card-title">{{$customer['name']}}</h4>
                <p class="card-category">Update Customer's Profile</p>
              </div>
              <div class="card-body" style="width:100%">
                <form method="POST">
                    @csrf

                  <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">ID</label>
                          <input type="text" class="form-control" name="cus_id" value={{$customer['id']}} disabled>
                        </div>
                      </div>
                    <div class="col-md-5">
                      <div class="form-group">
                        <label class="bmd-label-floating">Full Name</label>
                        <input type="text" class="form-control" name="cus_name" value="{{$customer['name']}}">
                        <span style="font-weight: bold" class="text-danger">{{$errors->first('cus_name')}}</span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="bmd-label-floating">First Purchase</label>
                        <input type="text" class="form-control" value="{{$customer['first_purchase']}}" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Phone Number</label>
                        <input type="text" class="form-control" name="cus_phone" value="{{$customer['phone']}}">
                        <span style="font-weight: bold" class="text-danger">{{$errors->first('cus_phone')}}</span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Email address</label>
                        <input type="text" class="form-control" name="cus_email" value="{{$customer['email']}}">
                        <span style="font-weight: bold" class="text-danger">{{$errors->first('cus_email')}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Delivery To</label>
                        <textarea rows="3"name="cus_del"  class="form-control">{{$customer['delivery_point']}}</textarea>
                        <span style="font-weight: bold" class="text-danger">{{$errors->first('cus_del')}}</span>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-info">Update Profile</button>
                  <button type="button" class="btn btn-info" onclick="document.location='{{route('sales.profile.edit.password')}}'">Change Password</button>
                  {{-- <span style="font-weight: bold" class="text-danger">{{session('msg')}}</span> --}}
                  <div class="clearfix"></div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('sales.layouts.footer')