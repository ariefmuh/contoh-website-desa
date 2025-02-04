<?php

session_start();
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
if (isset($_SESSION['last_activity']) && isset($_SESSION['expire_time'])) {
    if (time() - $_SESSION['last_activity'] > $_SESSION['expire_time']) {
        session_unset();
        session_destroy();
        header("Location: ../");
        exit;
    } else {
        $_SESSION['last_activity'] = time();
    }
} else {
    header("Location: ../");
    exit;
}


?>