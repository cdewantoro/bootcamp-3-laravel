<?php

$datas = [
        ["nama" => "Rissa Nussy","umur" => 17, 
        "hobi" => 'nonton',"pria"=>true],
        ["nama"=>"Nurul Hasanah","umur"=> 15, "hobi"=>'masak',"pria"=>false],
        ["nama"=>"Ali","umur"=>17,"hobi"=>'makan',"pria"=>true]
];



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
    <h1>Data Orang</h1>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>Nama</th>
            <th>Umur</th>
            <th>Hobi</th>
            <th>Jenis Kelamin</th>
        </tr>
            <?php
                // for($i=0;$i<count($datas);$i++) {
                //     echo "<tr><td>";
                //     echo $datas[$i]['nama'];
                //     echo "</td><td>";
                //     echo $datas[$i]['umur'];
                //     echo "</td><td>";
                //     echo $datas[$i]['hobi'];
                //     echo "</td><td>";
                //     echo $datas[$i]['pria'];
                //     echo "</td></tr>";
                // }
            ?>

            <?php

                foreach($datas as $data) {
                    echo "<tr><td>";
                    echo $data['nama'];
                    echo "</td><td>";
                    echo $data['umur'];
                    echo "</td><td>";
                    echo $data['hobi'];
                    echo "</td><td>";
                    echo $data['pria'];
                    echo "</td></tr>";
                }


            ?>
    </table>
</body>
</html>
