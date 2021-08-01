<!DOCTYPE html>
<html lang="en">
<head>
    <title>Industryal - Sales & Marketing</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('css/sales/style.css') }}">
    <link rel="icon" href="{{url('assets/industryal-logo.png')}}">
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top dropshadow">
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <div class="navbar-brand">
                <img src="{{asset('assets/industryal-logo.png')}}" height="20px" width="30px">
            </div>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{route('sales.dashboard.index')}}">Dashboard</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Analytics
                          </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('sales.stats.analytics.status')}}">Check Analytics</a>
                        <a class="dropdown-item" href="#">View Forecasting</a>
                        <a class="dropdown-item" href="{{route('sales.stats.analytics.status')}}">Status</a>
                        </div>
                        
                    </li>
                    <li class="nav-item dropdown">
                        {{-- <a class="nav-link" href="lawyer_meetings.php">Customers</a> --}}
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Orders
                          </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('sales.orders.transactions.confirm')}}">Place an Order</a>
                        <a class="dropdown-item" href="{{route('sales.orders.list')}}">Check Orders</a>
                        <a class="dropdown-item" href="{{route('sales.orders.list')}}">Check Transactions</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Check Products</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        {{-- <a class="nav-link" href="lawyer_meetings.php">Customers</a> --}}
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Customers
                          </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('sales.customers.list')}}">Check Customers</a>
                        <a class="dropdown-item" href="{{route('sales.mail.all')}}">Emails</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('finance.leaverequest.index')}}">Leave Request</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Chats</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Import/Export</a></li>
                </ul>
            <div class="navbar-nav ml-auto">
                
                <li class="nav-item dropdown">
                    <div class="btn-group" style="padding-right: 10px; padding-top:5px">
                        <button type="button" class="btn btn-outline-info" onclick="document.location='{{route('sales.profile.details.index')}}'">
                            <i class='fas fa-id-card' style="padding-right: 5px"></i>
                            {{session('username')}}
                        </button>
                        <button type="button" class="btn btn-outline-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('sales.profile.edit')}}">Edit Profile</a>
                            <a class="dropdown-item" href="#">Deactivate Account</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </div>
                </li>
                
                <span style="padding-right:5px; "></span>

                <li class="nav-item">
                    {{-- <a class="btn btn-outline-info" href="{{route('signin.index')}}" style="color:#5bc0de;padding-top:5px">Logout</a> --}}
                    <div style="padding-right: 5px; padding-top:5px" onclick="document.location='{{route('signin.index')}}'">
                    <button type="button" class="btn btn-outline-info" style="padding-top: 5px">Log Out</button>
                    </div>
                </li>
            </div>
        </div>
    </nav>
  <div style="padding-top: 50px"/>