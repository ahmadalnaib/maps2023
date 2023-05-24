<!DOCTYPE html>
<html>
<head>
    <title>Rechnung für Miete</title>
    <style>
        /* Add your custom CSS styles for the invoice here */
        /* For example: */
        .invoice-container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .invoice-header img {
            width: 100px;
            height: auto;
        }
        .invoice-details {
            margin-bottom: 20px;
        }
        .invoice-section {
            background-color: #ffffff;
            padding: 10px;
            margin-bottom: 20px;
        }
        .invoice-section.gray {
            background-color: #f5f5f5;
        }
        .invoice-section::after {
            content: "";
            display: table;
            clear: both;
        }
        .invoice-section .section-left {
            float: left;
        }
        .invoice-section .section-right {
            float: right;
        }
        .invoice-section .section-left h4,
        .invoice-section .section-right h4 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <div class="invoice-header-left">
                {{-- <img src="{{ asset('/icons/a.jpg') }}" alt="Logo"> --}}
                BikeTec
            </div>
            <div class="invoice-header-right">
                <h2>Rechnung für Miete</h2>
                <p>Rechnungsnummer: {{ $rental->id }}</p>
                <p>Ausgabedatum: {{ now()->format('Y-m-d') }}</p>
            </div>
        </div>
        <div class="invoice-section">
            <div class="section-left">
                <h4>Rechnung an:</h4>
                <p>Name: {{$rental->user->name}}</p>
                <p>Email: {{$rental->user->email}}</p>
            </div>
            <div class="section-right">
                <h4>Rechnung von:</h4>
                <p> LockTec GmbH</p>
                <p>Address:Schließfachsysteme <br>
                    Johann-Georg-Herzog-Strasse 19 <br>
                    D-96369 Weissenbrunn</p>
            </div>
        </div>
        <div class="invoice-section gray">
            <div class="section-left">
                <h4>Schließfach:</h4>
                <p>Name: {{$rental->locker->locker_name}}</p>
                <p>Türnummer:{{$rental->door->door_number}}</p>
            </div>
            <div class="section-right">
                <h4>Preis:</h4>
                <p>{{$rental->price}}</p>
            </div>
        </div>
        <!-- Add more sections as needed -->
    </div>
</body>
</html>
