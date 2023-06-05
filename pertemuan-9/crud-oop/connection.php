<?php

class connection {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $DB = "latihan";

    protected function konek() {
        return mysqli_connect($this->host,$this->$user,$this->$pass,$this->$DB);
    }
}

?>