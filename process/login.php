<?php
include('../db.php');
session_start();

if(isset($_POST['login'])){

    $uname = $_POST['uname'];
    $password = $_POST['password'];

    $login = "SELECT * FROM users WHERE username='$uname' AND password='$password'";
    $login_run = mysqli_query($conn, $login);

    if($login_run){
        if(mysqli_num_rows($login_run) > 0){

            while($row = mysqli_fetch_assoc($login_run)){
                $_SESSION['u_id'] = $row['id'];
                $_SESSION['uname'] = $row['username'];
                $_SESSION['name'] = $row['name'];
            }

            $res = [
                'status' => 200,
                'msg' => 'Login Successfull!',
            ];
        }else{
            $res = [
                'status' => 400,
                'msg' => 'Incorrect Email or Password!',
            ];
        }
    }else{
        $res = [
            'status' => 400,
            'msg' => 'System Error!',
        ];
    }
    echo json_encode($res);
}