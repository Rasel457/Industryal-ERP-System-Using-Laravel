<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- for bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous"> <!-- for fontawesome -->

    <title>User | Update</title>
</head>
<body>
    <!-- Header Starts -->
    <header>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-2">
            <div class="container">
            <a href="{{route('productHome.index')}}" class="navbar-brand">Industryal</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown mr-3">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <i class="fas fa-user"></i> &nbsp {{session('username')}}
                    </a>
                    <div class="dropdown-menu mt-2 ml-3 bg-light">
                    <a href="{{route('userProfile.index')}}" class="dropdown-item">
                        <i class="fas fa-user-circle"></i> Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('user.logout')}}" class="nav-link">
                    <i class="fas fa-user-times"></i> Logout
                    </a>
                </li>
                </ul>
            </div>
            </div>
        </nav>
    </header>
    <!-- Header Ends -->

    <!-- Main Body Starts -->
    <br><br><br>
    <main id="main ">
        <div class="">
            <div class="row mt-2 justify-content-around">
                <div class="col-12 col-lg-2 border border-dark bg-light rounded p-3">
                        <div class="text-left mt-2 rounded">
                            <img src="/upload/Users/{{$userDetails['profile_pic']}}" alt="{{$userDetails['profile_pic']}}" width="200" height="200">
                            <h4>{{$userDetails['username']}}</h4>
                            <a href="{{route('userEditProfile.index')}}" class="btn btn-primary btn-sm mb-2">Edit Profile</a> <br>
                            <a href="{{route('userEditProfilePicture.index')}}" class="btn btn-warning btn-sm mb-2">Update Profile Picture</a> <br>
                            <a href="{{route('userChangePassword.index')}}" class="btn btn-danger btn-sm mb-2">Change Password</a> <br>
                        </div>
                    </div>
                <div class="col-12 col-lg-9 border border-dark rounded p-3">
                        <div class="container">
                            <div class="row justify-content-center">
                                <h3><i class="fas fa-edit"></i> Edit Profile</h3>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <div class="container">
                            <div class="text-left">
                                <form method="POST">
                                    @csrf
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td >First Name: </td>
                                            <td>
                                                <input type="text" value="{{$userDetails['firstname']}}" class="form-control" name="firstname">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >Last Name: </td>
                                            <td > <input type="text" value
                                            ="{{$userDetails['lastname']}}" class="form-control" name="lastname"> </td>
                                        </tr>
                                        <tr>
                                            <td >Phone Number: </td>
                                            <td > <input type="text" value
                                            ="{{$userDetails['phone']}}" class="form-control" name="phone"> </td>
                                        </tr>
                                        <tr>
                                            <td >Email: </td>
                                            <td > <input type="email" value
                                            ="{{$userDetails['email']}}" class="form-control" name="email"> </td>
                                        </tr>
                                        <tr>
                                            <td >Address: </td>
                                            <td > <textarea name="address" id="" cols="30" rows="2" class="form-control">{{$userDetails['address']}}</textarea> </td>
                                        </tr>
                                        <tr>
                                            <td >Current Password: </td>
                                            <td > <input type="password" class="form-control" name="current_password">
                                            <span class="text-danger">{{$errors->first('current_password')}}</span>
                                            @if(session('msg'))
                                                <span class="text-danger">{{session('msg')}}</span>
                                            @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan='2' align='center'>
                                            <input type="submit" value="&#10003; &nbsp Save" class="btn btn-success" style="width:400px">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </main>
    <!-- Main Body Ends -->

  <!-- Footer Starts-->
    <footer id="main-footer" class="bg-dark text-white mt-5 p-3">
        <div class="container">
        <div class="row">
            <div class="col">
            <p class="lead text-center">
                Copyright &copy;
                <span id="year"></span>
                Industryal
            </p>
            </div>
        </div>
        </div>
    </footer>
    <!-- Footer Ends -->


  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
</body>
</html>