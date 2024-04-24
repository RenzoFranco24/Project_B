<?php
session_start();
require_once "credentials.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $role = 'user';

    $sql = "SELECT * FROM Users WHERE Username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $username_error = "Username already taken.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO Users (Username, Password, role) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $hashed_password, $role);
        if ($stmt->execute()) {
            echo "User registered successfully!";
            header("Location: login.php");
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
    }
    $stmt->close();
}
$conn->close();
?>

<html>
<head>
    <link rel="stylesheet" href="Marvel_Pookies.css">
</head>
<body class="login_body">
<div class="login_box">
    <h2>Register</h2>
    <p style ="color:black;">Please enter your desired username and password, then you will be prompted to login.</p>
    <form class="login_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <span class="error" style="color: black;"><?php echo isset($username_error) ? $username_error : ''; ?></span><br>
        <input type="text" name="username" placeholder="Username"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="submit" value="Register">
    </form>
</div>
</body>
</html>

