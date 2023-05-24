<?php
session_start();
require_once 'db/database.php';


// Kullanıcı girişi
if (isset($_POST['login'])) {
     $username=$_POST['username'];
     $password=$_POST['password'];

     $sorgu=$db->prepare("SELECT * FROM users WHERE username=? AND password=?");
     $sorgu->execute(array(
       $username,$password)
     );
     $kullanici=$sorgu->fetch(PDO::FETCH_ASSOC);
     $sonuc=$sorgu->rowcount();
     if ($sonuc==0) {
         header("location:index.php?basarisiz");
     } else {
        $_SESSION['username']=$username;
        $_SESSION['role_id'] = $user['role_id'];

         header("location:panel.php?basarili");
     }

 }



?>