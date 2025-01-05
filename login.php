<?php
include './config.php';
if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email = '$email' AND passkey = '$password'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $_SESSION['user'] = $row;
        header('Location: index.php');
    }else{
        echo "Invalid email or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Form in HTML and CSS | CodingNepal</title>
    <style>
       * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Montserrat", sans-serif;
        }

        body {
            width: 100%;
            min-height: 100vh;
            padding: 0 10px;
            display: flex;
            flex-direction: column;
            /* justify-content: center; */
            /* align-items: center; */

        }

        .menu {
            padding: 10px 10px;
            margin-bottom: 100px;
        }

        /* Login form styling */
        .login_form {
            align-self: center;
            width: 100%;
            max-width: 435px;
            background: #fff;
            border-radius: 6px;
            padding: 41px 30px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .login_form h3 {
            font-size: 20px;
            text-align: center;
        }

        /* Google & Apple button styling */

        .login_form .login_option {
            display: flex;
            width: 100%;
            justify-content: space-between;
            align-items: center;
        }

        .login_form .login_option .option {
            width: calc(100% / 2 - 12px);
        }

        .login_form .login_option .option a {
            height: 56px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;
            background: #F8F8FB;
            border: 1px solid #DADAF2;
            border-radius: 5px;
            margin: 34px 0 24px 0;
            text-decoration: none;
            color: #171645;
            font-weight: 500;
            transition: 0.2s ease;
        }

        .login_form .login_option .option a:hover {
            background: #ededf5;
            border-color: #626cd6;
        }

        .login_form .login_option .option a img {
            max-width: 25px;
        }

        .login_form p {
            text-align: center;
            font-weight: 500;
        }

        .login_form .separator {
            position: relative;
            margin-bottom: 24px;
        }

        /* Login option separator styling */
        .login_form .separator span {
            background: #fff;
            z-index: 1;
            padding: 0 10px;
            position: relative;
        }

        .login_form .separator::after {
            content: '';
            position: absolute;
            width: 100%;
            top: 50%;
            left: 0;
            height: 1px;
            background: #C2C2C2;
            display: block;
        }

        form .input_box label {
            display: block;
            font-weight: 500;
            margin-bottom: 8px;
        }

        /* Input field styling */
        form .input_box input {
            width: 100%;
            height: 57px;
            border: 1px solid #DADAF2;
            border-radius: 5px;
            outline: none;
            background: #F8F8FB;
            font-size: 17px;
            padding: 0px 20px;
            margin-bottom: 25px;
            transition: 0.2s ease;
        }

        form .input_box input:focus {
            border-color: #626cd6;
        }

        form .input_box .password_title {
            display: flex;
            justify-content: space-between;
            text-align: center;
        }

        form .input_box {
            position: relative;
        }

        a {
            text-decoration: none;
            color: #626cd6;
            font-weight: 500;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Login button styling */
        form button {
            width: 100%;
            height: 56px;
            border-radius: 5px;
            border: none;
            outline: none;
            background: #626CD6;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            text-transform: uppercase;
            cursor: pointer;
            margin-bottom: 28px;
            transition: 0.3s ease;
        }

        form button:hover {
            background: #4954d0;
        }
    </style>

</head>

<body>
    <div class="menu">
        <?php include './includes/userNavbar.php'; ?>

    </div>
    <div class="login_form">
        <!-- Login form container -->
        <form action="" method="POST">
            <h3>Log in with</h3>


            <!-- Login option separator -->



            <!-- Email input box -->
            <div class="input_box">
                <label for="email">Email</label>
                <input name="email" type="email" id="email" placeholder="Enter email address" required />
            </div>

            <!-- Paswwrod input box -->
            <div class="input_box">
                <div class="password_title">
                    <label for="password">Password</label>
                </div>

                <input name="password" type="password" id="password" placeholder="Enter your password" required />
            </div>

            <!-- Login button -->
            <button type="submit">Log In</button>

            <p class="sign_up">Don't have an account? <a href="signup.php">Sign up</a></p>
        </form>
    </div>
    <div>
        <? include './includes/Footer.html'; ?>
    </div>
</body>

</html>