<?php

// $currentPassword = $_POST['password'];
// $password = isset($_SESSION['password']) ? $_SESSION['password'] : null;

if ($user == false) {
    header('Location: index.php?m=login');
    exit;
}

// Define an array to contain message
$messages = [];
$oldPassword = isset($_SESSION['password']) ? md5($_SESSION['password'] ): null;//ログイン時のパスワードがセッションに格納されている
// echo "<p>oldPassword: $oldPassword</p>";

// Receive form data
if (!empty($_POST)) {
    $currentPassword = md5($_POST['currentPassword']);//入力したパスワードのハッシュ値を計算して$currentPasswordに格納している→md5()について調べるとわかります。
    $newPassword = md5($_POST['newPassword']);//入力したパスワードのハッシュ値を計算して$newPassword
    $confirmPassword = md5($_POST['confirmPassword']);//入力したパスワードのハッシュ値を計算して$confirmPassword

    // $currentPassword = $_POST['currentPassword'];//入力したパスワードを$currentPasswordに格納している
    // $newPassword = $_POST['newPassword'];//入力したパスワードを$newPassword
    // $confirmPassword = $_POST['confirmPassword'];//入力したパスワードを$confirmPassword


    /* パスワードが正しくない場合は、エラーメッセージを表示*/
    if ($currentPassword != $oldPassword) {  
        array_push($messages, "Password is different");
    }

    /*入力された新しいパスワードと確認用パスワードが一致しない場合、エラーメッセージを表示する。*/
    if ($newPassword != $confirmPassword) {
        array_push($messages, "Confirm password is not matched with New Password");
    }

    // If there is no error, process to update password
    if (empty($messages)) { //sqlに値(newPassword)を渡す
        $sql = "UPDATE users
        SET password = '$newPassword'
        WHERE id = " . $user['id'];


        try { //スローされた例外をキャッチする
            $result = $mysql->query($sql);
            array_push($messages,"Your password is changed");
        } catch (Exception $e) {
            // if there is error, push the error message
            array_push($messages, $e->getMessage());
        }
    }
}

?>

<!-- Lavel of Change Password  -->

<div id="main">

    <div id="main-content">
        <h3>Change Password</h3>
        <?php foreach($messages as $message) {
            echo "<p>$message</p>";
        } 

        ?>

        <form method="post" class="form-register">
            <p>
                <label>Current Password: </label>
                <input type="password" name="currentPassword" />
            </p>
            <p>
                <label>New Password: </label>
                <input type="password" name="newPassword" />
            </p>
            <p>
                <label>Confirm Password: </label>
                <input type="password" name="confirmPassword" />
            </p>
            <p><input type="submit" value="changePassword" /></p>

        </form>

    </div>

    <!-- embed sidbar.php -->
    <?php require __DIR__. '/partials/sidebar.php'; ?>
</div>
