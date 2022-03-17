<?php

$host = "mysql-server";
$uname = "root";
$passwd = "secret";
$database = "new_db";

$conn = mysqli_connect($host,$uname,$passwd,$database);
 
if(isset($_POST['signup'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $cpass = $_POST['re_pass'];

    
    $existquery = "Select * from tb_user where username = '$name'";
    $result1 = mysqli_query($conn,$existquery);
    $nume = mysqli_num_rows($result1);
    if($nume > 0 )
     {
         echo "this username is already exixts ";
     }
     else{
    $query1 = " INSERT INTO `tb_user`(`id`, `username`, `email`, `password`) VALUES (null,'$name','$email','$pass')" ;

    $result = mysqli_query($conn,$query1);
    
    if($result !=0){
        echo "you have registered yourself";
    }
}

}

if (isset($_POST['signin'])){
    $yname = $_POST['your_name'];
    $ypass = $_POST['your_pass'];
    $query2 = "Select * from tb_user where username = '$yname' AND password = '$ypass' ";
    $result1 = mysqli_query($conn,$query2);

    $num = mysqli_num_rows($result1);
    if($num == 1){
        echo "welcome"." ".$yname;
        
        
    }
}



?>