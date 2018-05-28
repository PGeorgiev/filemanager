<?php
include 'includes/config.php';
include 'includes/session.php';

session_destroy();
header('Location: index.php');
