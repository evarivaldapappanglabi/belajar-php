<?php
// 1. buat koneksi dengan mysql
$com = mysql_connect(",localhost","","seal_fakultas");

//2. cek koneksi dengan mysql
if(mysql_connect_errno()){
    echo "koneksi gagal". mysqli_connect_error();
}else{
    echo "koneksi berhasil";
}
// 3. membaca data dari tabel mysql.
$query = "SELECT * FROM mahasiswa";

// 4. tampilkan data,dengan menjalankan sql query
$result = mysql_query($con,$query);
$mahasiswa = [];
if ($result){
    // tampilkan data satu per satu
    while($row = mysqli_fetch_assoc($result)){
       $mahasiswa[] = $row;

    }
    mysql_free_result($result);
}
//5. tutup koneksi mysql
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <a href="insert.php">Tambah Data</a>
    <table border=1 style="width: 100%;">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Action</th>
        </tr>
        <?php foreach ($mahasiswa as $row): ?>
            <tr>
                <td><?= $row['nim'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['jenis_kelamin'] ?></td>
                <td><?= $row['tempat_lahir'] ?></td>
                <td><?= $row['tanggal_lahir'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td>
                    <a href="update.php?id=<?= $row['id'] ?>" >Edit</a> | 
                    <a href="delete.php?id=<?= $row['id'] ?>" >Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>