<?php
session_start();
include 'include/koneksi.php';
if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
 
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM admin WHERE username=? AND password=?");
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();
    if($result->num_rows == 1){
        $_SESSION['admin'] = $admin;
        header('location: http://localhost/drill2/dashboard.php');
        exit();
    }
}
?>

    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/bootstrap1/css/bootstrap.rtl.css">
    <style>
        body {
            background-color: #f8f9fa; /* Soft background color */
            font-family: Arial, sans-serif;
        }
        .login-container {
            margin-top: 5rem;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #dc3545;
            color: #fff;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            text-align: center;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
            border-radius: 5px;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    
<div class="container d-flex justify-content-center align-items-center login-container">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h2 class="mb-0">LOGIN</h2>
            </div>
            <div class="card-body">
                <form action="login.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="email" name="username" class="form-control" placeholder="Masukkan Username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                    </div>
                    <button class="btn btn-danger w-100" type="submit" name="login">Silahkan Login</button>
                </form>
            </div>
        </div>
    </div>
</div>


</body>
</html>

