<?php
// Define variable to check if user is not registered, show register form
$isSuccess = $_GET['success'];

  //homework3

    if ($user != false) {
        // redirect to homepage
        header('Location: index.php');
    } 



    // Receive post data
    if (!empty($_POST)) {
        
        $fullname = addslashes($_POST['fullname']);
        $username = addslashes($_POST['username']);
        $email = addslashes($_POST['email']);
        // hashing password
        $password = md5($_POST['password']); 
        
        // Define and execute SQL Query
        $sql = "INSERT INTO users(fullname, username, email, password)
            VALUE('$fullname', '$username', '$email', ' ')";

        // Define an array to contain errors when execute query,
        //  if there are errors, we will ouput to screen
    }
        if ($user == false) {
            header('Location: index.php?m=login');
            exit;
        }
    ?>


<!-- MAIN content -->
<div id="main">
    <div id="main-content">
        <h3>Register User</h3>
        <?php
        // Check if there is any error, ouput the error to screen.
        if (isset($errors) && !empty($errors)) {
            foreach ($errors as $error) {
                echo '<p>'. $error . '</p>';
            }
        }
        ?>
    <?php           
     // Check if user not registered, show form
    if (!$isSuccess) { ?>
        <form method="post" class="form-register">
            <p>
                <label>Username: </label>
                <input type="text" name="fullname" />
                </p>
                <p>
                    <label>Email: </label>
                    <input type="text" name="email" />
                </p>
                <p>
                    <label>Full Name: </label>
                    <input type="text" name="fullname" />
                </p>
                <p>
                    <label>Password: </label>
                    <input type="password" name="password" />
                </p>
                <p><input type="submit" value="Register" /></p>
                </form>

                <?php // if user registered, show welcome message 
                } else {
                    echo "<p>Welcome to our website!</p>";
                } ?>
            </div>
            <!-- embed sidbar.php -->
            <?php require __DIR__. '/partials/sidebar.php'; ?>
        </div>
            