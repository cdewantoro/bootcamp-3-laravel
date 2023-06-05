<?php
class Database {
    private $host;
    private $user;
    private $pass;
    private $DB;
    private $connection;

    public function __construct($host, $user, $pass, $DB) {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->DB = $DB;
    }

    public function connect() {
        $this->connection = mysqli_connect($this->host, $this->user, $this->pass, $this->DB);

        if (!$this->connection) {
            echo "Error: " . mysqli_error($this->connection);
        }
    }

    public function closeConnection() {
        mysqli_close($this->connection);
    }

    public function query($sql) {
        return mysqli_query($this->connection, $sql);
    }

    public function getError() {
        return mysqli_error($this->connection);
    }
}

class BookManager {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllBooks() {
        $hasil = $this->db->query("SELECT * FROM latihan_crud");
        return $hasil;
    }

    public function addBook($nama, $judul, $tema, $email) {
        $add = $this->db->query("INSERT INTO latihan_crud (nama, buku, tema, email) VALUES ('$nama','$judul','$tema','$email')");

        if ($add) {
            return true;
        } else {
            echo "Error: " . $this->db->getError();
            return false;
        }
    }

    public function updateBook($id, $nama, $judul, $tema, $email) {
        $edit = $this->db->query("UPDATE latihan_crud SET nama='$nama', buku='$judul', tema='$tema', email='$email' WHERE id='$id'");

        if ($edit) {
            return true;
        } else {
            echo "Error: " . $this->db->getError();
            return false;
        }
    }

    public function deleteBook($id) {
        $del = $this->db->query("DELETE FROM latihan_crud WHERE id=$id");

        if ($del) {
            return true;
        } else {
            echo "Error: " . $this->db->getError();
            return false;
        }
    }
}

// Usage example:
$host = "localhost";
$user = "root";
$pass = "";
$DB = "latihan";

$db = new Database($host, $user, $pass, $DB);
$db->connect();

$bookManager = new BookManager($db);
$hasil = $bookManager->getAllBooks();

if ($_POST) {
    $id_edit = $_GET['edit'];
    $nama = $_POST['nama'];
    $judul = $_POST['judul'];
    $tema = $_POST['tema'];
    $email = $_POST['email'];

    if ($_GET['judul'] == "edit") {
        $edit = $bookManager->updateBook($id_edit, $nama, $judul, $tema, $email);
        if ($edit) {
            $hasil = $bookManager->getAllBooks();
        }
    } else {
        $add = $bookManager->addBook($nama, $judul, $tema, $email);
        if ($add) {
            $hasil = $bookManager->getAllBooks();
        }
    }
} elseif (isset($_GET['delete'])) {
    $id_delete = $_GET['delete'];
    $del = $bookManager->deleteBook($id_delete);
    if ($del) {
        $hasil = $bookManager->getAllBooks();
    }
}

$db->closeConnection();
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
    <div class="container pt-4">
        <h1>Web Book</h1>
        <p>Welcome to the website books</p>
        <br>
        <a href="oop_form.php" class="btn btn-lg btn-primary">
            <i class="fa-solid fa-book"></i>
            Add Book
        </a>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Tema</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $index = 1; while($row = mysqli_fetch_assoc($hasil)) { ?>
                <tr>
                    <td scope="row"><?= $index++ ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['buku'] ?></td>
                    <td><?= $row['tema'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td>
                        <a href="oop_form.php?judul=edit&id=<?= $row['id']?>" class="btn btn-success d-inline-block mr-2"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="?delete=<?= $row['id']?>" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- option 1 : bootstrap bundle with popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
