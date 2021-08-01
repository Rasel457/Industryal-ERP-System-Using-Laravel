@include('finance.layouts.header')
<center>
<table>
    <tr>
        <td style="padding-top:100px;">
        <div class="card" style="height:600px;width:600px;">
            <img class="card-img-top" src="{{ asset('upload/Users/'.$user_finance->profile_pic) }}" alt="Card image cap" style="height:100px;width:100px">
            <div class="card-body">
                <h5 class="card-title">{{$user_finance->firstname." ".$user_finance->lastname}}</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Username: {{$user_finance->username}}</li>
                <li class="list-group-item">Email: {{$user_finance->email}}</li>
                <li class="list-group-item">Phone: {{$user_finance->phone}}</li>
                <li class="list-group-item">Position: {{$user_finance->position}}</li>
                <li class="list-group-item">Address: {{$user_finance->address}}</li>
                <li class="list-group-item">Gender: {{$user_finance->gender}}</li>
                <li class="list-group-item">Work Hour: {{$user_finance->work_hour}}</li>
            </ul>
        </div>
        </td>
        <td style="padding-top:100px;">
        <form action="" method="POST" enctype="multipart/form-data" style="padding:20px;">
        @csrf
                <table>
                    <tr>
                        <td align="center">
                            <div class="card border-success mb3 dropshadow">
                                <div class="card-header">Update Profile</div>
                                <div class="card-body">
                                    <table>
                                        <tr>
                                            <td align="left" style="padding-bottom:10px;">Profile Picture: </td>
                                            <td align="left" style="padding-bottom:10px;"><input class="form-control" type="file" name="pp" id="pp" accept="image/*" value="{{old('pp')}}"><span id="err_pp" style="color:red;">{{$errors->first('pp')}}</span></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center"><input class="btn btn-outline-success" type="submit" name="update_button" value="Update"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>
</center>
@include('finance.layouts.footer')