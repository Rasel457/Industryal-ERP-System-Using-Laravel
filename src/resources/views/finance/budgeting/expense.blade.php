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
                <div class="card-header">Budgeting - Expense</div>
                <div class="card-body scroll-box">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <td align="left" style="padding-bottom:10px;">Type: </td>
                                <td align="left" style="padding-bottom:10px;">
                                <select class="form-control" name="type" id="type">
                                                    <option value="Purchases" selected>Purchases</option>
                                                    <option value="Salaries">Salaries</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                <span id="err_type" style="color:red;">{{$errors->first('type')}}</span></td>
                            </tr>
                            <tr>
                                <td align="left" style="padding-bottom:10px;">Amount: </td>
                                <td align="left" style="padding-bottom:10px;"><input class="form-control" type="number" name="amount" id="amount" placeholder="Amount" value="{{old('amount')}}"><span id="err_amount" style="color:red;">{{$errors->first('amount')}}</span></td>
                            </tr>
                        </table>
                    </div>
                    </div>
                <div class="card-footer"><input type="submit" name="submit-button" class="btn btn-success" value="Add"></div>
                </div>
                </form>
            </td>
        </tr>
    </table>
</div>
@include('finance.layouts.footer')