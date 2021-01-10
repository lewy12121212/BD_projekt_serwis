<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-4.5.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../main_style.css">
    <link rel="stylesheet" href="./style.css">
    <title>Serwis</title>
</head>
<body >
    <div class="container " style="margin-top: 5rem; ">
        <div class="d-flex flex-column col-7 mx-auto align-items-center">
            <h1 class="display-3 mx-auto">Panel pracownika</h1>
            <form method="GET" action="./show_tables.php" class="d-flex flex-column col-12 mx-auto">
                <input type="hidden" value="Uslugi" name="Show">
                <input type="submit" class="btn btn-primary" value="Wyświetl usługi">
            </form>
            <form method="GET" action="./show_tables.php" class="d-flex flex-column col-12 mx-auto">
                <input type="hidden" value="Srodki_czystosci" name="Show">
                <input type="submit" class="btn btn-secondary" value="Wyświetl dostępne środki czystości">
            </form>
            <form method="GET" action="./show_tables.php" class="d-flex flex-column col-12 mx-auto">
                <input type="hidden" value="Srodki_zuzyte" name="Show">
                <input type="submit" class="btn btn-success" value="Wyświetl zużyte środki czystości">
            </form>
            <form method="GET" action="./add_service_form.php" class="d-flex flex-column col-12 mx-auto">
                <input type="hidden" value="Srodki_zuzyte" name="Show">
                <input type="submit" class="btn btn-danger" value="Dodaj wykonaną usługę">
            </form>
            <form method="GET" action="./add_product_form.php" class="d-flex flex-column col-12 mx-auto">
                <input type="hidden" value="Srodki_zuzyte" name="Show">
                <input type="submit" class="btn btn-warning" value="Dodaj zużyte środki czystości">
            </form>
            <a href="../index.php"><button type="button" class="btn btn-primary col-12" style="font-size: 1.5rem;">Powrót</button></a>
        </div>
    </div>

</body>
<script src="../bootstrap-4.5.0/jquery-3.5.1.slim.min.js"></script>
<script src="../bootstrap-4.5.0/popper.min.js"></script>
<script src="../bootstrap-4.5.0/dist/js/bootstrap.min.js"></script>
</html>