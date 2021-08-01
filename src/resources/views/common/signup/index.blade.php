<html>
    <head>
        <title>Industryal - Admin Registration</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../styles/lawyer_styles.css">
        <link rel="shortcut icon" href="{{ asset('assets/industryal-favicon.png') }}">
    </head>
    <body>
        <center>
            <form action="" method="POST" enctype="multipart/form-data" style="padding:20px;">
            @csrf
                <table>
                    <tr>
                        <td align="center">
                            <div class="card border-success mb3">
                                <div class="card-header">Register as Admin</div>
                                <div class="card-body">
                                    <table>
                                        <tr>
                                            <td align="left" style="padding-bottom:10px;">Profile Picture: </td>
                                            <td align="left" style="padding-bottom:10px;"><input class="form-control" type="file" name="pp" id="pp" accept="image/*" value="{{old('pp')}}"><span id="err_pp" style="color:red;">{{$errors->first('pp')}}</span></td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="padding-bottom:10px;">First Name: </td>
                                            <td align="left" style="padding-bottom:10px;"><input class="form-control" type="text" name="firstname" id="firstname" placeholder="First Name" value="{{old('firstname')}}"><span id="err_firstname" style="color:red;">{{$errors->first('firstname')}}</span></td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="padding-bottom:10px;">Last Name: </td>
                                            <td align="left" style="padding-bottom:10px;"><input class="form-control" type="text" name="lastname" id="lastname" placeholder="Last Name" value="{{old('lastname')}}"><span id="err_lastname" style="color:red;">{{$errors->first('lastname')}}</span></td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="padding-bottom:10px;">User Name: </td>
                                            <td align="left" style="padding-bottom:10px;"><input class="form-control" type="text" name="username" id="username" placeholder="User Name" value="{{old('username')}}"><span id="err_username" style="color:red;">{{$errors->first('username')}}</span></td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="padding-bottom:10px;">Email: </td>
                                            <td align="left" style="padding-bottom:10px;"><input class="form-control" type="text" name="email" id="email" placeholder="Email" value="{{old('email')}}"><span id="err_email" style="color:red;">{{$errors->first('email')}}</span></td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="padding-bottom:10px;">Phone: </td>
                                            <td align="left" style="padding-bottom:10px;"><input class="form-control" type="number" name="phone" id="phone" placeholder="Phone Number" value="{{old('phone')}}"><span id="err_phone" style="color:red;">{{$errors->first('phone')}}</span></td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="padding-bottom:10px;">Password: </td>
                                            <td align="left" style="padding-bottom:10px;"><input class="form-control" type="password" name="pass" id="pass" placeholder="Password"><span id="err_pass" style="color:red;">{{$errors->first('pass')}}</span></td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="padding-bottom:10px;">Confirm Password: </td>
                                            <td align="left" style="padding-bottom:10px;"><input class="form-control" type="password" name="pass_confirmation" id="pass_confirmation" placeholder="Confirm Password"><span id="err_pass_confirmation" style="color:red;">{{$errors->first('pass_confirmation')}}</span></td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="padding-bottom:10px;">Gender: </td>
                                            <td align="left" style="padding-bottom:10px;">
                                                <input type="radio" name="gender" id="gender-male" value="Male"> Male
                                                <input type="radio" name="gender" id="gender-female" value="Female"> Female
                                                <span id="err-gender" style="color:red;">{{$errors->first('gender')}}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="padding-bottom:10px;">Address: </td>
                                            <td align="left" style="padding-bottom:10px;"><input class="form-control" type="text" name="address" id="address" placeholder="Address" value="{{old('address')}}"><span id="err-address" style="color:red;">{{$errors->first('address')}}</span></td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="padding-bottom:10px;">Job Position: </td>
                                            <td align="left" style="padding-bottom:10px;"><input class="form-control" type="text" name="position" id="position" placeholder="Job Position" value="{{old('position')}}"><span id="err_position" style="color:red;">{{$errors->first('position')}}</span></td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="padding-bottom:10px;">Organization Name: </td>
                                            <td align="left" style="padding-bottom:10px;"><input class="form-control" type="text" name="org_name" id="org_name" placeholder="Your Organization Name" value="{{old('org_name')}}"><span id="err_org_name" style="color:red;">{{$errors->first('org_name')}}</span></td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="padding-bottom:10px;">Organization Fax: </td>
                                            <td align="left" style="padding-bottom:10px;"><input class="form-control" type="fax" name="fax" id="fax" placeholder="Fax" value="{{old('fax')}}"><span id="err_fax" style="color:red;">{{$errors->first('fax')}}</span></td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="padding-bottom:10px;">Organization EST: </td>
                                            <td align="left" style="padding-bottom:10px;"><input class="form-control" type="date" name="established" id="established"><span id="err_established" style="color:red;">{{$errors->first('established')}}</span></td>
                                        </tr>
                                        <tr>
                                            <td style="padding-bottom:20px;" colspan="2" align="center"><a href="{{route('signin.index')}}"><U>Already registered! Go to Signin.</U></a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center"><input class="btn btn-outline-success" type="submit" name="reg-button" value="Register"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </center>
    </body>
</html>