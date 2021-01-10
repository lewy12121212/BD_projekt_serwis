<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../bootstrap-4.5.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../main_style.css">
    <link rel="stylesheet" href="../style.css">
    <title>Serwis</title>
</head>
<body >
    <div class="container mt-5  d-flex justify-content-center">
        <div class="d-flex flex-column col-6 d-flex justify-content-center">
            <form class="form-group d-flex flex-column col-12" action="./add_product.php" method="GET" style="font-size: 1.5rem;">
                Nazwa:
                <input class="form-control" type="text" name="Nazwa">

                Ilość: 
                <input class="form-control" type="text" name="Ilosc">
                Jednostka:
                <select name="Jednostka" class="form-control">
                    <option value="ml">ml</option>
                    <option value="szt">szt</option>
                    <option value="g">g</option>
                </select>
                Cena:
                <input class="form-control" type="number" step="0.01" name="Cena">
                <input type="submit" name="submit" value="Dodaj produktu do magazynu" class="col-12 btn btn-success">
                <a href="../index.php"><button type="button" class="btn btn-primary col-12" style="font-size: 1.5rem;">Powrót</button></a>
            </form>
        </div>   
    </div>
</body>
<script src="../../bootstrap-4.5.0/jquery-3.5.1.slim.min.js"></script>
<script src="../../bootstrap-4.5.0/popper.min.js"></script>
<script src="../../bootstrap-4.5.0/dist/js/bootstrap.min.js"></script>
</html>