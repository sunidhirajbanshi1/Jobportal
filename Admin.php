<?php

//Database connection
$servername = "localhost";
$username = "root"; // Update as needed
$password = ""; // Update as needed
$dbname = "jobportal"; /// Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//Fetch data counts
$jobCategoriesQuery = "SELECT COUNT(*) as count FROM job_categories";
$employersQuery = "SELECT COUNT(*) as count FROM employers";
$jobseekersQuery = "SELECT COUNT(*) as count FROM jobseekers";
$jobsQuery = "SELECT COUNT(*) as count FROM jobs";

$jobCategories = $conn->query($jobCategoriesQuery)->fetch_assoc()['count'];
$employers = $conn->query($employersQuery)->fetch_assoc()['count'];
$jobseekers = $conn->query($jobseekersQuery)->fetch_assoc()['count'];
$jobs = $conn->query($jobsQuery)->fetch_assoc()['count'];//
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .dashboard {
            display: flex;
            justify-content: space-around;
            padding: 20px;
            background-color: #fff;
        }
        .card {
            width: 20%;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            background: linear-gradient(to bottom right, #6a11cb, #2575fc);
            color: #fff;
        }
        .card h2 {
            font-size: 2em;
            margin: 0;
        }
        .card p {
            margin: 0;
            font-size: 1.2em;
        }
        <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #343a40;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .sidebar h2 {
            text-align: center;
            padding: 15px 0;
            border-bottom: 1px solid #495057;
            margin: 0;
        }
        .menu {
            flex-grow: 1;
            padding: 10px 0;
        }
        .menu table {
            width: 100%;
            text-align: left;
        }
        .menu table tr {
            border-bottom: 1px solid #495057;
        }
        .menu table tr:hover {
            background: #495057;
        }
        .menu table tr td {
            padding: 10px;
            color: #fff;
        }
        .menu table tr td a {
            text-decoration: none;
            color: #fff;
            display: block;
        }
        .menu table tr td a:hover {
            color: #1abc9c;
        }
        .logout {
            padding: 15px;
            text-align: center;
            background: #e74c3c;
            cursor: pointer;
        }
        .logout a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
        }
        .logout:hover {
            background: #c0392b;
        }
    </style>
    </style>
</head>
<body>

    <h1 style="text-align:center; padding: 20px; color: #333;">Admin Dashboard</h1>
    <div class="dashboard">
        <div class="card">
            <h2><?php echo $jobCategories; ?></h2>
            <p>Total Job Categories</p>
        </div>
        <div class="card">
            <h2><?php echo $employers; ?></h2>
            <p>Total Registered Employers</p>
        </div>
        <div class="card">
            <h2><?php echo $jobseekers; ?></h2>
            <p>Total Registered Candidates</p>
        </div>
        <div class="card">
            <h2><?php echo $jobs; ?></h2>
            <p>Total Listed Jobs</p>
        </div>
    </div>
 <div class="sidebar">
        <h2>Admin Panel</h2>
        <div class="menu">
            <table>
                <tr>
                    <td><a href="admin.php">Dashboard</a></td>
                </tr>
                <tr>
                    <td><a href="job_categories.php">Job Categories</a></td>
                </tr>
                <tr>
                    <td><a href="employers.php">Registered Employers</a></td>
                </tr>
                <tr>
                    <td><a href="Jobseekers.php">Registered Candidates</a></td>
                </tr>
                <tr>
                    <td><a href="jobs.php">Listed Jobs</a></td>
                </tr>
                <tr>
                    <td><a href="reports.php">Reports</a></td>
                </tr>
                <tr>
                    <td><a href="settings.php">Settings</a></td>
                </tr>
            </table>
        </div>
        <div class="logout">
            <a href="logout.php">Logout</a>
        </div>
    </div>
    <div class="main-content" style="padding: 20px; flex-grow: 1;">
        <h1>Welcome to the Admin Dashboard</h1>
      
    </div>
</body>


</html>

/*<?php
$conn->close();
?>*/
