<!DOCTYPE html>
<html>
<body>

<form method="get" action="">
Nama: <input type="text" name="nama">
<input type="submit" value="Kirim">
</form>

<br>

<?php
if (isset($_GET['nama'])) {
    $nama = htmlspecialchars($_GET['nama']);
    echo "Halo, " . $nama . "!";
}
?>

</body>
</html>