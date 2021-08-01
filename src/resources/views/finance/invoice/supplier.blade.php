@include('finance.layouts.header')
<div style="padding-top:80px;">
    <table>
        <tr>
            <td align="center" style="padding:20px;">
                @include('finance.layouts.invoiceoptions')
            </td>
            <td align="center" style="padding:20px;">
            </td>
            <td align="center">
            <form action="" method="post">
            @csrf
            <div class="card border-warning mb3" style="height:600px;width:1100px">
                <div class="card-header">New Customer Invoice</div>
                <div class="card-body scroll-box">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <td align="left" style="padding-bottom:10px;">Title: </td>
                                <td align="left" style="padding-bottom:10px;"><input class="form-control" type="text" name="title" id="title" placeholder="Invoice Title" value="{{old('title')}}"><span id="err_name" style="color:red;">{{$errors->first('title')}}</span></td>
                            </tr>
                            <tr>
                                <td align="left" style="padding-bottom:10px;">Supplier Name: </td>
                                <td align="left" style="padding-bottom:10px;"><input class="form-control" type="text" name="name" id="name" placeholder="Supplier Name" value="{{old('title')}}"><span id="err_name" style="color:red;">{{$errors->first('name')}}</span></td>
                            </tr>
                            <tr>
                                <td align="left" style="padding-bottom:10px;">Select From Sales Order: </td>
                                <td></td>
                            </tr>
                            @foreach($salesorders as $salesorder)
                            <tr>
                                <td><input type="radio" name="order" id="order" value="{{$salesorder->id}}"> {{$salesorder->order_description}}</td>
                                <td>Amount: {{$salesorder->total_amount}}</td>
                            </tr>
                            @endforeach
                            <span id="err_name" style="color:red;">{{$errors->first('order')}}</span>
                        </table>
                    </div>
                    </div>
                <div class="card-footer"><input type="submit" name="submit-button" class="btn btn-success" value="Create"></div>
            </div>
            </form>
            </td>
        </tr>
    </table>
</div>
@include('finance.layouts.footer')