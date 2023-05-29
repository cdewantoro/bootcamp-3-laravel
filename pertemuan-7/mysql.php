<?php



    // MYSQL
    $host = "localhost";
    $user = "root";
    $pass = "";
    $DB = "latihan";

    $koneksi = mysqli_connect($host,$user,$pass,$DB);

    if(!$koneksi){
        echo "Error: ".mysqli_error($koneksi);
    }

    // echo "berhasil";
    $query = "SELECT * FROM users";
    $hasil = mysqli_query($koneksi, $query);

    function get_DB() {
        global $koneksi, $hasil;
        $query = "SELECT * FROM users";
        $hasil = mysqli_query($koneksi, $query);
    }

    get_DB();

    if($_POST){
        $nama = $_POST['nama'];
        $hobi = $_POST['hobi'];
        $umur = $_POST['umur'];

        $query2 = "INSERT INTO users (nama, hobi, umur) VALUES ('$nama','$hobi','$umur')";

        $hasil2 = mysqli_query($koneksi, $query2);

        if($hasil2){
            echo "Berhasil<br>";
            get_DB();
        }else {
            echo "Error : ".mysqli_error($koneksi);
        }
    }

    
    // var_dump($hasil);

    // while($row = mysqli_fetch_assoc($hasil)) {
    //     echo $row['nama'];
    //     echo "<br>";
    //     echo $row['hobi'];
    //     echo "<br>";
    //     echo $row['umur'];
    //     echo "<br>";
    //     echo "<br>";
    // }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="text" name="nama" placeholder="nama.."><br><br>
        <input type="text" name="hobi" placeholder="hobi.."><br><br>
        <input type="text" name="umur" placeholder="umur.."><br><br>
        <button>Masukkan Data</button>
    </form>
    <br>
    <br>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>Nama</th>
            <th>Hobi</th>
            <th>Umur</th>
        </tr>
        <?php while($row = mysqli_fetch_array($hasil)) { ?>
            <tr>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['hobi'] ?></td>
                <td><?= $row['umur'] ?></td>
            </tr>
      <?php  } ?>
    </table>
</body>
</html>