@include('common.layouts.header')
<div style="padding-top:100px;">
<center>
    <table>
        <tr>
            <td align="center" style="padding:20px;">
            <div class="card border-warning mb3" style="height:300px;width:250px">
                <div class="card-header">Product</div>
                    <div class="card-body">
                        <table>
                            <tr>
                                <th>Manager: </th>
                                <td>{{$productManegerDetails['username']}}</td>
                            </tr>
                            <tr>
                                <th>Email: </th>
                                <td>{{$productManegerDetails['email']}}</td>
                            </tr>
                            <tr>
                                <th>Phone: </th>
                                <td>{{$productManegerDetails['phone']}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer"><a class="btn btn-info" href="{{route('productHome.index')}}">Control Panel</a></div>
                </div>
            </td>
            <td align="center" style="padding:20px;">
            <div class="card border-info mb3" style="height:300px;width:250px">
                <div class="card-header">Sales & Marketing</div>
                    <div class="card-body">
                    <table>
                            <tr>
                                <th>Manager: </th>
                                <td>John Doe</td>
                            </tr>
                            <tr>
                                <th>Email: </th>
                                <td>abc@def.com</td>
                            </tr>
                            <tr>
                                <th>Phone: </th>
                                <td>1234567</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer"><a class="btn btn-info" href="#">Control Panel</a></div>
                </div>
            </td>
            <td align="center" style="padding:20px;">
            <div class="card border-success mb3" style="height:300px;width:250px">
                <div class="card-header">HR</div>
                    <div class="card-body">
                    <table>
                            <tr>
                                <th>Manager: </th>
                                <td>{{$HrManager['username']}}</td>
                            </tr>
                            <tr>
                                <th>Email: </th>
                                <td>{{$HrManager['email']}}</td>
                            </tr>
                            <tr>
                                <th>Phone: </th>
                                <td>{{$HrManager['phone']}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer"><a class="btn btn-info" href="{{route('HRhome.index')}}">Control Panel</a></div>
                </div>
            </td>
            <td align="center" style="padding:20px;">
            <div class="card border-danger mb3" style="height:300px;width:250px">
                <div class="card-header">Finance</div>
                    <div class="card-body">
                    <table>
                            <tr>
                                <th>Manager: </th>
                                <td>John Doe</td>
                            </tr>
                            <tr>
                                <th>Email: </th>
                                <td>abc@def.com</td>
                            </tr>
                            <tr>
                                <th>Phone: </th>
                                <td>1234567</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer"><a class="btn btn-info" href="#">Control Panel</a></div>
                </div>
            </td>
        </tr>
    </table>
</center>
@include('common.layouts.header')