<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave request</title>
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
                    <h1 class="text-white"><i>Industryal</i></h1>
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
            <div class="col-10">
                <div class="info-section p-3 text-black my-5">
                    <div class="title text-center mb-3">
                        <h1 class="font-width-border"><i class="fad fa-house-leave"></i>Leave Request</h1>
                    </div>
                    <div class="border border-primary w-75   m-auto">
                        <form method="post" class="w-50 m-auto  " >
                        @csrf
                            
                            <div class="form-group">
                                <label>Type</label>
                                <select name="type" id="type" class="form-control" Value="{{old('type')}}">
                                    <option value="sick">Sick Leave</option>
                                    <option value="other">Other leave</option>
                                </select>
                                <span class="text-danger">{{$errors->first('type')}}</span>
                            </div>
                            
                            
                            
                            <div class="from-group">
                                <label>Start date</label>
                                <input type="date" class="form-control" id="startdate" name="start_date" Value="{{old('start_date')}}">
                                <span class="text-danger">{{$errors->first('start_date')}}</span>
                            </div>
                            <div class="from-group">
                                <label>End date</label>
                                <input type="date" class="form-control" id="startdate" name="end_date" Value="{{old('end_date')}}">
                                <span class="text-danger">{{$errors->first('end_date')}}</span>
                                
                            </div>
                            <div class="form-group">
                                <label>Descreption</label>
                                <textarea type="text" name="description" id="leave_description" class="form-control" Value="{{old('description')}}"></textarea>
                                <span class="text-danger">{{$errors->first('description')}}</span>
                            </div>
                            <div class="from-group">
                                <center><input class="btn btn-outline-primary btn-block w-50 mt-3" type="submit" value="Create Leave Request" style="color:tomato"></center> 
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
                        <p class="lead text-center"><b>
                            Copyright &copy;
                            <span >2021</span>
                            Industryal</b>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
       
    
    
</body>
</html>