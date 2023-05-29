<?php

    // variable di luar bisa di pakai di dalam fungsi dengan menggunakan global
    // variable di dalam fungsi tidak bisa dipakai di luar 

    // kalau di javascript variable luar bisa dipakai di dalam fungsi tidak usah pakai global
    // tapi variable di dalam fungsi tidak bisa dipakai di luar

    $nama = "risa";

    function test(){
        // global $nama; // global digunakan untuk mengambil variable di luar fungsi
        $nama = "nussy";
        echo "variabel \$nama di dalam fungsi :" . $nama;
    }

    test();
    echo "<br>";
    echo "variabel \$nama di luar fungsi : ".$nama;

?>