<?php require_once 'db/database.php';?>
<?php require_once 'header.php';?>
<?php
$query = "SELECT users.id, users.username, users.name, users.surname, contact_info.email, contact_info.phone, address_info.address, address_info.city, address_info.country, personal_details.birthdate, personal_details.gender, personal_details.bio
          FROM users
          INNER JOIN contact_info ON users.id = contact_info.user_id
          INNER JOIN address_info ON users.id = address_info.user_id
          INNER JOIN personal_details ON users.id = personal_details.user_id";

$stmt = $db->prepare($query);
$stmt->execute();
?>


        <div class="table-responsive">
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Kullanıcı Adı</th>
      <th scope="col">Adı</th>
      <th scope="col">Soyadı</th>
         <th scope="col">Email</th>
            <th scope="col">Telefon Numarası</th>
               <th scope="col">Adres</th>
                  <th scope="col">Şehir</th>
                     <th scope="col">Ülke</th>
                     <th scope="col">İşlemler</th>
                      
    </tr>
  </thead>
  <tbody>
    <?php 
    foreach($stmt as $data){

   
    
    ?>
    <tr>
      <th scope="row"><?php echo $data['id'];?></th>
      <td><?php echo $data['username'];?></td>
      <td><?php echo $data['name'];?></td>
      <td><?php echo $data['surname'];?></td>
       <td><?php echo $data['email'];?></td>
        <td><?php echo $data['phone'];?></td>
         <td><?php echo $data['address'];?></td>
             <td><?php echo $data['city'];?></td>
                  <td><?php echo $data['country'];?></td>
                    <td><a href="edit.php?ID=<?php echo $data['id']?>"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>
                      <a href="delete.php?ID=<?php echo $data['id'] ?>"><i class="fa-solid fa-user-minus" style="color:red;"></i></a></td>
    </tr>
    
   <?php }?>
  </tbody>
</table>
</div>

  <?php require_once'footer.php';?>