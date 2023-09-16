<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404: File Not Found.</title>
    <style>
        body {
            background-color: #2c3e50;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .error-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }
        .error-heading {
            font-size: 4rem;
            color: #fff; /* White text color */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        .error-message {
            font-size: 2rem;
            color: #ff5733;
            margin-top: 10px;
        }
        .home-link {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #ff5733;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .home-link:hover {
            background-color: #ff1f00;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h1 class="error-heading">Oops! Error 404</h1>
        <p class="error-message">File Not Found.</p>
        <a href="javascript:history.back()" class="home-link">Go Back</a>
    </div>
</body>
</html>
