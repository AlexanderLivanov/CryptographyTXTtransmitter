<?php
session_start();
if(isset($_POST['txt-send'])){
    $rec_name = $_POST['rec-name'];
    $subject = $_POST['subject'];
    $txt_input = $_POST['txt-input'];
    $data_array = [
        $rec_name,
        $subject,
        $txt_input,
    ];

    $formated_data_array = [
        $to = 'TO: ' . $data_array[0] . '; ',
        $sub = 'SUBJECT: ' . $data_array[1] . '; ',
        $txt = 'TEXT: ' . $data_array[2] . '; ',
    ];

    $filename = hash('sha256', $rec_name) . rand(1, 123456789) . '.txt';
    $text = $formated_data_array;
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/private/messages/{$filename}", $text);
    echo('<p style="color: green;">Сообщение пользователю ' . $rec_name . ' успешно отправлено! Дойдет ли оно?</p>');
    header('Refresh: 1; url=/');
}
?>

<html>
<form method="post" action="" name="txt-data">
    <div class="input-form" style="display: inline-block;">
        <input type="text" name="rec-name" placeholder="Кому" style="display: block; margin-top: 10px;" required>
        <input type="text" name="subject" placeholder="Тема" style="display: block; margin-top: 10px;" required>
        <textarea name="txt-input" id="txt-input" cols="30" rows="10" style="margin-top: 10px;" placeholder="Введите сообщение здесь" required></textarea>
    </div>
    <br>
    <button type="submit" name="txt-send" value="txt-send" style="margin-top: 50px;">SEND</button>
</form>
<a href="index">На главную</a>
</html>