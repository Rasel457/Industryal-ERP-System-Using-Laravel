@include('finance.layouts.header')
<div style="padding-top:80px;">
    <table>
        <tr>
            <td align="center" style="padding:20px;">
                @include('finance.layouts.importexportoptions')
            </td>
            <td align="center" style="padding:20px;">
            </td>
            <td align="center">
            <form action="" method="post">
            @csrf
            <div class="card border-warning mb3" style="height:600px;width:1100px">
                <div class="card-header">Export</div>
                    <div class="card-body">
                        <h1 align="center" style="color:green; font-size:20px;">These Data Will be Exported</h1><br><br>
                        <table class="table table-striped">
                           <tr>
                                <th>Assets</th>
                           </tr>
                           <tr>
                                <th>Liabilities</th>
                           </tr>
                           <tr>
                                <th>Expenses</th>
                           </tr>
                           <tr>
                                <th>Import/Export History</th>
                           </tr>
                           <tr>
                                <th>Invoices</th>
                           </tr>
                           <tr>
                                <th>Leave Requests</th>
                           </tr>
                        </table>
                    </div>
                <div class="card-footer"><input type="submit" name="submit-button" class="btn btn-success" value="Export"></div>
                </div>
                </form>
            </td>
        </tr>
    </table>
</div>
@include('finance.layouts.footer')