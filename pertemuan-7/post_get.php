<?php

    // Variable super global

    var_dump($_GET);
    echo "<br>";
    var_dump($_POST);
    echo "<br>";

    echo $_GET['nama'];
    echo "<br>";
    echo $_GET['umur'];

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
    <form action="" method="get">
        <input type="text" name="nama">
        <input type="text" name="umur">
        <button>Ok</button>
    </form>
    <form action="" method="post">
        <input type="text" name="nama">
        <input type="text" name="umur">
        <button>Ok</button>
    </form>
</body>
</html>