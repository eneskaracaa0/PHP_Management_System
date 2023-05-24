<?php
session_start();
require_once 'db/database.php';

// Kullanıcının oturum bilgilerini kontrol etme
if (!isset($_SESSION['username'])) {
    // Kullanıcı oturumu yoksa, giriş sayfasına yönlendirme veya hata mesajı gösterme gibi bir işlem yapılabilir.
    header('Location: index.php');
    exit;
}

//update işlemi
if ($_SERVER['REQUEST_METHOD'] === 'POST' AND isset($_POST['update'])) {
  // Form verilerini alma
  $username = $_POST['username'];
  $surname = $_POST['surname'];
  $password = $_POST['password'];
  $status = isset($_POST['status']) ? $_POST['status'] : 'pasif'; // Varsayılan olarak pasif

  // Veritabanında güncelleme işlemi
  $stmt = $db->prepare("UPDATE users SET surname=:surname, password=:password, status=:status WHERE username=:username");
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':surname', $surname);
  $stmt->bindParam(':password', $password);
  $stmt->bindParam(':status', $status);

  if ($stmt->execute()) {
    // Güncelleme başarılı, mesaj gösterme veya yönlendirme yapabilirsiniz
    echo "Bilgiler güncellendi!";
     header('Location: panel.php'); 
    exit;
  } else {
    // Güncelleme başarısız, hata mesajı gösterme
    echo "Bilgiler güncellenirken bir hata oluştu!";
  }
}

//updateend

$username = $_SESSION['username'];

// Kullanıcı bilgilerini veritabanından çekme
$veri = $db->prepare("SELECT * FROM users WHERE username=:username");
$veri->bindParam(":username", $username);
$veri->execute();
$result = $veri->fetch(PDO::FETCH_ASSOC);

// Verileri form inputlarında kullanma
?>

<?php require_once 'header.php';?>
   <style>
    .container {
  background-color: #fff;
  
  padding: 4em;
  border-radius: 0.5em;

}
   </style>

  <div class="container">
    <div class="row">
      <div class="col-md-4 mt-5">
         <h5>Kullanıcı Bilgileri</h5>
   <form method="POST" action="" >
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form6Example1" name="name" value="<?php echo $result['name']; ?>" class="form-control" />
       <label class="form-label" for="form6Example1">Ad</label>
  </div>
</div>
<div class="col">
  <div class="form-outline">
    <input type="text" id="form6Example2" name="surname" value="<?php echo $result['surname']; ?>" class="form-control" />
    <label class="form-label" for="form6Example2">Soyad</label>
  </div>
</div>

 

  </div>
  <!-- Text input -->
  <div class="form-outline mb-4">
    <input type="text" id="form6Example3" name="username" value="<?php echo $result['username']; ?>" class="form-control" />
    <label class="form-label" for="form6Example3">Kullanıcı Adı</label>
  </div>
  <!-- Text input -->
  <div class="form-outline mb-4">
    <input type="text" id="form6Example4" name="password" value="<?php echo $result['password']; ?>" class="form-control" />
    <label class="form-label" for="form6Example4">Şifre</label>
  </div>
 <div class="form-check">
  <input class="form-check-input" type="radio" name="status" value="aktif" <?php if($result['status']=='aktif') echo 'checked'; ?> id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
   Aktif
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" value="pasif"<?php if($result['status']=='pasif') echo 'checked';?> name="status" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
    Pasif
  </label>
</div>
  <button type="submit" name='update' class="btn btn-info">Güncelle</button>
  <a href="kullaniciekle.php"><i class="fa-solid fa-user-plus"></i></a>
    </form>
      </div>
    </div>
  </div>
      

        <?php require_once'footer.php';?>
