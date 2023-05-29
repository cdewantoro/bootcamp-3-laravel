<?php

    $nama = "Nurul";

        // echo "While Loop";
        // echo "<br>";
        // echo "<br>";

        // $kondisi = 1;
        // while($kondisi < 10){
        //     echo "Testing while Loop";
        //     echo "<br>";

        //     $kondisi++;
        // }

        // echo "<br>";
        // echo "for loop";
        // echo "<br>";
        // echo "<br>";

        // for($i = 0; $i < 10; $i++) {
        //     echo "Testing for Loop";
        //     echo "<br>";
        // }


        // echo "If statement";
        // echo "<br>";

        // if($nama === "Rissa") {
        //     echo "Ini Risa";
        // }elseif ($nama === "Nurul") {
        //     echo "Ini Nurul";
        // }else {
        //     echo "Tidak ada";
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
    <h1><?php echo $nama; ?></h1>
    <?php 
        if($nama === "risa"){
                echo "<p>Selamat datang manusia keren</p>";
        }elseif($nama === "nurul"){
                echo "<p>Selamat datang manusia cantik</p>";
        }else {
                echo "<p>Selamat datang manusia</p>";
        }
    ?>
    <?php for($i = 1; $i < 10; $i++) {?>
    <li>list yang ke - <?php echo $i ?></li>
    <?php } ?>
    <br><br>
    <?php for($i = 1; $i < 5; $i++) {?>
    <li>list yang ke - <?= $i ?></li>
    <?php } ?>
</body>
</html>