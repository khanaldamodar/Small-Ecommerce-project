<?php
    include './config.php';
if($_SERVER['REQUEST_METHOD'] === "POST"){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $gender = $_POST['gender'];


    if($password === $cpassword){
        $sql = "INSERT INTO `users` (`fullname`, `username`, `email`, `phone`, `passkey`, `gender`) VALUES ('$name', '$username', '$email', '$phone', '$password', '$gender')";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "User registered successfully";
        }else{
            echo "Failed to register user";
        }
    }else{
        echo "Passwords do not match";
    }


}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration - WinterShop</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            flex-direction: column;
            padding: 10px;


        }

        .menu {
            margin-bottom: 50px;
        }

        .container-register {
            align-self: center;
            max-width: 700px;
            width: 100%;
            background-color: #fff;
            padding: 25px 30px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
        }

        .container-register .title {
            font-size: 25px;
            font-weight: 500;
            position: relative;
        }

        .container-register .title::before {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 30px;
            border-radius: 5px;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }

        .content form .user-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 20px 0 12px 0;
        }

        form .user-details .input-box {
            margin-bottom: 15px;
            width: calc(100% / 2 - 20px);
        }

        form .input-box span.details {
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .user-details .input-box input {
            height: 45px;
            width: 100%;
            outline: none;
            font-size: 16px;
            border-radius: 5px;
            padding-left: 15px;
            border: 1px solid #ccc;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
        }

        .user-details .input-box input:focus,
        .user-details .input-box input:valid {
            border-color: #9b59b6;
        }

        form .gender-details .gender-title {
            font-size: 20px;
            font-weight: 500;
        }

        form .category {
            display: flex;
            width: 80%;
            margin: 14px 0;
            justify-content: space-between;
        }

        form .category label {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        form .category label .dot {
            height: 18px;
            width: 18px;
            border-radius: 50%;
            margin-right: 10px;
            background: #d9d9d9;
            border: 5px solid transparent;
            transition: all 0.3s ease;
        }

        #dot-1:checked~.category label .one,
        #dot-2:checked~.category label .two,
        #dot-3:checked~.category label .three {
            background: #9b59b6;
            border-color: #d9d9d9;
        }

        form input[type="radio"] {
            display: none;
        }

        form .button {
            height: 45px;
            margin: 35px 0
        }

        form .button input {
            height: 100%;
            width: 100%;
            border-radius: 5px;
            border: none;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }

        form .button input:hover {
            background: linear-gradient(-135deg, #71b7e6, #9b59b6);
        }

        /* Responsive media query code for mobile devices */
        @media(max-width: 584px) {
            .container-register {
                max-width: 100%;
            }

            form .user-details .input-box {
                margin-bottom: 15px;
                width: 100%;
            }

            form .category {
                width: 100%;
            }

            .content form .user-details {
                max-height: 300px;
                overflow-y: scroll;
            }

            .user-details::-webkit-scrollbar {
                width: 5px;
            }
        }

        /* Responsive media query code for mobile devices */
        @media(max-width: 459px) {
            .container-register .content .category {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="menu">

        <?php include './includes/userNavbar.php'; ?>
    </div>
    <div class="container-register">
        <!-- Title section -->
        <div class="title">Registration</div>
        <div class="content">
            <!-- Registration form -->
            <form action="" method="POST">
                <div class="user-details">
                    <!-- Input for Full Name -->
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" name="name" placeholder="Enter your name" required>
                    </div>
                    <!-- Input for Username -->
                    <div class="input-box">
                        <span class="details">Username</span>
                        <input name="username" type="text" placeholder="Enter your username" required>
                    </div>
                    <!-- Input for Email -->
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input name="email" type="email" placeholder="Enter your email" required>
                    </div>
                    <!-- Input for Phone Number -->
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input name="phone" type="text" placeholder="Enter your number" required>
                    </div>
                    <!-- Input for Password -->
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input name="password" type="password" placeholder="Enter your password" required>
                    </div>
                    <!-- Input for Confirm Password -->
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input name="cpassword" type="password" placeholder="Confirm your password" required>
                    </div>
                </div>
                <div class="gender-details">
                    <!-- Radio buttons for gender selection -->
                    <input type="radio" name="gender" value="male" id="dot-1">
                    <input type="radio" name="gender" value="female" id="dot-2">
                    <input type="radio" name="gender" value="other" id="dot-3">
                    <span class="gender-title">Gender</span>
                    <div class="category">
                        <!-- Label for Male -->
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="gender">Male</span>
                        </label>
                        <!-- Label for Female -->
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="gender">Female</span>
                        </label>
                        <!-- Label for Prefer not to say -->
                        <label for="dot-3">
                            <span class="dot three"></span>
                            <span class="gender">Prefer not to say</span>
                        </label>
                    </div>
                </div>
                <!-- Submit button -->
                <div class="button">
                    <input type="submit" value="Register">
                    <p style="text-align: center;">Already have an account? <a href="login.php">Login</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>