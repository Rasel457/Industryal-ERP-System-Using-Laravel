@include('sales.layouts.header')
    <div class="row" style="max-width: 100%; overflow-x: hidden;">
      <div class="col-md-6 sticky-top">
        <div class="container">
          <div class="content" style="margin:auto">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header card-header-primary bg-info">
                      <h4 class="card-title"></h4>
                      <p class="card-category" style="font-size: 15px;font-weight:bold;color:rgb(5, 26, 83)">Create a New Order</p>
                    </div>
                    <div class="card-body" style="width:100%">
                      <form method="POST">
                          @csrf
                        <div class="row">
                          <div class="col-md-3">
                              <div class="form-group">
                                <label class="bmd-label-floating">Customer ID</label>
                                <input type="text" class="form-control" name="cus_id" value={{$id}} disabled>
                              </div>
                            </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="bmd-label-floating">First Purchase</label>
                              <input type="text" class="form-control" value="{{$first_purchase}}" disabled>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="bmd-label-floating">Order Description</label>
                              <input name="order_des" class="form-control"></input>
                              <span style="font-weight: bold" class="text-danger">{{$errors->first('order_des')}}</span>
                            </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-info">Add Order</button>
                        <div class="clearfix"></div>
                        <input type="number" name="sum_total" id="sum_total" hidden/>
                      </form>
                    </div>
                  </div>
                  <div style=" height:200px; overflow-y:scroll">
                    <table id="productTable" class="table table-hover table-bordered">
                      <tr>
                        <th>
                          #
                        </th>
                        <th>
                          Product
                        </th>
                        <th>
                          Price
                        </th>
                      </tr>
                      <tr>
                        <td>
                          Dummy
                        </td>
                        <td>
                          Dummy
                        </td>
                        <td>
                          Dummy
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6" style="width:500px; height:545px; overflow-y:scroll ">
        <table class="table table-hover table-bordered" style="width: 100%" align="center">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Product</th>
              <th scope="col">Price(BDT)</th>
              <th scope="col">Status</th>
              <th scope="col">Delivered On</th>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $key => $product)
            <tr>
              <tr>
                <th class="pid">{{$product->product_id}}</th>
                <td class="pname">{{$product->product_name}}</td>
                <td class="price">{{$product->selling_price}}</td>
                <td>{{$product->stock}}</td>
                <td>{{$product->warehouse_name}}</td>
                <td align="center">
                  <button class="btn btn-info text-left add" type="button" value="{{$product->product_id}}">Add to Cart</button>
                </td>
              </tr>
            </tr>
            @endforeach
            @for($i = 0; $i < 100; $i++)
                <tr>
                  <td>x</td>
                </tr>
            @endfor
          </tbody>
        </table>
      </div>
    </div>
    <script>
      let priceList = [];
      $(".add").click(function(){
        var $id = $(this).closest("tr").find(".pid").text();
        var $name = $(this).closest("tr").find(".pname").text();
        var $price = $(this).closest("tr").find(".price").text();

        priceList.push(parseInt($price));
        //console.log(priceList);

        var table = document.getElementById('productTable');
        var row = table.insertRow(1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        cell1.innerHTML = $id;
        cell2.innerHTML = $name;
        cell3.innerHTML = $price;
        var total = priceList.reduce(myFunc);
        document.getElementById('sum_total').value = total;
      });

      function myFunc(total, num){
        return total+num;
      }
    </script>
  {{-- </tr>
</table> --}}
@include('sales.layouts.footer')