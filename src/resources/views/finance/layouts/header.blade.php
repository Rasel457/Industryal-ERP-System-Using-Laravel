<html>
    <head>
        <title>Industryal - Finance & Accounting</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ url('css/styles.css') }}">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top dropshadow">
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <div class="navbar-brand">
                    <h1 class="text-white"><i>Industryal</i></h1>
                </div>
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item"><a class="nav-link" href="{{route('finance.dashboard.index')}}">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('finance.invoice.index')}}">Invoice</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('finance.payments.index')}}">Payments</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('finance.reports.index')}}">Reports</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('finance.budgeting.index')}}">Budgeting</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('finance.leaverequest.index')}}">Leave Request</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('finance.chat.index')}}">Chats</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('finance.importexport.index')}}">Import/Export</a></li>
                    </ul>
                <div class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="btn btn-outline-info" href="{{route('finance.profile.index')}}" style="color:white;"><i class="fas fa-address-card"></i> Profile</a></li>
                    <span style="padding-right:5px;"></span>
				    <li class="nav-item"><a class="btn btn-outline-danger" href="{{route('signin.index')}}" style="color:white;"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                </div>
            </div>
        </nav>