<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome to Our Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333333;
        }

        h2 {
            color: #0066cc;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h2>Willkommen, {{ $name }}!</h2>
    <p>Vielen Dank, dass Sie sich unserer Bewerbung anschließen. Wir freuen uns, Sie an Bord zu haben.</p>
    <p>Hier sind Ihre Kontodaten:</p>
    <ul>
        <li><strong>Name:</strong> {{ $name }}</li>
        <li><strong>Email:</strong> {{ $email }}</li>
        <li><strong>Passwort:</strong> {{ $password }}</li>
    </ul>
    <p>Bitte behandeln Sie Ihre Kontoinformationen vertraulich und geben Sie sie nicht an Dritte weiter.</p>
    <p>Wenn Sie Fragen haben oder Hilfe benötigen, wenden Sie sich bitte an unser Support-Team.</p>
    <p>Nochmals vielen Dank, dass Sie sich uns angeschlossen haben!</p>
    <p>Mit freundlichen Grüßen,</p>
    <p>Biketec</p>
</body>
</html>
