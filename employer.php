
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    // Database connection
    $host = 'localhost';
    $dbname = 'your_database_name';
    $username = 'your_username';
    $password = 'your_password';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Gather input
        $organization_name = $_POST['organization_name'];
       
        $contact_number = $_POST['contact_number'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        // Validate passwords
        if ($password !== $confirm_password) {
            echo "<script>alert('Passwords do not match!');</script>";
            exit();
        }

        // Hash password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Insert into database
        $stmt = $conn->prepare("INSERT INTO employers (organization_name,  contact_number, email, password)
                                VALUES (:organization_name, :contact_number, :email, :password)");
        $stmt->bindParam(':organization_name', $organization_name);
        $stmt->bindParam(':contact_number', $contact_number);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->execute();

        echo "<script>alert('Registration successful!');</script>";
    } catch (PDOException $e) {
        if ($e->getCode() === '23000') {
            echo "<script>alert('Email already exists!');</script>";
        } else {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .registration-container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .registration-container h1 {
            font-size: 24px;
            color: #333;
            text-align: center;
            margin-bottom: 10px;
        }
        .registration-container p {
            font-size: 14px;
            color: #555;
            text-align: center;
            margin-bottom: 20px;
        }
        .registration-container input,
        .registration-container select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        .registration-container input[type="submit"] {
            background-color: #28a745;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        .registration-container input[type="submit"]:hover {
            background-color: #218838;
        }
        .registration-container .checkbox-group {
            display: flex;
            align-items: center;
        }
        .registration-container .checkbox-group input {
            margin-right: 10px;
        }
        .registration-container a {
            color: #007bff;
            text-decoration: none;
        }
        .registration-container a:hover {
            text-decoration: underline;
        }
        .recaptcha {
            margin: 15px 0;
        }
    </style>
</head>
<body>
<?php include("indexNavbar.php")?>
    <div class="registration-container">
        <h1>Create your free Employer Account</h1>
        <p>Fill the basic information and start recruiting now!</p>
        <form action="employer.php" method="POST">
            <input type="text" name="organization_name" placeholder="Organization Name" required>
            <input type="number" name="contact_number" placeholder="Organization Contact Number" required>
            <input type="email" name="email" placeholder="Login Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Password (again)" required>
            
            <input type="submit" name="register" value="Create Employer Account">
       
            <h5 style="color: red;"> -- Already have an account ? <a href="employerlogin.php"
                    style="border: 0; ">Login</a>

    </div>
</body>
</html>
