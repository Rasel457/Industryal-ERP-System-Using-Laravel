@include('sales.layouts.header')
<div style="justify-content: center; align-content:center; width:90%;">
  <div class="container">
    <div class="content" style="margin:auto">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10">
            <div class="card">
              <div class="card-header card-header-primary bg-info">
                <h4 class="card-title"></h4>
                <p class="card-category">Add a Customer</p>
              </div>
              <div class="card-body" style="width:100%">
                <form method="POST">
                    @csrf

                  <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">ID</label>
                          <input type="text" class="form-control" name="cus_id" disabled value="{{$id}}">
                        </div>
                      </div>
                    <div class="col-md-5">
                      <div class="form-group">
                        <label class="bmd-label-floating">Full Name</label>
                        <input type="text" class="form-control" name="cus_name"}}">
                        <span style="font-weight: bold" class="text-danger">{{$errors->first('cus_name')}}</span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Phone Number</label>
                        <input type="text" class="form-control" name="cus_phone"]}}">
                        <span style="font-weight: bold" class="text-danger">{{$errors->first('cus_phone')}}</span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Email address</label>
                        <input type="text" class="form-control" name="cus_email">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Delivery To</label>
                        <textarea rows="3"name="cus_del"  class="form-control"></textarea>
                        <span style="font-weight: bold" class="text-danger"></span>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-info">Add Customer</button>
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