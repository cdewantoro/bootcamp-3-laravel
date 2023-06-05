<?php

class DatabaseConnection
{
    private $host;
    private $user;
    private $pass;
    private $DB;
    private $connection;

    public function __construct($host, $user, $pass, $DB)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->DB = $DB;
        $this->connect();
    }

    public function connect()
    {
        $this->connection = mysqli_connect($this->host, $this->user, $this->pass, $this->DB);
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}

class CrudForm
{
    private $judul;
    private $nama;
    private $buku;
    private $tema;
    private $email;

    public function __construct()
    {
        $this->judul = isset($_GET['judul']) ? $_GET['judul'] : "Tambah";
        $this->nama = '';
        $this->buku = '';
        $this->tema = '';
        $this->email = '';
    }

    public function fetchRecord($id)
    {
        $koneksi = new DatabaseConnection("localhost", "root", "", "latihan");
        $connection = $koneksi->getConnection();

        $hasil = mysqli_query($connection, "SELECT * FROM latihan_crud WHERE id = $id");

        while ($row = mysqli_fetch_assoc($hasil)) {
            $this->nama = $row['nama'];
            $this->buku = $row['buku'];
            $this->tema = $row['tema'];
            $this->email = $row['email'];
        }
    }

    public function renderForm()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <!-- bootstrap css -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
            <!-- font awesome css -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        </head>

        <body>
            <div class="container pt-4" style="padding-right: 40%">
                <a href="oop_crud.php">Kembali</a>
                <h1><i class="fa-solid fa-book"></i><?= $this->judul ?> Buku</h1>
                <br><br>
                <form action="oop_crud.php?judul=<?= $this->judul ?>&edit=<?= $id ?>" method="post">
                    <div class="mb-3 row">
                        <label for="nama" class="form-label">Nama</label><input type="text" class="form-control" id="nama" name="nama" value="<?= $this->nama ?>">
                    </div>
                    <div class="mb-3 row">
                        <label for="judul" class="form-label">Judul</label><input type="text" class="form-control" id="judul" name="judul" value="<?= $this->buku ?>">
                    </div>
                    <div class="mb-3 row">
                        <label for="tema" class="form-label">Tema</label>
                        <select type="text" class="form-control" id="tema" name="tema">
                            <option value="<?= $this->tema ?>" selected><?= $this->tema ?></option>
                            <option value="sains">Sains</option>
                            <option value="spiritual">Spritiual</option>
                            <option value="fantasy">Fantasy</option>
                            <option value="sejarah">Sejarah</option>
                            <option value="umum">Umum</option>
                        </select>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="form-label">Email</label><input type="text" class="form-control" id="email" name="email" value="<?= $this->email ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <!-- option 1 : bootstrap bundle with popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        </body>

        </html>
    <?php
    }
}

// Usage
$crudForm = new CrudForm();

if (isset($_GET['judul'])) {
    $id = $_GET['id'];
    $crudForm->fetchRecord($id);
}

$crudForm->renderForm();
?>
