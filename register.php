<?php
include 'includes/config.php';
include 'includes/session.php';
include 'includes/user.php';

$displayError = false;

$username = '';

if ($_POST) {
    $errors = array();

    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if (mb_strlen($username) < 4) {
        $errors['username'] = 'Enter at least 4 characters!';
    } else if (user_exists($username)) {
        $errors['username'] = 'Username already exists!';
    }
    if (mb_strlen($password) < 6) {
        $errors['password'] = 'Enter at least 6 characters!';
    } else if ($password !== $password_confirm) {
        $errors['password_confirm'] = 'Passwords did not match!';
    }

    if (empty($errors)) {
        if (user_register($username, $password)) {
            $_SESSION[SESSION_SUCCESS_KEY] = "Successful registration. You can now login.";
        } else {
            $_SESSION[SESSION_ERROR_KEY] = "Registration was interrupted by some dark power... Please, try againt!";
        }

        header('Location: index.php');
        exit;
    }
}

include 'phtml/header.php';
?>

<div class="row">
    <div class="panel panel-default col-md-4 col-md-offset-4">
        <div class="panel-body">
            <h3>Register</h3>
            <hr />
            <form role="form" method="post">
                <div class="form-group<?php if (isset($errors['username'])): ?> has-error<?php endif; ?>">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" value="<?php echo htmlentities($username) ?>">
                    <?php if (isset($errors['username'])): ?><span class="help-block"><?php echo $errors['username'] ?></span><?php endif; ?>
                </div>
                <div class="form-group<?php if (isset($errors['password'])): ?> has-error<?php endif; ?>">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <?php if (isset($errors['password'])): ?><span class="help-block"><?php echo $errors['password'] ?></span><?php endif; ?>
                </div>
                <div class="form-group<?php if (isset($errors['password_confirm'])): ?> has-error<?php endif; ?>">
                    <label for="password_confirm">Confirm password</label>
                    <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm Password">
                    <?php if (isset($errors['password_confirm'])): ?><span class="help-block"><?php echo $errors['password_confirm'] ?></span><?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
                or <a href="index.php">Login</a>
            </form>
        </div>
    </div>
</div>

<?php
include 'phtml/footer.php';
