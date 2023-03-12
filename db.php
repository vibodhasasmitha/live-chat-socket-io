<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'live-chat-with-socket-io';

$conn = mysqli_connect($host, $user, $pass, $db);
if(!$conn){
    echo 'Database Not Found!';
}

?>