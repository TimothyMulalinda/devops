<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - STOCKTRACK</title>
    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="welcome.css">
</head>

<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo-container">
                <h2 class="logo-text">S T O C K T R A C K</h2>
                <img src="./img/logo1.png" alt="Logo" class="logo">
            </div>
            <ul class="sidebar-menu">
                <li><a href="barang.php">Kontrol Data Barang</a></li>
                <li><a href="pinjam.php">Kontrol Data Pinjaman</a></li>
                <!-- Add more sidebar links as needed -->
                <li><a href="../index.php">Logout</a></li> <!-- Tautan untuk logout -->
            </ul>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="welcome-container">
                <h1 class="welcome-heading">Welcome to Admin Dashboard</h1>
                <p class="welcome-message">Manage your inventory and loans efficiently.</p>
            </div>
            <!-- Add admin content here -->
        </div>
    </div>
</body>

</html>