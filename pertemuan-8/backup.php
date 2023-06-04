<?php

    // Hal 3 : Relasi Table

    // MYSQL
    $host = "localhost";
    $user = "root";
    $pass = "";
    $DB = "latihan";

    $koneksi = mysqli_connect($host,$user,$pass,$DB);

    if(!$koneksi){
        echo "Error: ".mysqli_error($koneksi);
    }

    $hasil = mysqli_query($koneksi, "SELECT * FROM user WHERE id=1");

    while($row = mysqli_fetch_assoc($hasil)){
        $id = $row["id"];
        $nama = $row["nama"];
    }

    function get_buku() {
        global $id, $buku, $koneksi, $index;
        $index = 1;
        $buku = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_users=$id");
    }
    get_buku();

    if($_POST) {
        $judul = $_POST["judul"];
        $tema = $_POST["tema"];

        $tambah = mysqli_query($koneksi, "INSERT INTO buku (judul, tema, id_users) VALUES ('$judul','$tema','$id')");

        if($tambah){
            get_buku();
        }else{
          echo "Error: ".mysqli_error($koneksi);
        }
    }elseif($_POST['edit']){
        // $id_edit = $_POST['edit'];
        $editJudul = $_POST["editJudul"];
        $editTema = $_POST["editTema"];
        $editID = $_POST["editID"];

        $edit = mysqli_query($koneksi, "INSERT INTO buku (judul, tema, id_users) VALUES ('$editJudul','$editTema','$editID')");

        // $edit = mysqli_query($koneksi, "UPDATE FROM buku SET judul='$editJudul', tema='$editTema', id_users='1' WHERE id='$editID'");

        if($edit){
            get_buku();
        }else{
          echo "Error: ".mysqli_error($koneksi);
        }
    
    }elseif($_GET['delete']){
        $id_hapus= $_GET['delete'];
        
        $hapus = mysqli_query($koneksi,"DELETE FROM buku WHERE id=$id_hapus");
        if($hapus){
            get_buku();
        }else{
            echo "ERROR:".mysqli_error($koneksi);
        }
     } 

    
    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <!-- Jquery datatables -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <!-- datatables css  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <title>Buku</title>
    <script>
      function editBuku(ed_ID,ed_jud,ed_tema) {
        $("#editID").attr("value",ed_ID)
        $("#editJudul").attr("value",ed_jud);
        $("#editTema").attr("value",ed_tema);
      }
    </script>
  </head>
  <body>

<div class="container pt-4" style="padding-right:30%;">
    <h1>Penulis <?= $nama ?></h1>
    <br>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
  <i class="fa-solid fa-book"></i> Tambah Karangan
</button>
    <br><br>
    <table class="table caption-top" style="width:100%" id="test">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Judul</th>
      <th scope="col">Tema</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    <?php while($row = mysqli_fetch_assoc($buku)) { ?>  
    <tr>
      <th><?= $index++ ?></th>
      <td id="judul_<?= $row['id']?>"><?= $row['judul'] ?></td>
      <td id="tema_<?= $row['id']?>"><?= $row['tema'] ?></td>
      <td>
            <a href="?edit=<?= $row['id']?>" class="btn btn-success"data-bs-toggle="modal" data-bs-target="#edit" onclick="editBuku('<?=$row['id']?>','<?= $row['judul']?>','<?=$row['tema']?>');"><i class="fa-solid fa-pen-to-square"></i></a>
            <a href="?delete=<?= $row['id']?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
       </td>

    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
<!-- end table -->
<!-- modal  -->


<!-- Modal tambah karangan -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Karangan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul">
            </div>
            <div class="mb-3">
            <label for="judul" class="form-label">Tema</label>
            <input type="text" class="form-control" id="tema" name="tema">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal edit karangan -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Karangan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post">
      <div class="mb-3">
         <input type="hidden" name="editID" id="editID">
        <label for="judul" class="form-label">Judul</label>
        <input type="text" class="form-control" id="editJudul" name="editJudul">
        </div>
        <div class="mb-3">
        <label for="judul" class="form-label">Tema</label>
        <input type="text" class="form-control" id="editTema" name="editTema">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </div>

</form>
    </div>
  </div>
</div>

<script>
    $(document).ready(function () {
    $('#test').DataTable();
});
</script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body>
</html>