<?php
include('header.php');
include('connection.php');
?>
  <style>
        .login-container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-box {
            width: 100%;
            max-width: 300px;
            height: 400px;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
    </style>
<div class="container login-container">
    <div class="login-box">
        <h3 class="text-center text-dark mt-3 mb-3 fw-bold">Welcome Back Kim3to</h3>
        <form method="POST" action="handle_login.php">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email"  aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-2">Login</button>
        </form>
    </div>
</div>