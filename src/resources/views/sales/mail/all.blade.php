@include('sales.layouts.header')
<table border="1px">
    <tr>
        <td align="center" style="padding:20px; font-size:15px">
            <div class="card border-warning mb3" style="height:400px;width:250px">
                <div class="card-header"><b>Customer E-mail</b></div>
                    <div class="card-body">
                        <div class="btn-group-vertical w-75">
                            <a class="btn btn-info active text-left" href="{{route('sales.mail.all')}}">All</a>
                            <a class="btn btn-info text-left" href="{{route('sales.mail.sent')}}">Sent</a>
                            <a class="btn btn-info text-left" href="{{route('sales.mail.received')}}">Received</a>
                            <a class="btn btn-info text-left" href="{{route('sales.mail.spam')}}">Spam</a>
                            <a class="btn btn-info text-left" href="{{route('sales.mail.send')}}">Compose</a>
                        </div>
                    </div>
                </div>
            </div>
        </td>
        <td style="background-color:#5bc0de;">
            <div class="container" style="padding:10px;"></div>
        </td>
        <td style="width:800px;padding-left:20px;padding-right:20px">
            <table class="table table-hover table-bordered" style="width: 100%" align="center">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" style="width:60px">From</th>
                    <th scope="col">Body</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($mails as $mail)
                <tr>
                    <th scope="row">{{$mail['id']}}</th>
                    <td scope="row">{{$mail['sent_from']}}</td>
                    <td scope="row">{{$mail['content']}}</td>
                    <td align="center">
                    <a class="btn btn-info text-left" href="send/{{$mail['id']}}">Read E-mail</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </td>
    </tr>
</table>
@include('sales.layouts.footer')