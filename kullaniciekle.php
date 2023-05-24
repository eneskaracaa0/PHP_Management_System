 <?php
// Veritabanı bağlantısı ve diğer gerekli dosyaların dahil edilmesi
require_once 'db/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Form verilerini alma
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $status=$_POST['status'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $bio = $_POST['bio'];
    $role_id = $_POST['role_id'];

    // Kullanıcı tablosuna veri ekleme
    $stmt = $db->prepare("INSERT INTO users (username, password, name, surname,status,role_id) VALUES (:username, :password, :name, :surname,:status,:role_id)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':surname', $surname);
    $stmt->bindParam(':status', $status);
   $stmt->bindParam(':role_id', $role_id);
    $stmt->execute();

    // Kullanıcının eklenen kaydının birincil anahtar değerini alma
    $user_id = $db->lastInsertId();


    $stmt = $db->prepare("INSERT INTO contact_info (user_id, email, phone) VALUES (:user_id, :email, :phone)");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->execute();


    $stmt = $db->prepare("INSERT INTO address_info (user_id, address, city, country) VALUES (:user_id, :address, :city, :country)");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':country', $country);
    $stmt->execute();


    $stmt = $db->prepare("INSERT INTO personal_details (user_id, birthdate, gender, bio) VALUES (:user_id, :birthdate, :gender, :bio)");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':birthdate', $birthdate);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':bio', $bio);
    $stmt->execute();

  
    header('Location:kullanicilar.php');
}
?>

<?php require_once 'header.php'; ?>
<style>
    .container{
         background-color: #fff;
  
  padding: 4em;
  border-radius: 0.5em;

    }
</style>

 <div class="container">
            <div class="row">
                <div class="col-md-6">
                     <form method="POST" action="">
       
        <label>Username</label>
 <input type="text" id="username" class="form-control" name="username" required>

        <label for="password">Şifre:</label>
        <input type="password" class="form-control" id="password" name="password" required>

        <label for="name">Ad:</label>
        <input type="text" id="name" class="form-control" name="name" required>

        <label for="surname">Soyad:</label>
        <input type="text" id="surname" class="form-control" name="surname" required>

        <label for="email">E-posta:</label>
        <input type="email" id="email" class="form-control" name="email" required>

        <label for="phone">Telefon:</label>
        <input type="text" id="phone" class="form-control" name="phone" required>

        <label for="address">Adres:</label>
        <input type="text" id="address" class="form-control" name="address" required>

        <label for="city">Şehir:</label>
        <input type="text" id="city" class="form-control" name="city" required>

        <label for="country">Ülke:</label>
        <input type="text" id="country" class="form-control" name="country" required>

        <label for="birthdate">Doğum Tarihi:</label>
        <input type="date" id="birthdate" class="form-control" name="birthdate" required>

        <label for="gender">Cinsiyet:</label>
        <select id="gender" class="form-control" name="gender" required>
            <option value="Erkek">Erkek</option>
            <option value="Kadın">Kadın</option>
            <option value="Diğer">Diğer</option>
        </select>

        <label for="status">Durum:</label>
<select id="status" class="form-control" name="status" required>
    <option value="aktif">Aktif</option>
    <option value="pasif">Pasif</option>
</select>

 <label for="role_id">Rol</label>
<select id="role_id" class="form-control" name="role_id" required>
    <option value="1">Admin</option>
    <option value="2">user</option>
</select>

        <label for="bio" >Biyografi:</label>
        <textarea id="bio" class="form-control" name="bio" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" class="btn btn-info" value="Kaydet">
    </form>
                </div>
                <div class="col-md-6 p-5">
                    <img src="img/user.png">
                </div>


            
            </div>
        </div>

    <?php require_once'footer.php';?>