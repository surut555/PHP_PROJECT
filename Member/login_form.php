<?php 
include_once '../includes/function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
<div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="frmLogin" class="form" action="login_process.php" method="post">
                        <p class="text-center" id="img1">
                        <img class="mb-4" id="img1" src="../img/bootstrap-solid.svg" alt="" width="72" height="72">
                        </p>
                            <!-- <h3 class="text-center text-info">Login</h3> -->
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" size="8" maxlength="25" name="txtUserName" id="txtUserName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="txtpassword" class="text-info">Password:</label><br>
                                <input type="text" size="8" maxlength="100" name="txtPassword" id="txtPassword" class="form-control">
                            </div>
                            <div class="form-group">
                                <p class="text-center">
                                <input type="submit"  class="btn btn-primary btn-md" value="Login" onclick="validateLogin(); return false">
                                </p>
                                <p class="text-center">
                                <a href="#"  onclick="showFormUser(); return false">Forgot your password?</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="../bootstrap/js/jquery.slim.min.js"></script>
<script src="../bootstrap/js/popper.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>