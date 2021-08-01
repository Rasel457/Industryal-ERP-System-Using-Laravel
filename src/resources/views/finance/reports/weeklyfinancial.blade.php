<!DOCTYPE html>
<html>
<head>
<center>
    <title>Weekly Financial Report</title>
    </center>
</head>
<body>
<center>
    <h1>Weekly - Assets</h1>
    <table border="2">
    <tr>
        <th>Type</th>
        <th>Amount</th>
    </tr>
    @foreach($asset_weekly as $asset)
        <tr>
            <td>{{$asset->type}}</td>
            <td>{{$asset->amount}}</td>
        </tr>
        @endforeach
    </table>
    <br>
    <h1>Weekly - Expense</h1>
    <table border="2">
    <tr>
        <th>Type</th>
        <th>Amount</th>
    </tr>
    @foreach($expense_weekly as $expense)
        <tr>
            <td>{{$expense->type}}</td>
            <td>{{$expense->amount}}</td>
        </tr>
        @endforeach
    </table>
    <br>
    <h1>Weekly - Liability</h1>
    <table border="2">
    <tr>
        <th>Type</th>
        <th>Amount</th>
    </tr>
    @foreach($liability_weekly as $liability)
        <tr>
            <td>{{$liability->type}}</td>
            <td>{{$liability->amount}}</td>
        </tr>
        @endforeach
    </table>
</center>
</body>
</html>