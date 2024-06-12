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
$sql = "SELECT * FROM kisibilgileri";
$sonuc = $baglanti -> query($sql);
if ($sonuc -> num_rows > 0) {
    while ($satir = $sonuc -> fetch_assoc()) {
        echo "<br>"."İsim:" . $satir["İsim"]. " <br>" . "Soyisim:" . $satir["Soyisim"]. "<br>" . "Email:" . $satir["Email"]."<br>". "Doğum Tarihi:" . $satir["dogum_tarihi"]."<br>"."Cinsiyet:" . $satir["cinsiyet"];
    }
}
else {
    echo "<br>"."Sonuç yok";
}
?>