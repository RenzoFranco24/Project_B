<!DOCTYPE HTML>
<?php
session_start();
require_once "credentials.php";

if (!isset($conn)) {
    die('Database connection not established.');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT User_ID, Username, Password, role FROM Users WHERE Username = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die('SQL prepare failed: ' . htmlspecialchars($conn->error));
    }
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($user = $result->fetch_assoc()) {
        
        if (password_verify($password, $user['Password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $user['User_ID'];
            $_SESSION['username'] = $user['Username'];
            $_SESSION['role'] = $user['role'];
            header("Location: dashboard.php");
            exit;
        } else {
            echo "Invalid password";
        }
    } else {
        echo "Invalid username";
    }
    $stmt->close();
}
?>
<html>
<head>
    <link rel="stylesheet" href="Marvel_Pookies.css">
</head>
<body class="login_body">
<div class="login_box">
    <h2>Login</h2>
    <p style="color: black;">Please enter your username and password</p>
    <form class="login_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="text" name="username" placeholder="Username">
        <br>
        <input type="password" name="password" placeholder="Password">
        <br>
        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>
