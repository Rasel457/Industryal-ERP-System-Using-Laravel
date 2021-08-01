<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update|Image</title>
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
            <div class="col-10">
                
                <h3 class="text-center"><i class="fas fa-edit"></i>Upload Profile Picture </h3>
                @if(session('msg'))
                <center>
                <div class="alert alert-success w-25">
                    <strong>{{session('msg')}}</strong> 
                </div>
                </center>
                @endif
                <hr>
                <div class=" w-100 m-auto">
                    <form method="post" class="w-50 m-auto" enctype="multipart/form-data" >
                    @csrf
                        <table class="table table-hover">
                            
                                 
                                <div class="from-group">
                                     <td>Upload Image: </td>
                                    <td colspan='2'>
                                        <input type="file" name="profile_image" >
                                         <span class="text-danger">{{$errors->first('profile_image')}}</span>
                                    </td>
                                </div>
                                <div class="from-group">    
                                    <tr>
                                        <td >Current Password: </td>
                                        <td > <input type="password" class="form-control" name="current_password" > <span class="text-danger">{{$errors->first('curr_password')}}</span> </td>
                                    </tr>
                                    
                                </div>
                                
                              <tr>
                                <td colspan='2' align='center'>
                                <input type="submit" value="Upload" class="btn btn-dark" style="width:400px">
                                </td>
                            </tr>
                        </table>    
                    </form>
                </div>
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