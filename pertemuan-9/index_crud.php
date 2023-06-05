<?php

class database {

    private $host;
    private $user;
    private $pass;
    private $DB;

    public function __construct ($host, $user, $pass, $DB){
        $this-> host = $host;
        $this-> user = $user;
        $this-> pass = $pass;
        $this-> DB = $DB;

    }

    public function connect() {
        $this-> connection = mysqli_connect($this->host,$this->user,$this->pass,$this->DB);

        if(!$this->connection) {
            echo "Error: ".mysqli_error($this->connection);
        }
    }
    
    public function hasil() {   
        $this-> query = mysqli_query($this->connect, "SELECT * FROM $this->DB_Table");
    }
}

$host = "localhost";
$user = "root";
$pass = "";
$DB = "latihan";
$DBTable = "latihan_crud";

$db = new database($host, $user, $pass, $DB,$DBTable);
$db->connect();

var_dump ($db->hasil();

?>