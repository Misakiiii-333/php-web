<!DOCTYPE html>
<head>
    <title>PHP MySQL - Update Data</title>
</head>
<body>
    <h2>Update an User</h2>
    <?php
        // Define user ID that you want to update
        // $user_id = $_GET['id'];
        $user_id = '1';

        // $user_id = isset($_GET['id']) ? $_GET['id'] : null;
        //user_idがまだ定まっていない

        // Create MySQL Connection
        $connection = new mysqli("localhost", "root", "", "php_web");

        // if connection is error, ouput error message on screen
        if ($connection->connect_error != null) {
            echo "<p>Failed to connect to MySQL: " . $connection->connect_error . '</p>';
        } else { // If there is no error, process to select data
            
            // Check if the form is submited, process to update the user
            if (!empty($_POST)) {
                $fullname = $_POST['fullname'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];

                $sql = "UPDATE users SET
                    fullname = '$fullname',
                    username = '$username',
                    password = '$password',
                    email = '$email' 
                    WHERE id = $user_id";
                // use connection to execute the query
                if (!$connection->query($sql)) {
                    // If update failed, show error.
                    echo "<p>Failed to update data. Error: " . $connection->error. "</p>";
                } else {
                    // If update user successfully, show message and link to mysql_query.php to check the users list
                    echo '<p>Updated user successfully, access <a target="_blank" href="./mysql_query.php">Here</a> to check</p>';
                }
            }

            if($user_id !== null) {
                // Define SQL Query to select data of the user from MySQL
                $sql_query = "SELECT * FROM users WHERE id = $user_id";
                // Call method query of the object $connection to execute a query
                $result = $connection->query($sql_query);
                if (!$result) {
                    throw new Exception("Database Error [{$connection->errno}] {$connection->error}");
                }
                // Assign query data to variable $user
                //  below syntax mean if there is no record, $user is false (there is no user)
                $user = $result->fetch_array() ?? false; // Null合体演算子
            } else {
                $user = false;
            }
        }
    

    ?>
    <!-- Check if there is user, show form to update -->
    <?php if ($user) { ?>
    <form action="./mysql_update.php?id=<?php echo $user_id; ?>" method="post">
        <p>Full Name: <input type="text" name="fullname" value="<?php echo $user['fullname'] ;?>"></p>
        <p>Username: <input type="text" name="username" value="<?php echo $user['username'] ;?>"></p>
        <p>Password: <input type="password" name="password" value="<?php echo $user['password'] ;?>"></p>
        <p>E-mail: <input type="text" name="email" value="<?php echo $user['email'] ;?>"></p>
        <p><input type="submit" value="Update User"></p>
    </form>
    <!-- If there is no user (id is not exist), show error messge -->
    <?php } else { ?>
    <p>User not found</p>
    <?php } ?>
</body>
</html>

<table>
    <tr>
        <th>ID</th>
        <th>Fullname</th>
        <th>Username</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    <?php if ($result->num_rows > 0) { 
        while($row = $result->fetch_array()) { ?>
            <tr>
                <td><a href="./mysql_update.php?id=<?php echo $row['id'] ?>"><?php echo $row['id'] ?></a></td>
                <td><?php echo $row['fullname'] ?></td>
                <td><?php echo $row['username'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><a href="./mysql_query.php?delete_user=<?php echo $row['id'] ?>">Delete</a></td>
            </tr>
        <?php } // end while ?>
    <?php } // end if ?>
</table>
</body>
</html>