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

    <title>User | Activities</title>
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
                            <h4>Products</h4>
                            <a href="{{route('productCreate.index')}}" class="btn btn-outline-dark btn-sm mb-2">New Product</a> <br>
                            <a href="{{route('productList.index')}}" class="btn btn-outline-dark btn-sm mb-2">List</a> <br>
                            <a href="{{route('productListFaulty.index')}}" class="btn btn-outline-dark btn-sm mb-2">Faulty Products</a> <br>
                            <a href="{{route('productStocks.index')}}" class="btn btn-outline-dark btn-sm mb-2">Stocks</a> <br>
                            <a href="{{route('productTransfer.index')}}" class="btn btn-outline-dark btn-sm mb-2">Transfer Product</a> <br>
                            <a href="{{route('productStatistics.index')}}" class="btn btn-outline-dark btn-sm mb-2">Statistics</a> <br> <hr>
                        </div>
                        <div class="text-left mt-2">
                            <h4>Warehouse</h4>
                            <a href="{{route('warehouseCreate.index')}}" class="btn btn-outline-dark btn-sm mb-2">New Warehouse</a> <br>
                            <a href="{{route('warehouseList.index')}}" class="btn btn-outline-dark btn-sm mb-2">List</a> <br>
                            <a href="{{route('warehouseStatistics.index')}}" class="btn btn-outline-dark btn-sm mb-2">Statistics</a> <br> <hr>
                        </div>
                        <div class="text-left mt-2">
                            <h4>Others</h4>
                            <a href="{{route('userLeave.index')}}" class="btn btn-outline-dark btn-sm mb-2">Leave Request</a> <br>
                            <a href="{{route('userActivities.index')}}" class="btn btn-outline-dark btn-sm mb-2">Activities</a> <br>
                            <a href="{{route('userAdministration.index')}}" class="btn btn-outline-dark btn-sm mb-2">Administration</a> <br>
                        </div>
                    </div>
                <div class="col-12 col-lg-9 border border-dark rounded p-3">
                <div class="container">
                            <div class="row justify-content-center">
                                <h3><i class="fas fa-tasks"></i></i>&nbsp &nbsp Activities</h3>
                            </div>
                            <hr class="mb-4">
                            <form method="POST">
                                @csrf
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Search activity by type..." name="searchActivities" id="search-activities">
                                </div>
                            </form>
                            <br>
                            <table class="table table-bordered table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Type</th>
                                        <th>Description</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody id = "dynamic-row">
                                    @foreach($allActivities as $activity)
                                        <tr>
                                            <td>{{$activity->type}}</td>
                                            <td>{{$activity->description}}</td>
                                            <td>{{$activity->activity_time}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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


    <script type="text/javascript">
        $('body').on('keyup', '#search-activities', function(){
            var searchQuery = $(this).val();

            $.ajax({
                method:"POST",
                url:'{{route("userActivities.searchActivity")}}',
                dataType:'json',
                data:{
                    '_token': '{{ csrf_token()}}',
                    searchQuery : searchQuery
                },
                success: function(response){
                    var tableRow = '';
                    $('#dynamic-row').html('');
                    $.each(response, function(index, value){   
                        tableRow = '<tr><td>'+value.type+'</td><td>'+value.description+'</td><td>'+value.activity_time+'</td></tr>';

                        $('#dynamic-row').append(tableRow);
                    });
                }
            });
        });
    </script>


</body>
</html>