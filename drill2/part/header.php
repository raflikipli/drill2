<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="http://localhost/drill2/bootstrap/bootstrap1/css/bootstrap.min.css">
        <style>
                .nav-link {
            text-decoration: none;
        }

        .nav-link:hover {
            text-decoration: underline; 
        }

        .navbar {
            padding-left: 40px; 
            padding-right: 40px; 
        }

        .navbar-nav .nav-item {
            margin-right: 15px; 
        }

        .navbar-nav .nav-item:last-child {
            margin-right: 0; 
        }
        </style>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand text-white" href="#"><b>System Inventory</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="http://localhost/drill2/dashboard.php" class="nav-link text-white" aria-current="page">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="http://localhost/drill2/views/inventory.php" class="nav-link text-white">Inventory</a>
                </li>
                <li class="nav-item">
                    <a href="http://localhost/drill2/views/vendor.php" class="nav-link text-white">Vendor</a>
                </li>
                <li class="nav-item">
                    <a href="http://localhost/drill2/views/gudang.php" class="nav-link text-white">Gudang</a>
                </li>
                <li class="nav-item">
                <button style="border-radius: 12px; padding: px 8px; background-color: #f8f9fa; border: 1px solid #ccc;">
                <a class="nav-link text-dark" href="http://localhost/drill2/logout.php" style="text-decoration: none;">
                <b>Logout</b>
        </a>
    </button>

                </li>
            </ul>
        </div>
    </nav>