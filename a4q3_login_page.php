<?php
//$userName = $_POST['userName'];
//$password = $_POST['password'];
session_start() or die("Cannot start session.");
$userInfo = "a4q3_userInfo.txt";
require "a4q3_login_verify.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <STYLE>
        #decr{
            font-weight: bold;
            color: red;
        }
        #nameError,#pswError{
            color: red;
            background-color: yellow;
        }
        #invalid{
            color: purple;
            font-weight: bolder;
        }
    </STYLE>
    <script src="a4q3_login_page_validate.js"></script>
</head>
<body>
    <?php include("a4q3_header.php"); ?>
    <h3>Login</h3>
    <form name="loginForm" onsubmit="return checkInfo()"  method="post">
        <label>User name<br/>
            <input id="name" type="text" name="userName" onblur="validateUserName()"><span id="nameError"></span>
        </label><br/>
        <label>Password<br/>
            <input id="psw" type="password" name="password" onblur="validatePassword()"><span id="pswError"></span>
        </label><br/><br/>
        <?php
            if ($_POST){
                $userName = $_POST['userName'];
                $password = $_POST['password'];
                if (!file_exists($userInfo) or !verifyUsername($userInfo,$userName)){
                    createAccount($userInfo,$userName,$password);
                    echo '<script>';
                    echo "location.href='a4q3_registration.php'";
                    echo '</script>';
                }elseif (!verifyUser($userInfo,$userName,$password)){
                    echo "<div id='invalid'>Invalid login</div><br/>";
                }elseif (verifyUser($userInfo,$userName,$password)){
                    $_SESSION['userName']=$userName;
                    echo '<script>';
                    echo "location.href='a4q3.php'";
                    echo '</script>';
                }
            }
        ?>
        <button type="submit">Login</button>
    </form>
    <p id="decr">A username can contain letters (both upper and lower case) and digits only.
    <br/>A password must be at least 6 characters long (characters are to be letters and digits only), have at least one letter and at least on digit.
    </p>
    <br/>
    <?php include('a4q3_footer.php'); ?>
</body>
</html>