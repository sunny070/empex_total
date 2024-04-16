<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Report</title>
      </head>
<body>
    <table>
        <thead>
            <tr>
                <th>Serial Number</th>
                <th>Name</th>
                <th>Category</th>
                <th>Qualification</th>
                <th>Gender</th>
                <th>User ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
            <tr>
                <td>{{ $row['Serial Number'] }}</td>
                <td>{{ $row['Name'] }}</td>
                <td>{{ $row['Category'] }}</td>
                <td>{{ $row['Qualification'] }}</td>
                <td>{{ $row['Gender'] }}</td>
                <td>{{ $row['User ID'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
