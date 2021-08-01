@include('sales.layouts.header')
<span align="center" style="font-weight: bold;padding-left:150px;" class="text-success">{{session('successful')}}</span>
<table class="table table-hover table-bordered" style="width: 80%" align="center">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Customer ID</th>
        <th scope="col">Order Description</th>
        <th scope="col">Total Amount (BDT)</th>
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
        <td>{{$order->status}}</td>
        <td>{{$order->delivered_on}}</td>
        <td align="center">
          <a class="btn btn-info text-left" href="#">Update</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@include('sales.layouts.footer')