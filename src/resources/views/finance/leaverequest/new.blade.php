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
            <form action="" method="post">
            @csrf
            <div class="card border-warning mb3" style="height:600px;width:1100px">
                <div class="card-header">New Leave-Request</div>
                <div class="card-body scroll-box">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <td align="left" style="padding-bottom:10px;">Leave Type: </td>
                                <td align="left" style="padding-bottom:10px;">
                                <select class="form-control" name="type" id="type">
                                                    <option value="Sick Leave" selected>Sick Leave</option>
                                                    <option value="Other Leave">Other Leave</option>
                                                </select>
                                <span id="err_type" style="color:red;">{{$errors->first('type')}}</span></td>
                            </tr>
                            <tr>
                                <td align="left" style="padding-bottom:10px;">Reason (Description): </td>
                                <td align="left" style="padding-bottom:10px;"><textarea class="form-control" name="request_description" id="request_description" rows="3" value="{{old('request_description')}}"></textarea><span id="err_leave_description" style="color:red;">{{$errors->first('request_description')}}</span></td>
                            </tr>
                            <tr>
                                <td align="left" style="padding-bottom:10px;">Start Date: </td>
                                <td><input class="form-control" type="date" name="start_time" id="start_time" value="{{old('start_time')}}"><span id="err_start_time" style="color:red;">{{$errors->first('start_time')}}</span></td>
                            </tr>
                            <tr>
                                <td align="left" style="padding-bottom:10px;">End Date: </td>
                                <td><input class="form-control" type="date" name="end_time" id="end_time" value="{{old('end_time')}}"><span id="err_end_time" style="color:red;">{{$errors->first('end_time')}}</span></td>
                            </tr>
                        </table>
                    </div>
                    </div>
                <div class="card-footer"><input type="submit" name="submit-button" class="btn btn-success" value="Request"></div>
            </div>
            </form>
            </td>
        </tr>
    </table>
</div>
@include('finance.layouts.footer')