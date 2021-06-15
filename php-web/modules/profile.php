<!-- MAIN content -->
<div id="main">
<div id="main">
        <div id="main-content">
            <h3>My profile.</h3>
            <p>ID: <?php echo $user['id']; ?></p>
            <p>Full name: <?php echo $user['fullname']; ?></p>
            <p>Username: <?php echo $user['username']; ?></p>
            <p>Email: <?php echo $user['email']; ?></p>
        </div>
        <!-- embed sidbar.php -->
        <?php require __DIR__. '/partials/sidebar.php'; ?>
    </div>
    <!-- embed sidbar.php -->
    <?php require __DIR__. '/partials/sidebar.php'; ?>
</div>
