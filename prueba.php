<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "santi_distribuciones");

if (isset($_SESSION['add_to_cart'])) {
    
    if (isset($_SESSION['cart'])) {
        # code...
    }else {
        $session_array = array(

            'id' => $_GET['id'],
            "nombre" => $_POST['nombre_pro'],
            "precio" => $_POST['prc_venta_1'],
            "cantidad" => $_POST['cantidad']
        );

        $_SESSION['cart'][] = $session_array;
    }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="text-center">shopping</h2>
                    <div class="col-md-12">
                        <div class="row">



                            <?php

                            $query = "SELECT * FROM tb_productos";
                            $result = mysqli_query($connect, $query);

                            while ($row = mysqli_fetch_array($result)) { ?>
                                <div class="col-md-4 card my-5 p-5">

                                    <form action="prueba.php?id=<?= $row['id'] ?>" method="post">
                                        <h2 class="text-center"><?= $row['nombre_pro']; ?></h2>

                                        <h2 class="text-center">$ <?= number_format($row['prc_venta_1'],0);  ?></h2>
                                        <input type="hidden" name="nombre" value="<?= $row['nombre_pro']?>">
                                        <input type="hidden" name="precio" value="<?= $row['prc_venta_1']?>">
                                        <input type="number" name="cantidad" value="1" class="form-control" id="">
                                        <input type="submit" name="add_to_cart" class="btn btn-warning form-control" value="Add To Cart">
                                    </form>
                                </div>
                            <?php }

                            ?>


                        </div>
                    </div>




                </div>
                <div class="col-md-6">
                    <h2 class="text-center">item</h2>


                    <?php

                    var_dump($_SESSION['cart']);



                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>