<?php
session_start();
$uname = "";
if (!isset($_SESSION['user_id'])) {
    echo 'f';
} else {
    if (isset($_SESSION['user_id'])) {
        $hashed_user_name = hash('sha256', $_SESSION['user_name']);
        $txts = glob('private/messages/' . $hashed_user_name . '*.txt');
        readfile($txts[$_SERVER['QUERY_STRING']]);
    }
}
