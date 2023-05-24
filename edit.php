<?php
session_start();
require_once 'db/database.php';

$ID = $_GET['ID'];

$query = "SELECT users.id, users.username, users.name, users.surname, contact_info.email, contact_info.phone, address_info.address, address_info.city, address_info.country, personal_details.birthdate, personal_details.gender, personal_details.bio, users.status, users.role_id
          FROM users
          INNER JOIN contact_info ON users.id = contact_info.user_id
          INNER JOIN address_info ON users.id = address_info.user_id
          INNER JOIN personal_details ON users.id = personal_details.user_id
          WHERE users.id = :id";

$stmt = $db->prepare($query);
$stmt->bindParam(':id', $ID);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$rolesQuery = "SELECT * FROM roles";
$rolesStmt = $db->prepare($rolesQuery);
$rolesStmt->execute();
$roles = $rolesStmt->fetchAll(PDO::FETCH_ASSOC);
?>


<?php
if ($_SESSION['role_id'] == 1) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Güncelle'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $birthdate = $_POST['birthdate'];
        $gender = $_POST['gender'];
        $status = $_POST['status'];
        $role_id = $_POST['role_id'];
        $bio = $_POST['bio'];

        $query = "UPDATE users 
                  INNER JOIN contact_info ON users.id = contact_info.user_id
                  INNER JOIN address_info ON users.id = address_info.user_id
                  INNER JOIN personal_details ON users.id = personal_details.user_id
                  SET users.username = :username, users.password = :password, users.name = :name, users.surname = :surname,
                  contact_info.email = :email, contact_info.phone = :phone, address_info.address = :address, address_info.city = :city,
                  address_info.country = :country, personal_details.birthdate = :birthdate, personal_details.gender = :gender,
                  users.status = :status, users.role_id = :role_id, personal_details.bio = :bio
                  WHERE users.id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':birthdate', $birthdate);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':role_id', $role_id);
        $stmt->bindParam(':bio', $bio);
        $stmt->bindParam(':id', $ID);

        if ($stmt->execute()) {
            echo "Kullanıcı güncelleme
            işlemi başarılı bir şekilde gerçekleştirildi.";
} else {
echo "Kullanıcı güncelleme işlemi sırasında bir hata oluştu.";
}
}
}
?>

<?php require_once 'header.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="">
                <label>Username</label>
                <input type="text" id="username" class="form-control" name="username" value="<?php echo $user['username']; ?>" required>
                 <label for="password">Şifre:</label>
            <input type="password" class="form-control" id="password" name="password"  required>

            <label for="name">Ad:</label>
            <input type="text" id="name" class="form-control" name="name" value="<?php echo $user['name']; ?>" required>

            <label for="surname">Soyad:</label>
            <input type="text" id="surname" class="form-control" name="surname" value="<?php echo $user['surname']; ?>" required>

            <label for="email">E-posta:</label>
            <input type="email" id="email" class="form-control" name="email" value="<?php echo $user['email']; ?>" required>

            <label for="phone">Telefon:</label>
            <input type="text" id="phone" class="form-control" name="phone" value="<?php echo $user['phone']; ?>" required>

            <label for="address">Adres:</label>
            <input type="text" id="address" class="form-control" name="address" value="<?php echo $user['address']; ?>" required>

            <label for="city">Şehir:</label>
            <input type="text" id="city" class="form-control" name="city" value="<?php echo $user['city']; ?>" required>

            <label for="country">Ülke:</label>
            <input type="text" id="country" class="form-control" name="country" value="<?php echo $user['country']; ?>" required>

            <label for="birthdate">Doğum Tarihi:</label>
            <input type="date" id="birthdate" class="form-control" name="birthdate" value="<?php echo $user['birthdate']; ?>" required>

            <label for="gender">Cinsiyet:</label>
            <select id="gender" class="form-control" name="gender" required>
                <option value="Erkek" <?php echo ($user['gender'] == 'Erkek') ? 'selected' : ''; ?>>Erkek</option>
                <option value="Kadın" <?php echo ($user['gender'] == 'Kadın') ? 'selected' : ''; ?>>Kadın</option>
            </select>

            <label for="status">Durum:</label>
            <select id="status" class="form-control" name="status" required>
                <option value="aktif" <?php echo ($user['status'] == 'aktif') ? 'selected' : ''; ?>>Aktif</option>
                <option value="pasif" <?php echo ($user['status'] == 'pasif') ? 'selected' : ''; ?>>Pasif</option>
            </select>

            <label for="role_id">Rol:</label>
            <select id="role_id" class="form-control" name ="role_id" required>
                <?php foreach ($roles as $role): ?>
<option value="<?php echo $role['id']; ?>" <?php echo ($role['id'] == $user['role_id']) ? 'selected' : ''; ?>><?php echo $role['name']; ?></option>
<?php endforeach; ?>
</select>
  <label for="bio">Biyografi:</label>
            <textarea id="bio" class="form-control" name="bio" rows="4" cols="50" required><?php echo $user['bio']; ?></textarea><br><br>

            <input type="submit" class="btn btn-info" name="Güncelle">
        </form>
    </div>
</div>
</div>




 <?php require_once'footer.php';?>