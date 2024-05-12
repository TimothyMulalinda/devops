<?php
session_start();

$servername = "localhost";
$username = "phpmyadmin";
$password = "T1m0thy_";
$dbname = "stocktrack";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role = $_POST['role'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tbl_account WHERE role='$role' AND username='$username' AND password='$password'";
    $result = $con->query($sql);

    if ($result->num_rows == 1) {
        // Login successful
        $_SESSION['role'] = $role;
        if ($role == 'admin') {
            header('Location: admin/welcome.php');
            exit;
        } elseif ($role == 'operator') {
            header('Location: operator/operator.php');
            exit;
        }
    } else {
        $login_error = "Failed. Please check your username and password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css"> <!-- Tautan ke file CSS -->
</head>

<body>
    <div class="login-container">
        <img src="./admin/img/logo1.png" alt="Logo" width="100"> <!-- Ganti logo.png dengan logo Anda -->
        <h1>S T O C K T R A C K</h1>
        <?php if (isset($login_error)) echo "<p class='error-message'>$login_error</p>"; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="role">Role:</label>
            <select name="role" id="role">
                <option value="admin">Admin</option>
                <option value="operator">Pegawai</option>
            </select><br><br>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>
<?php
$con->close();
?>
