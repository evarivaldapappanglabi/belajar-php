<?php
    if (isset($_POST['submit'])){
        //var_dump($_POST);
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $id_jurusan = $_POST['id_jurusan'];
        $tpt_lahir = $_POST['tpt_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $gender = $_POST['gender'];
        $alamat = $_POST['alamat'];

        // Buat koneksi dengan MySQL
        $con = mysqli_connect("localhost","root","","seal_fakultas");

        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }else{
            echo 'koneksi berhasil';
        }

        $sql = "insert into mahasiswa (id_jurusan, nim, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat)
        values ($id_jurusan,'$nim', '$nama', '$gender', '$tpt_lahir', '$tgl_lahir', '$alamat')";

        if (mysqli_query($con, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
          
        mysqli_close($con);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
</head>
<body>
    <h1>Tambah Data</h1>

    <form action="" method="post">
        NIM: <input type="text" name="nim"><br>
        Nama: <input type="text" name="nama"><br>
        ID Jurusan: <input type="number" name="id_jurusan"><br>
        Jenis Kelamin: <input type="text" name="gender"><br>
        Tempat Lahir: <input type="text" name="tpt_lahir"><br>
        Tanggal Lahir (yyyy-mm-dd): <input type="text" name="tgl_lahir"><br>
        Alamat: <input type="text" name="alamat"><br>
        <button type="submit" name="submit">Tambah Data</button>
    </form>
</body>
</html>