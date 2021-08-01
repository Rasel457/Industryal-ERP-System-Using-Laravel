<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Edit</title>
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
                
                <h3 class="text-center"><i class="fas fa-user-edit"></i>Profile Edit</h3>
                <div class="border border-primary w-75  m-auto">
                    <form method="post" class="w-50 m-auto" >
                    @csrf
                           
                        <div class="form-group">
                            <label>First Name</label> 
                            <input type="txt" class="form-control" id="firstname" name="firstname" value="{{$userinfo['firstname']}}">
                            <span class="text-danger">{{$errors->first('firstname')}}</span>
                        </div>
                        <div class="form-group">
                            <label >Last Name</label> 
                            <input type="txt" class="form-control" id="lastname" name="lastname" value="{{$userinfo['lastname']}}">
                            <span class="text-danger">{{$errors->first('lastname')}}</span>
                        </div>
                        
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="number" class="form-control"  name="phone" id="phone" value="{{$userinfo['phone']}}">
                            <span class="text-danger">{{$errors->first('phone')}}</span>
                        </div>
                        <div class="from-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="EmailId" name="email" value="{{$userinfo['email']}}">
                            <span class="text-danger">{{$errors->first('email')}}</span>
                        </div>
                        <div class="foem-group">
                            <label>Present address</label></td>
                            <input type="text" class="form-control" id="presentaddress" name="address" Value="{{$userinfo['address']}}">
                            <span class="text-danger">{{$errors->first('address')}}</span>
                        </div>
                        <div class="from-group">
                            <center><input class="btn btn-outline-primary btn-block w-50 mt-3" type="submit" value="Update" style="color:tomato"></center>
                        </div>
                            
                    </form>
                </div>
                    
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