<?php
session_start();
require_once 'db/database.php';

if ($_SESSION['role_id'] == 1) { // Sadece admin 

  if (isset($_GET['ID'])) {
    $userID = $_GET['ID'];

    $query = "DELETE FROM users WHERE id = :userID";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':userID', $userID);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      header('Location: kullanicilar.php');
      exit();
    } else {
      echo 'Bir hata oluştu';
      exit();
    }
  } else {
    echo 'Beklenmedik bir hata oluştu';
    exit();
  }

} else {
  echo 'Bu işlemi gerçekleştirmek için yeterli yetkiye sahip değilsiniz.';
  exit();
}
?>