<?php 







$host="localhost";
$veritabani_ismi="members"; //Veritabanı ismi
$kullanici_adi="root";//kullanıcı ismi
$sifre="";//kullanıcı şifresi



try{
	$db = new PDO("mysql:host=$host;dbname=$veritabani_ismi;charset=utf8",$kullanici_adi,$sifre);
} catch(PDOException $e){
	echo "Veritabanı Bağlantı İşlemi Başarısız Oldu";
	echo $e->getMessage();
	exit;
}







?>