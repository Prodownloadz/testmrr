<?php

session_start();
$_SESSION['mrr-user-loggedin'] = false;
$_SESSION['user_id'] = '';
$_SESSION['name'] = '';
session_destroy();
echo '<script type="text/javascript">window.location.href="./";</script>';
