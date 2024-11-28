
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('background.jpg'); /* Add your background image here */
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
        }
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            padding: 40px 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 350px;
        }
        .login-box h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .login-box input[type="email"]
         {
            width: 100%;
            padding: 20px;
            margin: 20px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .login-box input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .login-box input[type="submit"]:hover {
            background-color: #218838;
        }
        .login-box a {
            text-decoration: none;
            color: #007bff;
            font-size: 14px;
        }
        .login-box a:hover {
            text-decoration: underline;
        }
        .error {
            color: red;
            font-size: 14px;
            margin: 10px 0;
        }
/* Container for Password Input */
.password-container {
    max-width: 500px;
    margin: 2px auto;
    font-family: Arial, sans-serif;
    border-radius: 100px;
    padding: 10px 10px;
    width: 300px;
}

/* Password Input and Button Wrapper */
.password-wrapper {
    display: flex;
    align-items: center;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 1px;
    box-sizing: border-box;
}

/* Password Input Field */
#password {
    flex: 1; /* Take up all remaining space */
    border: none;
    outline: none;
    font-size: 13px;
    padding: 15px;
}

/* Toggle Button */
#togglePassword {
    background: none;
    border: none;
    cursor: pointer;
    font-size: 10px;
    padding: 1px;
    color: #666;
    outline: none;
    transition: color 0.3s;
}

#togglePassword:hover {
    color: #333;
}



    </style>
</head>
<body>
    <?php include("indexNavbar.php")?>
    <div class="login-container">
        <form class="login-box" method="POST" action="">
            <h1>Login to Jobs</h1>
            <?php if (!empty($error)): ?>
                <p class="error"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>
            <input type="email" name="email" placeholder="Enter your email" required>
            <div class="password-container">
  
            <div class="password-wrapper">
      <input type="password" id="password" placeholder="Enter your password">
      <button id="togglePassword" type="button" aria-label="Show Password">
        👁️
      </button>
    </div>
  
 
 
            <a href="forgot_password.php">Forgot password?</a>
            <br><br>
            <input type="submit" value="Login">
            <p>-- Don't you have  account? <a href="signup.php">Register Now</a></p>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>
