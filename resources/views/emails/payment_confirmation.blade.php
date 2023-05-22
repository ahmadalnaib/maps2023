<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #333333;
            font-size: 28px;
            margin: 0;
        }

        .invoice-details {
            margin-bottom: 30px;
        }

        .invoice-details h2 {
            color: #666666;
            font-size: 20px;
            margin: 0 0 10px;
        }

        .invoice-details table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice-details th,
        .invoice-details td {
            padding: 10px;
            border-bottom: 1px solid #dddddd;
            text-align: left;
        }

        .invoice-details th {
            background-color: #f5f5f5;
        }

        .logo {
            display: block;
            max-width: 150px;
            margin: 0 auto 20px;
        }

        .price {
            font-size: 24px;
            font-weight: bold;
            color: #333333;
            text-align: center;
            margin-top: 20px;
        }

        .footer {
            text-align: center;
            color: #999999;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('/images/emaillogo.png') }}" alt="Logo" class="logo">
            <h1>Invoice</h1>
        </div>

        <div class="invoice-details">
            <h2>Invoice Details</h2>

            <table>
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>User Name:</td>
                        <td>{{$rental->user->name}}</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>{{$rental->user->email}}</td>
                    </tr>
                    <tr>
                        <td>Locker Name:</td>
                        <td>{{$rental->locker->locker_name}}</td>
                    </tr>
                    <tr>
                        <td>Door Number:</td>
                        <td>{{$rental->door->door_number}}</td>
                    </tr>
                    <tr>
                        <td>Start Time:</td>
                        <td>{{$rental->start_time}}</td>
                    </tr>
                    <tr>
                        <td>End Time:</td>
                        <td>{{$rental->end_time}}</td>
                    </tr>
                    <tr>
                        <td>Plan Name:</td>
                        <td>{{$rental->plan->name}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <p class="price">Price: {{$rental->price}}</p>

        <p class="footer">Thank you for using our service. If you have any questions, please feel free to contact us.</p>
    </div>
</body>
</html>
