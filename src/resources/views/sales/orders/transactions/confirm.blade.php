@include('sales.layouts.header')
<div style="padding-top:100px;"></div>
<table width="80%" align="center">
  <tr>
    <td colspan="2" align="center">
      <div>
        <div class = "panel-heading">
          {{-- {{$id}} --}}
          <h3 class = "panel-title">Would you like to create an Order for an existing Customer?</h3>
        </div>
      </div>
    </td>
  </tr>
  <tr>
    <td style="width:50%;padding:15px;padding-left:115px;" align="center">
      <form action="" method="GET">
        <input type="submit" value="Yes" class="btn btn-info text-left" style="font-size:25px;padding-left:20px;padding-right:20px;border-radius:18px;">
        <div style="padding-top:20px;">
        <label>Please enter the Customer's ID:</label>
          <input type="text" name="cus_id">
        </form>
      </div>
    </td>
    <td style="width:50%;padding:15px;padding-right:115px;" align="center">
      <a class="btn btn-info text-left" style="font-size:25px;padding-left:20px;padding-right:20px;border-radius:18px;"  href="../../customers/create">No</a>
      <div style="padding-top:40px;">
        <label for="">Create a New Customer</label>
        <form action="" method="POST">
          <input type="text" hidden>
        </form>
      </div>
    </td>
  </tr>
</table>
@include('sales.layouts.footer')