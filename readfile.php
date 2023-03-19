<?php
session_start();
$uname = "";
if (!isset($_SESSION['user_id'])) {
    echo '<h1 style="color: red;">служебная страница</h1>';
} else {
    if (isset($_SESSION['user_id'])) {
        $hashed_user_name = hash('sha256', $_SESSION['user_name']);
        $txts = glob('private/messages/' . $hashed_user_name . '*.txt');
        readfile($txts[$_SERVER['QUERY_STRING']]);
    }
}
