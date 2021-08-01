@include('finance.layouts.header')
<div style="padding-top:80px;">
    <table>
        <tr>
            <td align="center" style="padding:20px;">
                @include('finance.layouts.budgetingoptions')
            </td>
            <td align="center" style="padding:20px;">
            </td>
            <td align="center">
            <div class="card border-warning mb3" style="height:600px;width:1100px">
                <div class="card-header">Budgeting - Connected Banks</div>
                <div class="card-body scroll-box">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th scope="col">#SR</th>
                                <th scope="col">Bank Name</th>
                                <th scope="col">Account Holder Name</th>
                                <th scope="col">Balance</th>
                                <th scope="col">Disconnect</th>
                            </tr>
                            @foreach($banks as $bank)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$bank->name}}</td>
                                <td>{{$bank->holder_name}}</td>
                                <td>{{$bank->balance}}</td>
                                <td><a class="btn btn-outline-danger" href="/finance/budgeting/connectedbanks/{{$bank->id}}">Disconnect</a></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>
@include('finance.layouts.footer')