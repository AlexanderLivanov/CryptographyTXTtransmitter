<head>
    <link rel="stylesheet" href="style.css">
</head>
<div class="main-container">
    <div class="messages-list" style="background-color: #f7f7f7; width: 25%; height: 100%">
        <ol>
            <?php
            for ($n = 0; $n < count($txts); $n++) {

                echo ("<li>" . rtrim(mb_strimwidth($txts[$n], strlen($txts[$n]) - 15, strlen($txts[$n]))) . '' . "\r\n" . "</li>");
            }
            ?>
        </ol>
        <div id="fragment-1">
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
        </div>

    </div>
    <div class="message-box">

    </div>
</div>