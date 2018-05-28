<?php
include 'includes/config.php';
include 'includes/session.php';

$username = session_get_user();

if (isset($_FILES['userfile']['tmp_name']) && !empty($_FILES['userfile']['tmp_name'])) {
    $uploaddir = DATA_PATH . DIRECTORY_SEPARATOR . $username . DIRECTORY_SEPARATOR;
    if (!is_dir($uploaddir)) {
        mkdir($uploaddir);
    }

    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        $_SESSION[SESSION_SUCCESS_KEY] = sprintf("File '%s' succesfully uploaded.", basename($_FILES['userfile']['name']));
    } else {
        $_SESSION[SESSION_ERROR_KEY] = sprintf("Cannot upload file.");
    }

    header('Location: files.php');
    exit;
}

include 'phtml/header.php';
?>

<div class="panel panel-default">
    <div class="panel-body">
        <form role="form" enctype="multipart/form-data" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="POST">
            <div class="form-group">
                <label for="userfile">Upload file: </label>
                <input type="file" id="userfile" name="userfile" />
                <p class="help-block">Select a file from your computer to upload.</p>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
            <a class="btn btn-default" href="files.php" title="Go back to files list">Back</a>
        </form>
    </div>
</div>

<?php
include 'phtml/footer.php';
