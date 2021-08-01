@include('finance.layouts.header')
<div style="padding-top:80px;">
    <table>
        <tr>
            <td align="center" style="padding:20px;">
                @include('finance.layouts.paymentoptions')
            </td>
            <td align="center" style="padding:20px;">
            </td>
            <td align="center">
            <div class="card border-warning mb3" style="height:600px;width:1100px">
                <div class="card-header">Payment - History</div>
                    <div class="card-body scroll-box">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th scope="col">#SR</th>
                                <th scope="col">Type (Debit/Credit)</th>
                                <th scope="col">Amount</th>
                            </tr>
                            @foreach ($payment_history as $payment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$payment->type}}</td>
                                <td>{{$payment->amount}}</td>
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