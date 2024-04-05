<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employment Exchange Card</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        .w-100 {
            width: 100% !important;
        }

        th {
            text-align: left;
            color:#242323;
        }

        .bg {
            background-color: #e8e8e8;
        }

        tr.table td {
            border-bottom: 1px solid #e8e8e8;
        }

        tr.both td {
            border-bottom: 1px solid #646464;
            border-top: 1px solid #646464;
        }
        td{
            font-weight: bold;
            color:black;
        }        
        .thead {
            background-color: #646464;
            color: #fff;
        }
    </style>
</head>

<body style="font-family: 'Poppins', sans-serif; font-size: 12px; line-height: 12px;">
    <table>
       
        <tbody>
            <tr style="text-align:center">
                
                <td style="width: 60%">
                    <img src="{{ public_path('images/pdf/emblem.png') }}" alt="national emblem"
                        style="width: 40px; height: 40px; margin-top: 10px;">
                    <div style="font-weight: bold; ">EMPLOYMENT REGISTRATION CARD</div>
                    <div style="font-weight: bold; ">PAYMENT RECEIPT</div>
                    
                    <div style="margin-bottom: 10px;">LESDE Dept., Govt. of Mizoram</div>
                    
                </td>
                
            </tr>
        </tbody>
    </table>

    <table>
        <tbody>
            <tr style="text-align:center;" class="both">


                <td style="padding: 5px 0; width: 30%; text-align: right; ">Employment No. {{ $info->employment_no }}
                <td style="padding: 5px 0; width: 40%">Date : {{ date('d M Y', strtotime($payment->created_at)) }}
                    {{-- {{ date('d M Y', strtotime($payment->created_at)) }}</td> --}}
                </td>
            </tr>
        </tbody>
    </table>
<br>
    <div class="bg" style="padding: 5px; margin-top: 10px;">
        Receipt Details
    </div>
<br>
    <table>
        <thead>
            <tr>
                <td>Full Name:</td>
                <th>{{ $info->full_name }}</th>
                
            </tr>
            <tr>
                <td>Order ID:</td>
                <th>{{ $payment->orderId }}</th>
                
            </tr>
            <tr>
                <td>Transection ID:</td>
                <th>{{ $payment->transactionId }}</th>
                
            </tr>
            <tr>
                <td>Amount:</td>
                <th>₹{{ $payment->amount }}</th>
                
            </tr>
            
        </thead>
    </table>
    <div style="padding: 5px; margin-top: 70px; float: right; text-align: center;">
        <img src="storage/{{ $signature->signature }}" style="width: 70px; height: 70px;" alt="signature"> <br>
        <span style="text-transform: uppercase;">({{ $signature->name }})</span> <br>
        Registering Authority <br>
        {{-- {{ $permanent->district->name }} District, {{ $permanent->state->name }} --}}
    </div>
    </div>
</body>

</html>
