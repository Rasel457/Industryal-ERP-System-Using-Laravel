@include('finance.layouts.header')
<div style="padding-top:100px;">
<center>
    <table>
        <tr>
            <td align="left" style="padding:20px;">
            <div class="card border-warning mb3" style="height:300px;width:1120px">
                <div class="card-header">Organization</div>
                    <div class="card-body">
                    <table>
                            <tr>
                                <th>Name: </th>
                                <td>{{$organization->name}}</td>
                            </tr>
                            <tr>
                                <th>Email: </th>
                                <td>{{$organization->email}}</td>
                            </tr>
                            <tr>
                                <th>Phone: </th>
                                <td>{{$organization->phone}}</td>
                            </tr>
                            <tr>
                                <th>EST: </th>
                                <td>{{$organization->established}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td align="center" style="padding:20px;">
            <div class="card border-warning mb3" style="height:300px;width:250px">
                <div class="card-header">Product</div>
                    <div class="card-body">
                        <table>
                        @if($user_product)
                            <tr>
                                <th>Manager: </th>
                                <td>{{$user_product->firstname." ".$user_product->lastname}}</td>
                            </tr>
                            <tr>
                                <th>Email: </th>
                                <td>$user_product->email</td>
                            </tr>
                            <tr>
                                <th>Phone: </th>
                                <td>$user_product->phone</td>
                            </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </td>
            <td align="center" style="padding:20px;">
            <div class="card border-info mb3" style="height:300px;width:250px">
                <div class="card-header">Sales & Marketing</div>
                    <div class="card-body">
                    <table>
                    @if($user_sales)
                            <tr>
                                <th>Manager: </th>
                                <td>{{$user_sales->firstname." ".$user_sales->lastname}}</td>
                            </tr>
                            <tr>
                                <th>Email: </th>
                                <td>{{$user_sales->email}}</td>
                            </tr>
                            <tr>
                                <th>Phone: </th>
                                <td>{{$user_sales->phone}}</td>
                            </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </td>
            <td align="center" style="padding:20px;">
            <div class="card border-success mb3" style="height:300px;width:250px">
                <div class="card-header">HR</div>
                    <div class="card-body">
                    <table>
                    @if($user_hr)
                            <tr>
                                <th>Manager: </th>
                                <td>{{$user_hr->firstname." ".$user_hr->lastname}}</td>
                            </tr>
                            <tr>
                                <th>Email: </th>
                                <td>{{$user_hr->email}}</td>
                            </tr>
                            <tr>
                                <th>Phone: </th>
                                <td>{{$user_hr->phone}}</td>
                            </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </td>
            <td align="center" style="padding:20px;">
            <div class="card border-danger mb3" style="height:300px;width:250px">
                <div class="card-header">Finance</div>
                    <div class="card-body">
                    <table>
                    @if($user_finance)
                            <tr>
                                <th>Manager: </th>
                                <td>{{$user_finance->firstname." ".$user_finance->lastname}}</td>
                            </tr>
                            <tr>
                                <th>Email: </th>
                                <td>{{$user_finance->email}}</td>
                            </tr>
                            <tr>
                                <th>Phone: </th>
                                <td>{{$user_finance->phone}}</td>
                            </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</center>
</div>
@include('finance.layouts.footer')