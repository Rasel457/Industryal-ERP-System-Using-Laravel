@include('sales.layouts.header')
<div style="width:100%;padding-left:300px;">
  <div class="container">
    <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">
        <h3>Search for Order:</h3>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <input type="text" class="form-controller" id="search" name="search" placeholder="Enter order ID"></input>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<span align="center" style="font-weight: bold;padding-left:150px;" class="text-success">{{session('successful')}}</span>
<table class="table table-hover table-bordered" style="width: 80%" align="center">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Customer ID</th>
        <th scope="col">Order Description</th>
        <th scope="col">Total Amount (BDT)</th>
        <th scope="col">Order Made</th>
        <th scope="col">Status</th>
        <th scope="col">Delivered On</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($orders as $order)
      <tr>
        <th scope="row">{{$order->id}}</th>
        <td scope="row">{{$order->customer_id}}</td>
        <td>{{$order->order_description}}</td>
        <td>{{$order->total_amount}}</td>
        <td>{{$order->order_made}}</td>
        <td>{{$order->status}}</td>
        <td>{{$order->delivered_on}}</td>
        <td align="center">
          <a class="btn btn-info text-left" href="#">Update</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <script type="text/javascript">
    $('#search').on('keyup',function(){
      $value=$(this).val();
      $.ajax({
          type : 'get',
          url : '{{URL::to('sales/orders/list/search')}}',
          data:{'search':$value},
          success:function(data){
          $('tbody').html(data);
        }
      });
    })
    </script>
@include('sales.layouts.footer')