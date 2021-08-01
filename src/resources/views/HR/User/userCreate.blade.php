<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
    crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
   <!--  header -->
    <div class="container-fluid">
        <header class="border bg-dark m-0 p-1 fixed-top">
            <div class="row">
                <div class="col-9 ">
                    <h1 class="text-white  "><i>Industryal</i></h1>
                </div>
                
                <div class="col-lg-3 ">
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
       <!--  leftside -->
        <div class="row">
            <div class="col-2" >
                <nav class=" navbar border-dark w-25">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link btn btn-outline-primary btn-block mt-2" href="{{route('HRuser.create')}}">New user</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-outline-primary btn-block mt-2" href="{{route('HRuser.index')}}">User List</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-outline-primary btn-block mt-2" href="{{route('HRemployee.create')}}">New Employee</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-outline-primary btn-block mt-2" href="{{route('HRgroup.index')}}">Add group</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-outline-primary btn-block mt-2" href="{{route('HRemployee.emplist')}}">Employee List</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-outline-primary btn-block mt-2" href="{{route('HREmpSchedule.schedule')}}">Schedules</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-outline-primary btn-block mt-2" href="{{route('HRLeave.leave')}}">Leave Request</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-outline-primary btn-block mt-2" href="{{route('HRLeave.leaveList')}}">Leave Request List</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-outline-primary btn-block mt-2" href="{{route('HRexpense.report')}}">Expense Report</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-outline-primary btn-block mt-2" href="{{route('HRexpenseList.list')}}"> Expense  Report List</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-outline-primary btn-block mt-2" href="{{route('HRExStatistic.statistic')}}">Expense Statistic</a></li>                        
                        <li class="nav-item"><a class="nav-link btn btn-outline-primary btn-block mt-2" href="{{route('HRpayroll.show')}}">Payroll</a></li>
                    </ul>
                </nav>
            </div>
            <!-- middle column -->
            <div class="col-10">
                <div class="info-section p-3 text-black my-5">
                    <div class="title text-center mb-3">
                        <h3 class="font-width-border"><i class="far fa-plus-square"></i>New User</h3>
                    </div>
                    <div class="border border-primary w-75  m-auto">
                        <form method="post" class="w-50 m-auto"  enctype="multipart/form-data" >
                        @csrf
                           
                            <div class="form-group">
                                <label>First Name</label> 
                                <input type="txt" class="form-control" id="firstname" name="first_name" Value="{{old('first_name')}}" >
                                <span class="text-danger">{{$errors->first('first_name')}}</span>
                            </div>
                            <div class="form-group">
                                <label >Last Name</label> 
                                <input type="txt" class="form-control" id="lastname" name="last_name" Value="{{old('last_name')}}">
                                <span class="text-danger">{{$errors->first('last_name')}}</span>
                            </div>
                            <div class="from-group">
                                <label>User Name</label></td>
                                <input type="text" class="form-control" name="user_name" id="uname" Value="{{old('user_name')}}">
                                <span class="text-danger">{{$errors->first('user_name')}}</span>
                            </div>
                            <div class="from-group">
                                <label>Organization Id</label></td>
                                <input type="number" class="form-control" name="organization_id" id="organization_id" Value="{{old('organization_id')}}">
                                <span class="text-danger">{{$errors->first('organization_id')}}</span>
                            </div>
                            
                            <div class="form-group">
                                 <label>password</label>
                                <input type="password" class="form-control"  name="password" id="password" Value="{{old('password')}}">
                                <span class="text-danger">{{$errors->first('password')}}</span>
                            </div>
                            <div class="form-group">
                                 <label>Confirm password</label>
                                <input type="password" class="form-control"  name="confirm_password" id="password" Value="{{old('confirm_password')}}">
                                <span class="text-danger">{{$errors->first('confirm_password')}}</span>
                            </div>
                            <div class="from-group">
                                <label>Gender</label>
                                <input type="radio" name="gender" 
                                @if (isset($gender) && $gender=="male")
                                {{'checked'}} ;
                                @endif
                                value="male">Male
                                <input type="radio" name="gender" 
                                @if (isset($gender) && $gender=="female")  
                                {{'checked'}}
                                 @endif
                                value="female">Female
                                <span class="text-danger">{{$errors->first('gender')}}</span>
                            </div>
                            <div class="form-group">
                                <label>User Type</label>
                                <select name="user_type" id="super" class="form-control" Value="{{old('user_type')}}">
                                    <option value="product">Product manager</option>
                                    <option value="hr">HR manager</option>
                                    <option value="finance">Finance manager</option>
                                    <option value="sales">Sales manager</option>
                                </select>
                                <span class="text-danger">{{$errors->first('user_type')}}</span>
                            </div>
                            <div class="foem-group">
                                <label>Present address</label></td>
                                <input type="text" class="form-control" id="presentaddress" name="present_address" Value="{{old('present_address')}}">
                                <span class="text-danger">{{$errors->first('present_address')}}</span>
                            </div>
                            <div class="from-group">
                                 <label>Phone</label></td>
                                <input type="number" class="form-control" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" Value="{{old('phone')}}">
                                <span class="text-danger">{{$errors->first('phone')}}</span>
                            </div>
                            <div class="from-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="EmailId" name="email" Value="{{old('email')}}">
                                <span class="text-danger">{{$errors->first('email')}}</span>
                            </div>
                            <div class="from-group">
                                <label>Job Position</label> 
                                <input type="txt" class="form-control" id="position" name="job_position" Value="{{old('job_position')}}">
                                <span class="text-danger">{{$errors->first('job_position')}}</span>
                            </div>
                            <div class="form-group">
                                <label>Hour Worked(Per week)</label> 
                                <input type="txt" class="form-control" id="worked" name="hour_worked" Value="{{old('hour_worked')}}" >
                                <span class="text-danger">{{$errors->first('hour_worked')}}</span>
                            </div>
                            
                            <br>
                            <div class="from-group">
                            <td>Upload Image: </td>
                                <td colspan='2'>
                                    <input type="file" name="profile_image" Value="{{old('profile_image')}}">
                                    <span class="text-danger">{{$errors->first('profile_image')}}</span>
                                </td>
                                    
                            </div>
                            <div class="from-group">
                                <center><input class="btn btn-outline-primary btn-block w-50 mt-3" type="submit" value="Create User"></center>
                            </div>
                              
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>
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