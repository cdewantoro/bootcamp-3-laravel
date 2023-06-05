<?php

    require_once "connection.php";
    require_once "acccess.php";

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
            <a href="crud.php">Kembali</a>
            <h1><i class="fa-solid fa-book"></i><?= $judul ?> Buku</h1>
        <br><br>
        <form action="crud.php?judul=<?= $judul ?>&edit=<?= $id?>" method="post">
            <div class="mb-3 row">
                <label for="nama" class="form-label">Nama</label><input type="text" class="form-control" id="nama" name="nama" value="<?= $nama ?>">
             </div>
             <div class="mb-3 row">
                <label for="judul" class="form-label">Judul</label><input type="text" class="form-control" id="judul" name="judul" value="<?= $buku ?>">
             </div>
             <div class="mb-3 row">
                <label for="tema" class="form-label">Tema</label>
                    <select type="text" class="form-control" id="tema" name="tema">
                        <option value="<?= $tema ?>" selected><?= $tema ?></option>
                        <option value="sains">Sains</option>
                        <option value="spiritual">Spritiual</option>
                        <option value="fantasy">Fantasy</option>
                        <option value="sejarah">Sejarah</option>
                        <option value="umum">Umum</option>
                    </select>
             </div>
             <div class="mb-3 row">
                <label for="email" class="form-label">Email</label><input type="text" class="form-control" id="email" name="email" value="<?= $email ?>">
             </div>
             <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>
<!-- option 1 : bootstrap bundle with popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>