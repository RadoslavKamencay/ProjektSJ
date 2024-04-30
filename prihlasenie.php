<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Prihlásenie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form {
            width: 300px;
        }
        input[type="text"], input[type="password"], input[type="email"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: black;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            text-align: center;
        }
        a {
            color: black;
            font-weight: bold;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <div>
        <form action="proces_registracie.php" method="post">
            <h2>Prihlásenie</h2>
            <input type="text" name="meno" placeholder="Meno" required>
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="password" name="heslo" placeholder="Heslo" required>
            <input type="submit" value="Prihlásiť sa">
        </form>
    </div>
</body>
</html>
