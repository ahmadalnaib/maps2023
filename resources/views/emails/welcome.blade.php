<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Willkommen bei unserer Anwendung</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333333;
        }

        .container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f3f3f3;
    }

    .email-content {
        max-width: 500px;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 5px;
    }

    h2 {
        color: #CE111E;
    }

    ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    li {
        margin-bottom: 10px;
    }

    .login-button {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #CE111E;
        color: #ffffff;
        text-decoration: none;
        border-radius: 5px;
    }

    .login-button:hover {
        background-color: #cb4851;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="email-content">
            <h2>Willkommen, {{ $name }}!</h2>
            <p>Vielen Dank, dass Sie sich unserer Anwendung angeschlossen haben. Wir freuen uns, Sie an Bord zu haben.</p>
            <p>Hier sind Ihre Kontodaten:</p>
            <ul>
                <li><strong>Name:</strong> {{ $name }}</li>
                <li><strong>E-Mail:</strong> {{ $email }}</li>
                <li><strong>Passwort:</strong> {{ $password }}</li>
            </ul>
            <p>Bitte behandeln Sie Ihre Kontoinformationen vertraulich und geben Sie sie nicht an Dritte weiter.</p>
            <p>Nach dem Einloggen empfehlen wir aus Sicherheitsgründen, Ihr Passwort zu ändern.</p>
            <p>Bei Fragen oder Unterstützungsbedarf wenden Sie sich bitte an unser Support-Team.</p>
            <p>Nochmals vielen Dank für Ihre Teilnahme!</p>
            <p>Beste Grüße,</p>
            <p>Lockport</p>
            <a href="https://lockport.online/login" class="login-button">Jetzt einloggen</a>
        </div>
    </div>
</body>
</html>
