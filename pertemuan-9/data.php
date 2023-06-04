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

        // public function test() {
        //     return "Hallo ". $this->nama;
        //     // var_dump($this);
        // }

    }
?>