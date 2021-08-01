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
            <div class="card border-warning mb3" style="height:600px;width:1100px">
                <div class="card-header">Import/Export History</div>
                    <div class="card-body scroll-box">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th scope="col">#SR</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                                <th scope="col">Download</th>
                            </tr>
                            @foreach ($import_history as $import)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$import->date}}</td>
                                <td>{{$import->action}}</td>
                                @if($import->action=='Export')
                                <td><a class="btn btn-primary" href="{{ url('upload/Finance/Export/'.$import->file) }}" download>Download</a></td>
                                @endif
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