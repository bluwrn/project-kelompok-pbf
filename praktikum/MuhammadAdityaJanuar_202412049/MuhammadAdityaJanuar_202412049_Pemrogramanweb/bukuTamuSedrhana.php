<?php

$nama = "";
$email = "";
$pesan = "";
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama = htmlspecialchars(trim($_POST["nama"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $pesan = htmlspecialchars(trim($_POST["pesan"]));

    if (empty($nama) || empty($email) || empty($pesan)) {
        $error = "Semua data wajib diisi!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Format email tidak valid.";
    } else {
        $success = "Terima kasih, data berhasil dikirim.";
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Buku Tamu Digital STITEK Bontang</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Segoe UI,sans-serif;
}

body{

background:linear-gradient(135deg,#0f4c81,#1d70b8,#6cb4ee);

display:flex;

justify-content:center;

align-items:center;

min-height:100vh;

padding:20px;

}

.container{

width:900px;

background:white;

border-radius:20px;

overflow:hidden;

box-shadow:0 20px 40px rgba(0,0,0,.25);

display:flex;

flex-wrap:wrap;

}

.left{

flex:1;

background:linear-gradient(rgba(15,76,129,.8),rgba(15,76,129,.8)),
url("https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&w=900&q=80");

background-size:cover;

background-position:center;

color:white;

display:flex;

justify-content:center;

align-items:center;

text-align:center;

padding:40px;

}

.left h1{

font-size:34px;

margin-bottom:15px;

}

.left p{

font-size:17px;

line-height:28px;

}

.right{

flex:1;

padding:40px;

}

.right h2{

color:#0f4c81;

margin-bottom:10px;

}

.right p{

color:#666;

margin-bottom:25px;

}

input,textarea{

width:100%;

padding:14px;

margin-bottom:18px;

border:1px solid #ddd;

border-radius:10px;

font-size:15px;

transition:.3s;

}

input:focus,
textarea:focus{

outline:none;

border-color:#1d70b8;

box-shadow:0 0 8px rgba(29,112,184,.3);

}

textarea{

height:130px;

resize:none;

}

button{

width:100%;

padding:15px;

border:none;

background:#0f4c81;

color:white;

font-size:17px;

border-radius:10px;

cursor:pointer;

transition:.3s;

}

button:hover{

background:#1d70b8;

transform:translateY(-3px);

}

.error{

background:#ffe5e5;

padding:15px;

border-left:5px solid red;

margin-bottom:20px;

border-radius:8px;

}

.success{

background:#e8ffe8;

padding:15px;

border-left:5px solid green;

margin-bottom:20px;

border-radius:8px;

}

.result{

margin-top:25px;

padding:20px;

background:#f5faff;

border-radius:15px;

border:1px solid #d6e9ff;

}

.result h3{

color:#0f4c81;

margin-bottom:15px;

}

.result p{

margin:10px 0;

}

.footer{

margin-top:20px;

text-align:center;

font-size:14px;

color:#888;

}

@media(max-width:768px){

.container{

flex-direction:column;

}

.left{

height:250px;

}

}

</style>

</head>

<body>

<div class="container">

<div class="left">

<div>

<h1>📘 Buku Tamu Digital</h1>

<h2>STITEK Bontang</h2>

<br>

<p>

Selamat datang di Buku Tamu Digital STITEK Bontang.

Silakan isi identitas dan tinggalkan pesan sebagai bukti kunjungan Anda.

</p>

</div>

</div>

<div class="right">

<h2>Form Buku Tamu</h2>

<p>Silakan lengkapi data berikut.</p>

<?php

if($error!=""){
echo "<div class='error'>$error</div>";
}

if($success!=""){
echo "<div class='success'>$success</div>";
}

?>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

<input
type="text"
name="nama"
placeholder="Nama Lengkap"
value="<?php echo $nama;?>">

<input
type="email"
name="email"
placeholder="Alamat Email"
value="<?php echo $email;?>">

<textarea
name="pesan"
placeholder="Tuliskan pesan atau kesan Anda..."><?php echo $pesan;?></textarea>

<button type="submit">

📩 Kirim Pesan

</button>

</form>

<?php

if($success!=""){

?>

<div class="result">

<h3>Data yang Berhasil Dikirim</h3>

<p><strong>Nama :</strong> <?php echo $nama; ?></p>

<p><strong>Email :</strong> <?php echo $email; ?></p>

<p><strong>Pesan :</strong> <?php echo nl2br($pesan); ?></p>

</div>

<?php } ?>

<div class="footer">

© <?php echo date("Y"); ?> Buku Tamu Digital STITEK Bontang

</div>

</div>

</div>

</body>
</html>