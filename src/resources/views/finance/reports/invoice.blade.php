@include('finance.layouts.header')
<div style="padding-top:80px;">
    <table>
        <tr>
            <td align="center" style="padding:20px;">
                @include('finance.layouts.reportoptions')
            </td>
            <td align="center" style="padding:20px;">
            </td>
            <td align="center">
            <form action="" method="post">
            @csrf
            <div class="card border-warning mb3" style="height:600px;width:1100px">
                <div class="card-header">Invoice Reports</div>
                <div class="card-body scroll-box">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th scope="col">#SR</th>
                                <th scope="col">Type</th>
                                <th scope="col">Weekly</th>
                                <th scope="col">Monthly</th>
                            </tr>
                            @foreach($reports as $report)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$report->type}}</td>
                                <td><a class="btn btn-primary" href="{{ url('upload/Finance/Report/'.$report->weekly) }}" download>Download</a></td>
                                <td><a class="btn btn-primary" href="{{ url('upload/Finance/Report/'.$report->monthly) }}" download>Download</a></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    </div>
                    <div class="card-footer"><input type="submit" name="submit-button" class="btn btn-success" value="Generate"></div>
            </div>
            </form>
            </td>
        </tr>
    </table>
</div>
@include('finance.layouts.footer')