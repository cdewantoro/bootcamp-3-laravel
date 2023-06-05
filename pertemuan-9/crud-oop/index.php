<?php

    require_once "access.php";
    require_once "connection.php";

    $hasil = read();
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
        <p>Welcome to website books</p>
        <br>
        <a href="form.php" class="btn btn-lg btn-primary">
            <i class="fa-solid fa-book"></i>
            Tambah Buku
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
            <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
                <tr>
                    <td scope="row"><?= $index++ ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['buku'] ?></td>
                    <td><?= $row['tema'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td>
                        <a href="form.php?judul=edit&id=<?= $row['id']?>" class="btn btn-success d-inline-block mr-2"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="?delete=<?= $row['id']?>" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
            </tbody>
            </tbody>
            </tbody>
            </tbody>
        </table>
</div>
<!-- option 1 : bootstrap bundle with popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>