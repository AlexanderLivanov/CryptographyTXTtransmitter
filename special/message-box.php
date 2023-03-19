<?php
$uname = "";
if (!isset($_SESSION['user_id'])) {
    echo '';
} else {
    if (isset($_POST['upd-txt']))
        $hashed_user_name = '';
        $hashed_user_name = hash('sha256', $_SESSION['user_name']);
        $txts = glob('private/messages/' . $hashed_user_name . '*.txt');
}
?>