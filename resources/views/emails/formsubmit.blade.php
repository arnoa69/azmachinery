<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* General Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2; /* Light grey background */
        }

        /* Container Styles */
        .container {
            max-width: 600px;
            margin: 30px auto 0; /* Top margin added */
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1); /* Soft shadow effect */
        }

        /* Header Styles */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Logo Styles */
        .logo {
            max-width: 250px;
            height: auto;
        }

        /* Content Styles */
        .content {
            font-size: 18px;
            color: #333;
            line-height: 1.5;
        }

        /* Footer Styles */
        .footer {
            margin-top: 20px; /* Reduced top margin */
            background-color: #666; /* Dark grey background */
            color: white; /* White text color */
            padding: 10px;
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
        }

        /* Footer Address Styles */
        .address {
            font-size: 14px;
            margin: 0;
            padding: 0;
        }

        .address.left-column {
            flex: 1; /* Takes 50% width */
            text-align: left; /* Align left for left column */
        }

        .address.right-column {
            flex: 1; /* Takes 50% width */
            text-align: right;
        }
        /* Footer Links */
        .footer a {
            color: white; /* Set link color to white */
            text-decoration: none; /* Remove underline */
        }
    </style>
    <title>Form submit</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <img class="logo" src="" alt="Logo">
        </div>

        <div class="content">
            <p>{{ $clientName }} </p>
        </div>

        <div class="footer">
            <div class="address left-column">
            </div>
            <div class="address right-column">
            </div>
        </div>
    </div>
</body>

</html>
