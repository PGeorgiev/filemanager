<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title><?php echo APPLICATION_NAME ?></title>

        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="theme.css" rel="stylesheet">

        <!--[if lt IE 9]>
          <script src="assets/js/html5shiv.js"></script>
          <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <?php
        if (session_has_user()) {
            include 'navigation.php';
        }
        ?>

        <!-- Content -->
        <div class="container theme-showcase">
            <?php if (session_has_user()): ?>
                <h1><?php echo defined('PAGE_TITLE') ? PAGE_TITLE : ucwords(substr(basename($_SERVER['SCRIPT_NAME']), 0, -4)) ?>
                    <?php if (defined('PAGE_DESCRIPTION')): ?><small><?php echo PAGE_DESCRIPTION ?></small><?php endif; ?></h1>
                <hr />
            <?php endif; ?>
            <?php if (isset($_SESSION[SESSION_ERROR_KEY])): ?>
                <div class="alert alert-danger">
                    <?php echo htmlentities($_SESSION[SESSION_ERROR_KEY]); ?>
                    <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
                </div>
                <?php
                unset($_SESSION[SESSION_ERROR_KEY]);
            endif;
            if (isset($_SESSION[SESSION_SUCCESS_KEY])):
                ?>
                <div class="alert alert-success">
                    <?php echo htmlentities($_SESSION[SESSION_SUCCESS_KEY]); ?>
                    <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
                </div>
                <?php
                unset($_SESSION[SESSION_SUCCESS_KEY]);
            endif;
            ?>
