<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu Digital STITEK Bontang</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 2px 10px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #2c3e50;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }

        .error {
            margin-top: 20px;
            background-color: #ffe6e6;
            color: #c0392b;
            padding: 15px;
            border-radius: 5px;
        }

        .success {
            margin-top: 20px;
            background-color: #e8f8f5;
            color: #117864;
            padding: 15px;
            border-radius: 5px;
        }

        .data-box {
            margin-top: 15px;
            background-color: #fafafa;
            padding: 15px;
            border-left: 5px solid #3498db;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>Buku Tamu Digital STITEK Bontang</h1>

    <form method="POST" action="">

        <label for="nama">Nama Lengkap</label>
        <input type="text" name="nama" id="nama">

        <label for="email">Alamat Email</label>
        <input type="email" name="email" id="email">

        <label for="pesan">Pesan / Komentar</label>
        <textarea name="pesan" id="pesan"></textarea>

        <button type="submit">Kirim Pesan</button>

    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama = trim($_POST['nama']);
        $email = trim($_POST['email']);
        $pesan = trim($_POST['pesan']);

        if (empty($nama) || empty($email) || empty($pesan)) {

            echo '
            <div class="error">
                <strong>Error!</strong><br>
                Semua kolom harus diisi.
            </div>
            ';

        } else {

            $nama = htmlspecialchars($nama);
            $email = htmlspecialchars($email);
            $pesan = htmlspecialchars($pesan);

            echo '
            <div class="success">
                <strong>Pesan berhasil dikirim!</strong>
            </div>

            <div class="data-box">
                <h3>Data Pengunjung</h3>

                <p><strong>Nama:</strong> ' . $nama . '</p>

                <p><strong>Email:</strong> ' . $email . '</p>

                <p><strong>Pesan:</strong><br>' . nl2br($pesan) . '</p>

            </div>
            ';
        }
    }

    ?>

</div>

</body>
</html>