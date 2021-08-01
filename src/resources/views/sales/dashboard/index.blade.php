
@include('sales.layouts.header')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.0/chart.min.js" integrity="sha512-JxJpoAvmomz0MbIgw9mx+zZJLEvC6hIgQ6NcpFhVmbK1Uh5WynnRTTSGv3BTZMNBpPbocmdSJfldgV5lVnPtIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="container" style="height: 200px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 h-25">
                <div class="card bg-info order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Orders Received</h6>
                        <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i><span>486</span></h2>
                        <p class="m-b-0">Completed Orders<span class="f-right">351</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3">
                <div class="card bg-info order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Orders Received</h6>
                        <h2 class="text-right"><i class="fa fa-rocket f-left"></i><span>486</span></h2>
                        <p class="m-b-0">Completed Orders<span class="f-right">351</span></p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 col-xl-3">
                <div class="card bg-info order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Orders Received</h6>
                        <h2 class="text-right"><i class="fa fa-refresh f-left"></i><span>486</span></h2>
                        <p class="m-b-0">Completed Orders<span class="f-right">351</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3">
                <div class="card bg-info order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Orders Received</h6>
                        <h2 class="text-right"><i class="fa fa-credit-card f-left"></i><span>486</span></h2>
                        <p class="m-b-0">Completed Orders<span class="f-right">351</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="margin:auto;height:500px; width:800px;padding-left:100px">
    <canvas id="myChart"></canvas>
  </div>
  <script>
    let myChart = document.getElementById('myChart').getContext('2d');
    var phpData = Array.from({!! $amountsByMonth !!});
    
    var length = phpData.length;
    var sumData = [];

    for(var i=0 ; i<12; i++)
    {;
        if(i<length)
        {
            sumData[i] = (phpData[i]['total']);
        }
        else
        {
            sumData[i] = 0;
        }
    }
    console.log(sumData);

    let massPopChart = new Chart(myChart,{
      type:'bar',
      data:{
        labels:['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets:[{
          label:'By Month',
          data:[
            // x[0]['total'],
            // x[1]['total'],
            // x[2]['total'],
            // x[3]['total'],
            // x[4]['total'],
            sumData[0],
            sumData[1],
            sumData[2],
            sumData[3],
            sumData[4],
            sumData[5],
            sumData[6],
            sumData[7],
            sumData[8],
            sumData[9],
            sumData[10],
            sumData[11],
          ],
          backgroundColor:'rgb(115, 50, 168)'
        }]
      },
      options:{}
    });
  </script>
@include('sales.layouts.footer')