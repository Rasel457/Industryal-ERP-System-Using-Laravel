@include('finance.layouts.header')
<div style="padding-top:80px;">
    <table>
        <tr>
            <td align="center" style="padding:20px;">
                @include('finance.layouts.budgetingoptions')
            </td>
            <td align="center" style="padding:20px;">
            </td>
            <td align="center">
            <form action="" method="post">
            @csrf
            <div class="card border-warning mb3" style="height:600px;width:1100px">
                <div class="card-header">Budgeting - Connect New Bank</div>
                <div class="card-body scroll-box">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <td align="left" style="padding-bottom:10px;">Bank Name: </td>
                                <td align="left" style="padding-bottom:10px;"><input class="form-control" type="text" name="name" id="name" placeholder="Bank Name" value="{{old('name')}}"><span id="err_name" style="color:red;">{{$errors->first('name')}}</span></td>
                            </tr>
                            <tr>
                                <td align="left" style="padding-bottom:10px;">Account Holder Name: </td>
                                <td align="left" style="padding-bottom:10px;"><input class="form-control" type="text" name="holder_name" id="holder_name" placeholder="Account Holder Name" value="{{old('holder_name')}}"><span id="err_holder_name" style="color:red;">{{$errors->first('holder_name')}}</span></td>
                            </tr>
                            <tr>
                                <td align="left" style="padding-bottom:10px;">Balance: </td>
                                <td align="left" style="padding-bottom:10px;"><input class="form-control" type="number" name="balance" id="balance" placeholder="Initial Balance" value="{{old('balance')}}"><span id="err_balance" style="color:red;">{{$errors->first('balance')}}</span></td>
                            </tr>
                            <tr>
                                <td align="left" style="padding-bottom:10px;">Account Number: </td>
                                <td align="left" style="padding-bottom:10px;"><input class="form-control" type="text" name="account_no" id="account_no" placeholder="Account No" value="{{old('account_no')}}"><span id="err_account_no" style="color:red;">{{$errors->first('account_no')}}</span></td>
                            </tr>
                        </table>
                    </div>
                    </div>
                <div class="card-footer"><input type="submit" name="submit-button" class="btn btn-success" value="Connect"></div>
                </div>
                </form>
            </td>
        </tr>
    </table>
</div>
@include('finance.layouts.footer')