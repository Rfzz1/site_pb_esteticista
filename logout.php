<?php

session_start();
session_unset();
session_destroy();

header("Location: modal_login.php");
exit;

?>