<!DOCTYPE html>
<html>
<head>
<center>
    <title>Invoice</title>
    </center>
</head>
<body>
<center>
    <h1>Invoice: {{ $title }}</h1>
    <p>Date Created: {{ $date }}</p>
    <table border="2">
        <tr>
            <th>{{$type}}: {{$for_name}}</th>
            <td></td>
        </tr>
        <tr>
            <th>Description: </th>
            <td>{{$desc}}</td>
        </tr>
        <tr>
            <th>Total Amount: </th>
            <td>{{$amount}}</td>
        </tr>
    </table>
</center>
</body>
</html>