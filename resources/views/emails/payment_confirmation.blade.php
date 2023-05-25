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
        .header p {
            color: red;
            font-size: 25px;
            margin: 0;
            margin-top: 10px;
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
            <img src="{{ asset('images/logo-email.jpg') }}" alt="Logo" class="logo">
            <h1>Informationen zu Ihrer Reservierung </h1>
            <p>Pin Code: {{$rental->pincode}}</p>
        </div>

        <div class="invoice-details">
       

            <table>
                <thead>
                    <tr>
                        <th>Beschreibung</th>
                        <th>Wert</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nutzername:</td>
                        <td>{{$rental->user->name}}</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>{{$rental->user->email}}</td>
                    </tr>
                    <tr>
                        <td>Name des Schließfachs:</td>
                        <td>{{$rental->locker->locker_name}}</td>
                    </tr>
                    <tr>
                        <td>Locker Address:</td>
                        <td>{{$rental->locker->address}}</td>
                    </tr>
                    <tr>
                        <td>Türnummer:</td>
                        <td>{{$rental->door->door_number}}</td>
                    </tr>
                    <tr>
                        <td>Gültig ab:</td>
                        <td>{{$rental->start_time}}</td>
                    </tr>
                    <tr>
                        <td>Gültig bis:</td>
                        <td>{{$rental->end_time}}</td>
                    </tr>
                    <tr>
                        <td>Plan Name:</td>
                        <td>{{$rental->plan->name}}</td>
                    </tr>
                    <tr>
                        <td>Price:</td>
                        <td>{{$rental->price}}</td>
                    </tr>
                   
                </tbody>
            </table>
        </div>

        <p class="price">Pin Code: {{$rental->pincode}}</p>

        <p class="footer">Gute Rad-Fahrt wünscht Ihnen das Bike and Biketec Box Team!
            Bei Fragen zur Anlagennutzung oder zur Rechnung können Sie sich gerne über die im Impressum angegebenen Kontaktdaten an uns wenden.
            --
            Impressum:
            Betreiber Buchungsportal, Anwenderbetreuung / Betrieb und Wartung der Anlagen, Aussteller der Rechnung:
            Locktec GmbH
            Johann-Georg-Herzog-Strasse 19 • D-96369 Weissenbrunn, Deutschland
            Tel. 49 9261 6075 90 • Fax  +49 9261 6075 10
            info@locktec.com • www.biketec.de
            </p>
        
    </div>
</body>
</html>
