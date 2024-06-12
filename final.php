
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Odevi</title>
</head>
<body>  
<form name="Form" action="veritabani.php" method="post">
 <table>
    <tr>
      <th>İsim</th>
      <td><input type="text" name="isim" id=""></td>
    </tr>
   <tr>
    <th>Soyisim</th>
    <td><input id type="text" name="soyisim" id=""></td> 
   </tr>
   <tr>
    <th>Email</th>
    <td><input type="email" name="mail" id=""></td> 
   </tr>
   <tr>
    <th>Şifre</th>
    <td><input  type="password" name="sifre" id=""></td>  
   </tr>
   <tr>
    <th>Şifre Tekrar</th>
    <td><input type="password" name="sifretekrar" id=""></td>
   </tr>
   <tr>
    <th>Doğum Tarihi</th>
    <td><input  type="date" name="dogum" id=""></td> 
   </tr>
   <tr>
    <th>Cinsiyet</th>
    <td><input type="text" name="cinsiyet" id=""></td> 
   </tr>
   <tr>
    <td>
     
    </td>
   </tr>
  </form>
 </table>
<input type="submit" value="Kayıt ol" name="kayit">
</form>   
</body>
<script>
const form = document.getElementsByName('Form')[0];

form.addEventListener('submit', function(event) {
  const isim = document.getElementsByName('isim')[0].value;
  const soyisim = document.getElementsByName('soyisim')[0].value;
  const mail = document.getElementsByName('mail')[0].value;
  const sifre = document.getElementsByName('sifre')[0].value;
  const dogumtarihi = document.getElementsByName('dogum')[0].value;
  const cinsiyet = document.getElementsByName('cinsiyet')[0].value;

  if (!isim ||!soyisim ||!mail ||!sifre ||!dogumtarihi ||!cinsiyet) {
    alert("Lütfen tüm alanları doldurunuz."); 
    event.preventDefault(); 
    return;
  }

  if (sifre.length < 8) {
    alert("Şifre en az 8 karakter olmalıdır."); 
    event.preventDefault();
    return;
  }

  if (!/^(?=.*[A-Z])(?=.*\d).+$/.test(sifre)) {
    alert("Şifreniz çok basit.");
    event.preventDefault();
    return;
  }

});

</script>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $sifre = $_POST["sifre"];
  $sifretekrar = $_POST["sifretekrar"];

  if (empty($sifre) || empty($sifretekrar)) {
    $error = "Lütfen tüm alanları doldurun.";
  } elseif ($sifre != $sifretekrar) {
    $error = "Şifre eşleşmiyor."; 
  } else {
    $hashed_password = password_hash($sifre, PASSWORD_DEFAULT);

  }

  if (isset($error)) {
    echo "<p style='color: red;'>$error</p>";
  }
}


?>