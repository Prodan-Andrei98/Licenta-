
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin page</title>

    <!-- bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- link cu css  -->

</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: blueviolet; color:white;">Vizualizare baze</nav>
    <div class="container">
        <a href="add_sport.php" class="btn btn-dark mb-3">Adauga sport</a>
        <a href="admin_page.php" class="btn btn-dark mb-3">Inapoi</a>
        <table class="table table-hover text-center">
            <thead style="background-color: blueviolet; color:white;">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">nume_sport</th>
                    <th scope="col">locatie</th>
                    <th scope="col">Editeaza/Sterge</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "config.php";
                    $sql = "SELECT * FROM `sporturi` ";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)){
                        ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['nume_sport'] ?></td>
                                <td><?php echo $row['locatie'] ?></td>

                                <td>
                                    <a href="edit_sport.php?id=<?php echo $row['id'] ?>" class="link-dark"><span class="btn btn-dark mr-1">Editeaza</span></a>
                                    <a href="del_sport.php?id=<?php echo $row['id'] ?>" class="link-dark"><span class="btn btn-dark mr-1">Sterge</span></a>
                                </td>
                            </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>

    </div>


    <!-- bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>