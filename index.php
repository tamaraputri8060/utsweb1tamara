<?php
session_start();

if( isset($_SESSION['username']) ) {
    header("Location: dashboard.php");
    exit;
}

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if( $username == 'Tamara' && $password == 'Putri' ) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    }
    else {
        $error = "usernamenya & passwordnya salah";
    }

}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            padding: 40px 50px;
            border-radius: 15px;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.2);
            width: 320px;
            text-align: center;
        }

        h2 {
            margin-bottom: 25px;
            color: #000000ff;
        }

        input[type="text"],
        input[type="password"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
            font-size: 14px;
            transition: border 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #2575fc;
        }

        button {
            width: 95%;
            padding: 10px;
            background: #2575fc;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #6a11cb;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .footer {
            margin-top: 15px;
            font-size: 13px;
            color: #777;
        }

        .footer a {
            color: #2575fc;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php if(isset($error)) { echo "<p class='error'>$error</p>"; } ?>
        <form action="" method="post">
            <input type="text" name="username" placeholder="username" required><br>
            <input type="password" name="password" placeholder="password" required><br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>