<?php

    require_once "connection.php";

    class model extends connection {
        public $id_edit;
        public $nama;
        public $judul;
        public $tema;
        public $email;

        // public function __construct($id_edit){
        //     $this->id_edit = $id_edit;
        // }

        public function read() {
            if(!$this->konek()){
                echo "Error connection:".mysqli_error($this->konek());
            }
            $hasil = mysqli_query($this->konek(), "SELECT * FROM latihan_crud");

            if(mysqli_num_rows($hasil)>0) {
                while ($row = mysqli_fetch_assoc($hasil)) {
                    $this->nama =$row['nama'];
                    $this->judul =$row['judul'];
                    $this->tema =$row['tema'];
                    $this->email =$row['email'];
                }
            }
        }

        public function data(){
            $query = "SELECT * FROM latihan_crud";
            $hasil = mysqli_query($this->konek(), $query);
                
            if($hasil){
                return $hasil;
            }else {
                echo "gagal : " . mysqli_error($this->konek());
            }
        }

    }

?>