<?php

    // OOP
    // Pemrograman yang berorientasi object

    // Property = adalah sebuah variable yang berada di dalam object / class
    // Method = adalah sebuah function yang berada di dalam object / class

    class Data {
        // public (memungkinan dipakai diluar class)
        // protected (hanya bisa di dalam class)
        // private

        // public $nama = 'Risa Nuusy';
        // protected $nama = 'Risa Nussy';

        // fungsi konstruk pada saat pertama kali di load
        public $nama;
        public $umur;

        public function __construct($nm,$u){
            // echo "hallo";
            // echo "<br>;
            $this->nama = $nm;
            $this->umur = $u;
        }

        public function test() {
            return "Hallo ". $this->nama;
            // var_dump($this);
        }

        // public function testParams($params) {
        //     return "Hallo". $this->nama. "$params";
        // }

        // inheritance


    }

    $risa = new Orang("Risa Nussy", 12);

    echo $risa->nama;


    // $risa = new Data();
    // $orang = new Data();

    // echo $risa->nama;
    // echo "<br>";
 
    // $orang->nama = "Naufal";
    // echo $orang->test();
    // echo "<br>";

    // $risa->nama = "Nurul";
    // echo $risa->test();
    // echo "<br>";

    // var_dump ($risa->test());
    // echo "<br>";
    // var_dump ($orang->test());

    // $risa = new Data("Rissa Nussy",17);
    // $orang = new Data("Naufal",12);
    // $nurul = new Data("Nurul",42);

    // echo $risa->nama;
    // echo "<br>";
    // echo $risa->umur;
    // echo "<br>";

    // echo $nurul->nama;
    // echo "<br>";
    // echo $nurul->umur;
    // echo "<br>";

    // echo $orang->test();
    // echo "<br>";
    // echo $orang->umur;
    // echo "<br>";


?>