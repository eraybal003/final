<?php
$sunucuadi = "localhost";
$kullaniciadi = "root";
$parola = "";
$vt = "final";

$baglanti = new mysqli($sunucuadi,$kullaniciadi,$parola,$vt);

if ($baglanti -> connect_error) {
    die("Bağlantı Başarısız:" . $baglanti->connect_error);
}
else {
    echo "Bağlantı Başarılı";
}

$isim = $_POST['isim'];
$soyisim = $_POST['soyisim'];
$mail = $_POST['mail'];
$sifre = $_POST['sifre'];
$dogumtarihi = $_POST['dogum'];
$cinsiyet = $_POST['cinsiyet'];

$sql = "INSERT INTO `kisibilgileri`(`İsim`, `Soyisim`, `Email`, `sifre`, `dogum_tarihi`, `cinsiyet`) VALUES ('$isim','$soyisim','$mail','$sifre','$dogumtarihi','$cinsiyet')";
if (mysqli_query($baglanti,$sql)) {
    header("Location: basarili.php");
}else {
    echo "Kayıt Başarısız";
}
$baglanti->close();
?>