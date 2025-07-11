<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            font-family: 'Arial', sans-serif;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            z-index: 0;
            transition: transform 0.5s ease;
            transform: scale(1.1);
        }

        .login-container:hover::before {
            transform: scale(1);
        }

        h2 {
            color: #4caf50;
            margin-bottom: 20px;
            font-family: 'Arial', sans-serif;
            position: relative;
            z-index: 1;
        }

        .input-group {
            margin-bottom: 20px;
            position: relative;
        }

        .input-group input {
            width: 100%;
            padding: 10px 40px 10px 40px;
            border: 2px solid #4caf50;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s;
            position: relative;
            z-index: 1;
        }

        .input-group input:focus {
            border-color: #00f2fe;
        }

        .input-group i {
            position: absolute;
            left: 10px;
            top: 10px;
            color: #4caf50;
            font-size: 18px;
            z-index: 2;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            position: relative;
            z-index: 1;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #666;
            position: relative;
            z-index: 1;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Login</h2>
        <form action="your_login_script.php" method="POST">
            <div class="input-group">
                <i class="fa fa-user"></i>
                <input type="text" id="username" name="username" value="Taskmanager" required placeholder="Username">
            </div>
            <div class="input-group">
                <i class="fa fa-lock"></i>
                <input type="password" id="password" name="password" value="Tfcs@2403" required placeholder="Password">
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
        <div class="footer">
            <p>© 2023 Your Company</p>
        </div>
    </div>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</body>
</html>
