<?php
include 'includes/config.php';
include 'includes/session.php';
include 'includes/user.php';

$displayError = false;

if ($_POST) {
    if ($username = user_authenticate($_POST['username'], $_POST['password'])) {
        session_regenerate_id(true);
        session_set_user($username);
        header('Location: files.php');
        exit;
    }

    $displayError = true;
}

include 'phtml/header.php';
?>

<div class="row">
    <div class="panel panel-default col-md-4 col-md-offset-4">
        <div class="panel-body">
            <h3>Login</h3>
            <hr />
            <?php if ($displayError): ?>
                <div class="alert alert-danger">
                    Invalid username and/or password.
                    <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
                </div>
            <?php endif; ?>
            <form role="form" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                or <a href="register.php">Register</a>
            </form>
        </div>
    </div>
</div>

<?php
include 'phtml/footer.php';
