@include('sales.layouts.header')
<!-- Card -->
<div class="card">
    <div class="card-header white">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-6">
  
          <p class="text-uppercase small mb-2"><strong>Sales</strong></p>
          <h5 class="font-weight-bold mb-0">
            $4567
            <small class="text-success ml-2">
              <i class="fas fa-arrow-up fa-sm pr-1"></i>13,48%</small>
          </h5>
  
        </div>
        <!--Grid column-->
  
        <!--Grid column-->
        <div class="col-6 text-right">
  
          <button type="button" class="btn btn-primary btn-sm mt-2">Details</button>
  
        </div>
        <!--Grid column-->
  
      </div>
      <!--Grid row-->
    </div>
  
    <div class="card-body">
  
      <canvas id="lineChart"></canvas>
  
    </div>
  
    <div class="card-footer white">
  
      <!--Grid row-->
      <div class="row">
  
        <!--Grid column-->
        <div class="col-md-6">
  
          <div class="d-flex flex-wrap">
            <div class="select-outline position-relative w-100">
              <select class="mdb-select md-form md-outline">
                <option value="1">Today</option>
                <option value="2">Yesterday</option>
                <option value="3" selected>Last 7 days</option>
                <option value="4">Last 28 days</option>
                <option value="5">Last 90 days</option>
              </select>
              <label>Example label</label>
            </div>
          </div>
  
        </div>
        <!--Grid column-->
  
        <!--Grid column-->
        <div class="col-md-6">
  
          <div class="md-form md-outline">
            <input placeholder="Custom date" type="text" id="date-picker-example" class="form-control datepicker">
            <label for="date-picker-example">Unselected</label>
          </div>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </div>
  </div>
  <!-- Card -->
  @include('sales.layouts.footer')