<!DOCTYPE html>
<html>
<head>
<center>
    <title>Monthly Financial Report</title>
    </center>
</head>
<body>
<center>
    <h1>Monthly - Assets</h1>
    <table border="2">
    <tr>
        <th>Type</th>
        <th>Amount</th>
    </tr>
    @foreach($asset_monthly as $asset)
        <tr>
            <td>{{$asset->type}}</td>
            <td>{{$asset->amount}}</td>
        </tr>
        @endforeach
    </table>
    <br>
    <h1>Monthly - Expense</h1>
    <table border="2">
    <tr>
        <th>Type</th>
        <th>Amount</th>
    </tr>
    @foreach($expense_monthly as $expense)
        <tr>
            <td>{{$expense->type}}</td>
            <td>{{$expense->amount}}</td>
        </tr>
        @endforeach
    </table>
    <br>
    <h1>Monthly - Liability</h1>
    <table border="2">
    <tr>
        <th>Type</th>
        <th>Amount</th>
    </tr>
    @foreach($liability_monthly as $liability)
        <tr>
            <td>{{$liability->type}}</td>
            <td>{{$liability->amount}}</td>
        </tr>
        @endforeach
    </table>
</center>
</body>
</html>