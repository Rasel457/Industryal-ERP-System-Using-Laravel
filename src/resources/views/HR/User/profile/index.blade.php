<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
   <!--  Bootstrap cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
   
</head>
<body>
    <div class="container-fluid">
        <header class="border bg-dark m-0 p-1 fixed-top">
            <div class="row">
                <div class="col-9 ">
                    <h1 class="text-white  "><i>Industryal</i></h1>
                </div>
                
                <div class=" col-lg-3  ">
                    <ul class="nav justify-content-center ">
                        <li class="nav-item"><a class="nav-link text-white btn btn-outline-primary btn-block  mt-2" href="{{route('HRhome.index')}}"><i class="fas fa-home"></i>Home</a></li>
                        <span style="padding-right:7px;"></span>
                        <li class="nav-item"><a class="nav-link text-white btn btn-outline-primary btn-block  mt-2" href="{{route('HRuserProfile.details')}}"><i class="fas fa-user"></i>Profile</a></li>
                        <span style="padding-right:7px;"></span>
                        <li class="nav-item"><a class="nav-link text-white btn btn-outline-primary btn-block mt-2" href="{{route('HRuserProfile.logout')}}"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
        </header>
    </div>    
    <br><br><br>
        <div class="row">
            <div class="col-2" >
                <nav class=" navbar border-dark w-25">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link btn btn-outline-success btn-block mt-2" href="{{route('HRuserProfile.profileEdit')}}">Edit Profile</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-outline-secondary btn-block mt-2" href="{{route('HRuserProfile.changePassword')}}">Change Password</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-outline-dark btn-block mt-2" href="{{route('HRuserProfile.uploadImage')}}">Upload Profile Pictute</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-10 ">
                
                <h1 class="text-center"><i class="fas fa-user"></i>Profile</h1>
                @if(session('msg'))
               <center> <div class="alert alert-success w-25">
                    <strong>{{session('msg')}}</strong> 
                </div>
                </center>
                @endif
             
                <center>
                <img src="/upload/Users/{{$userinfo['profile_pic']}}"  alt="{{$userinfo['profile_pic']}}" width="200" height="200">
                <br>
               
                    <table class="table table-hover w-75">
                        <tr>
                            <td>First Name</td>
                            <td>{{$userinfo['firstname']}}</td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td>{{$userinfo['lastname']}}</td>
                        </tr>
                        <tr>
                            <td>Job position</td>
                            <td>{{$userinfo['position']}}</td>
                        </tr>
                        
                        <tr>
                            <td>Phone No</td>
                            <td>{{$userinfo['phone']}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$userinfo['email']}}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{$userinfo['address']}}</td>
                        </tr>
                    </table>
                </center>    
            </div>
        </div>

    <!-- Footer Starts-->
    <footer id="main-footer" class="bg-primary text-white mt-5 p-2">
        <div class="container">
        <div class="row">
            <div class="col">
            <p class="lead text-center">
                Copyright &copy;
                <span >2021</span>
                Industryal
            </p>
            </div>
        </div>
        </div>
    </footer>
    <!-- Footer Ends -->
       
    
    
</body>
</html>