<!-- Array -->

<?php

    // Array
    // sebuah tipe data yang mampu menampung banyak value
    // index array dimulai dari nol 


    // $datas = ["Rissa Nussy", 17, 'nonton', true];

    // var_dump($datas);

    // echo $datas[0];
    // echo "<br>";
    // echo $datas[1];
    // echo "<br>";

    // for($i=0;$i< count($datas);$i++) {
    //     echo $datas[$i];
    //     echo "<br>";
    // }

    // for untuk menangani array

    // foreach($datas as $data){
    //     echo $data;
    //     echo "<br>";
    // }

    // multidemensional array

    // $dataLagis = [
    //     ["Rissa Nussy",17,'nonton',true],
    //     ["Nurul Hasanah", 15, 'masak', false],
    //     ["Ali", 17, 'makan', true]
    // ];
    
    // echo $dataLagis[0][0];

    // echo "<br>";
    // echo "<br>";
    // echo "<br>";

    // $hitungData = count($dataLagis);

    // var_dump($hitungData);

    // echo "<br>";
    // echo "<br>";
    // echo "<br>";


    // foreach ($dataLagis as $dataLagi) {
    //     // var_dump($dataLagi);
    //     foreach ($dataLagi as $dataAja) {
    //         echo $dataAja;
    //         echo "<br>";
    //     }
    //     echo "<br>";
    // }


    // for($i=0;$i<count($dataLagis);$i++) {
    //     echo "<br>";
    //     echo $dataLagis[$i][0];
    //     echo "<br>";
    //     echo $dataLagis[$i][1];
    //     echo "<br>";
    //     echo $dataLagis[$i][2];
    //     echo "<br>";
    //     echo $dataLagis[$i][3];
    // }

    // for($i=0;$i<count($dataLagis);$i++) {
    //     for($j=0;$j<count($dataLagis[$i]);$j++){
    //         echo $dataLagis[$i][$j];
    //         echo "<br>";
    //     }
    //     echo "<br>";
    // }

    // Array Associative
    // Tipe data yang mampu menampung variable

    $datas = [
        "nama" => "Risa Nussy",
        "umur" => 17,
        "hobi" => 'nonton',
        "pria" => true
    ];

    echo $datas['nama'];

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
    <script>

    let datas = {
        nama : "risa",
        umur : 17,
        hobi : 'nonton',
        pria: true
    }

    console.log(datas.nama);
    console.log(datas["nama"]);


    </script>
</body>
</html>