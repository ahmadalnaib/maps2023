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
    <h2>Welcome, {{ $name }}!</h2>
    <p>Thank you for joining our application. We're excited to have you on board.</p>
    <p>Here are your account details:</p>
    <ul>
        <li><strong>Name:</strong> {{ $name }}</li>
        <li><strong>Email:</strong> {{ $email }}</li>
        <li><strong>Password:</strong> {{ $password }}</li>
    </ul>
    <p>Please keep your account information confidential and do not share it with anyone.</p>
    <p>If you have any questions or need assistance, feel free to contact our support team.</p>
    <p>Thank you again for joining us!</p>
    <p>Best regards,</p>
    <p>Your Application Team</p>
</body>
</html>
