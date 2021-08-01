@include('finance.layouts.header')
<div style="padding-top:80px;">
    <table>
        <tr>
            <td align="center" style="padding:20px;">
                @include('finance.layouts.invoiceoptions')
            </td>
            <td align="center" style="padding:20px;">
            </td>
            <td align="center">
            <div class="card border-warning mb3" style="height:600px;width:1100px">
                <div class="card-header">Customer Invoices</div>
                    <div class="card-body scroll-box">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th scope="col">#SR</th>
                                <th scope="col">Date Created</th>
                                <th scope="col">Title</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Status</th>
                                <th scope="col">Download</th>
                                <th scope="col">Delete</th>
                            </tr>
                            @foreach ($invoices as $invoice)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$invoice->created_at}}</td>
                                <td>{{$invoice->title}}</td>
                                <td>{{$invoice->for_name}}</td>
                                <td>{{$invoice->status}}</td>
                                <td><a class="btn btn-primary" href="{{ url('upload/Finance/Invoices/'.$invoice->file) }}" download>Download</a></td>
                                <td><a  class="btn btn-outline-danger" href="/finance/invoice/{{$invoice->id}}"> Delete </a></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>
@include('finance.layouts.footer')