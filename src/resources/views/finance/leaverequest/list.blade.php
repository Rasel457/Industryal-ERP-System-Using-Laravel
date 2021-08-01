@include('finance.layouts.header')
<div style="padding-top:80px;">
    <table>
        <tr>
            <td align="center" style="padding:20px;">
                @include('finance.layouts.leaverequestoptions')
            </td>
            <td align="center" style="padding:20px;">
            </td>
            <td align="center">
            <div class="card border-warning mb3" style="height:600px;width:1100px">
                <div class="card-header">My Leave-Requests</div>
                <div class="card-body scroll-box">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th scope="col">#SR</th>
                                <th scope="col">Type</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Requested At</th>
                                <th scope="col">Status</th>
                                <th scope="col">Delete</th>
                            </tr>
                            @foreach ($leaves as $leave)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$leave->type}}</td>
                                <td>{{$leave->start_time}}</td>
                                <td>{{$leave->end_time}}</td>
                                <td>{{$leave->request_made}}</td>
                                <td>{{$leave->status}}</td>
                                <td><a  class="btn btn-outline-danger" href="/finance/leaverequest/new/{{$leave->id}}"> Delete </a></td>
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