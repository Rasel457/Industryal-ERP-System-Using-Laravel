<html>
    <head>
        <title>Industryal - Forgot Password</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="shortcut icon" href="{{ asset('assets/industryal-favicon.png') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/styles.css') }}">
    </head>
    <body  style="padding-top:20px;">
        <center>
        <table>
            <tr>
                <form action="" method="post">
                @csrf
                <td align="center" style="padding:20px;">
                    <div id="step1" class="card border-success mb3 dropshadow" style="height:350px;width:250px">
                        <div class="card-header">Reset Password - Step 1</div>
                        <div class="card-body">
                            <input class="form-control" type="text" name="email" id="email" placeholder="Your Email" value="{{old('email')}}">
                            <span id="invalid_email" style="color:red;">{{$errors->first('email')}}</span>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-outline-warning" href="{{route('signup.index')}}">Cancel</a><span style="padding-right:10px"></span><input class="btn btn-success" type="submit" name="submit-button" value="Submit">
                        </div>
                    </div>
                </td>
                </form>
            </tr>
        </table>
        </center>
    </body>
</html>