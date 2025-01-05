<?php
include "adminvalidator.php";
// Include database connection
include '../config.php';  // Make sure to include your DB connection details

// Start session


// Check if user is logged in (you can customize this based on your authentication logic)
// if (!isset($_SESSION['admin_id'])) {
//     header("Location: login.php");
//     exit();
// }

// Get admin id from session
$admin_id = 1;
// $_SESSION['admin_id'];

// Fetch admin data from database
$sql = "SELECT * FROM admins WHERE aid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $admin_id);
$stmt->execute();
$result = $stmt->get_result();

// Fetching admin data
$admin = $result->fetch_assoc();

// If no data found, redirect to login
if (!$admin) {
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
            color: #333;
            display: flex;
            /* justify-content: center; */
            /* align-items: center; */
            min-height: 100vh;
        }

        .menu {
            height: 100vh;
            position: fixed;
        }

        /* Profile Container */
        .profile-container {
            background-color: #fff;
            width: 80%;
            max-width: 900px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 60px;
            margin-left: 400px;
        }

        /* Profile Header */
        .profile-header {
            margin-bottom: 30px;
        }

        .profile-header h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #4CAF50;
        }

        .profile-header p {
            font-size: 1.1rem;
            color: #555;
        }

        /* Profile Information */
        .profile-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .profile-image img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 5px solid #4CAF50;
        }

        .profile-details {
            flex: 1;
            text-align: left;
            margin-left: 30px;
        }

        .profile-details h2 {
            font-size: 1.8rem;
            color: #333;
            margin-bottom: 20px;
        }

        .profile-details ul {
            list-style-type: none;
        }

        .profile-details ul li {
            font-size: 1.1rem;
            color: #555;
            margin: 8px 0;
        }

        .profile-details ul li strong {
            color: #4CAF50;
        }

        /* Profile Actions */
        .profile-actions {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .profile-actions .btn {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            font-size: 1.1rem;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .profile-actions .btn:hover {
            background-color: #45a049;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .profile-info {
                flex-direction: column;
                text-align: center;
            }

            .profile-details {
                margin-left: 0;
                margin-top: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="menu">
        <?php include "../includes/sidebar.php"; ?>
    </div>
    <div class="profile-container">
        <div class="profile-header">
            <h1>Welcome, <?php echo htmlspecialchars($admin['firstname']); ?>!</h1>
            <p>Admin Profile</p>
        </div>

        <div class="profile-info">
            <div class="profile-details">
                <h2>Profile Details</h2>
                <ul>
                    <li><strong>First Name:</strong> <?php echo htmlspecialchars($admin['firstname']); ?></li>
                    <li><strong>Last Name:</strong> <?php echo htmlspecialchars($admin['lastname']); ?></li>
                    <li><strong>Email:</strong> <?php echo htmlspecialchars($admin['email']); ?></li>
                    <li><strong>Phone:</strong> <?php echo htmlspecialchars($admin['phone']); ?></li>
                    <li><strong>Joined on:</strong> <?php echo date("F j, Y", strtotime($admin['created_at'])); ?></li>
                </ul>
            </div>
        </div>

        <div class="profile-actions">
            <!-- <a href="edit_profile.php" class="btn">Edit Profile</a> -->
            <!-- <a href="logout.php" class="btn">Logout</a> -->
        </div>
    </div>
</body>

</html>