<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Report</title>
</head>

<body>
    {{-- <table>
        <tr>
            <th colspan="8">
                REPORT OF EMPLOYMENT STATISTICS OF {{ $district }} DISTRICT EMPLOYMENT EXCHANGE
            </th>
        </tr>
        <tr>
            <td rowspan="2">Sl. No</td>
            <td rowspan="2">Category</td>
            <td rowspan="2">Subject</td>
            <td rowspan="2">Total</td>
            <td colspan="2">Lapsed</td>
            <td rowspan="2">Total</td>
            <td colspan="2">Placed</td>
            <td rowspan="2">Total</td>
            <td colspan="2">Live Register</td>
            <td rowspan="2">Total</td>
          </tr>
          
    </table> --}}

{{ $users }}
    <table>
        <thead>
            <tr>

                <th colspan="8">
                    REPORT OF EMPLOYMENT STATISTICS OF {{ $district }} DISTRICT EMPLOYMENT EXCHANGE
                </th> 
            </tr>
           
            <tr>
                <th>Sl. No</th>
                <th>Full Name</th>
                <th>Phone No. </th>
                <th>Gender</th>
                <th>Employment Number</th>
                <th>Validity From</th>
                <th>Validity To</th>
                <th>District</th>
                <!-- Add more columns based on your BasicInfo model -->
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->full_name }}</td>
                    <td>{{ $user->phone_no }}</td>
                    <td>{{ $user->gender }}</td>
                    <td>{{ $user->employment_no }}</td>
                    <td>{{ $user->card_valid_from->format('d-m-Y') }}</td>
                    <td>{{ $user->card_valid_till->format('d-m-Y') }}</td>
                    <td>{{ $user->district->name }}</td>
                    <!-- Add more columns based on your BasicInfo model -->
                </tr>
            @empty
                <tr>
                    <td colspan="3">No data available</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>