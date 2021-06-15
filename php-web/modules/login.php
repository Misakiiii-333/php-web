<?php
// Receive form data 
$username = addslashes(isset($_POST['username']) ? $_POST['username'] : null);
// addslashes($_POST['username']);
// $password = md5(isset($_POST["password"]) ? $_POST["password"] : null );
$password = addslashes(isset($_POST['password']) ? md5($_POST['password']) : null);

echo "<p>$username</p>"."<p>$password</p>";
// $connection = new mysqli("localhost", "root", "", "php_web");
//             // connect_error is a properties of connection, it's null if there is no error
//             if ($connection->connect_error != null) {
//                 echo "Failed to connect to MySQL: " . $connection->connect_error;
//             } else {
//                 echo "Connected to MySQL successfully";
                // $connection->close();
           

// query user data by $username and $password
$sql = "SELECT id, username, password 
    FROM users 
    WHERE username = '$username' AND password = '$password'
    LIMIT 0,1";
echo "<p>$sql</p>";

$result = $mysql->query($sql);
$user = $result->fetch_array() ?? false;

if (!$user) {
    echo "<p>Login failed</p>";
} else {

    echo "<p>Login success!</p>";
    // Set session for login
    $_SESSION["user_login_id"] = $user['id']; //login_user_id
    $_SESSION['password'] = $user['password'];
    // Redirect to home page after login
    header('Location: index.php');
}
// $connection->close();
// }
?>
