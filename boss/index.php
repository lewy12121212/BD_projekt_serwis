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
            <h1 class="display-3 mx-auto">Panel zarządcy</h1>
            <h4 class="mx-auto" style="font-size:2rem; font-weight:bold;">Wyświetlanie / edycja</h4>
            <form method="GET" action="./show_tables.php" class="d-flex flex-column col-12 mx-auto">
                <input type="hidden" value="Uslugi" name="Show">
                <input type="submit" class="btn btn-primary" value="Wyświetl usługi">
            </form>
            <form method="GET" action="./show_tables.php" class="d-flex flex-column col-12 mx-auto">
                <input type="hidden" value="Srodki_czystosci" name="Show">
                <input type="submit" class="btn btn-secondary" value="Wyświetl dostępne środki czystości">
            </form>
            <form method="GET" action="./show_tables.php" class="d-flex flex-column col-12 mx-auto">
                <input type="hidden" value="Grupy" name="Show">
                <input type="submit" class="btn btn-success" value="Wyświetl grupy">
            </form>
            <form method="GET" action="./show_tables.php" class="d-flex flex-column col-12 mx-auto">
                <input type="hidden" value="Pracownicy" name="Show">
                <input type="submit" class="btn btn-danger" value="Wyświetl pracowników">
            </form>
            <form method="GET" action="./show_tables.php" class="d-flex flex-column col-12 mx-auto">
                <input type="hidden" value="Klienci" name="Show">
                <input type="submit" class="btn btn-warning" value="Wyświetl klientów">
            </form>


            <h4 class="mx-auto" style="font-size:2rem; font-weight:bold;">Dodawanie</h4>
            <form method="GET" action="./add/add_service_form.php" class="d-flex flex-column col-12 mx-auto">
                <input type="hidden" value="Uslugi" name="Show">
                <input type="submit" class="btn btn-primary" value="Dodaj usługę">
            </form>
            <form method="GET" action="./add/add_product_form.php" class="d-flex flex-column col-12 mx-auto">
                <input type="hidden" value="Srodki_czystosci" name="Show">
                <input type="submit" class="btn btn-secondary" value="Dodaj produkt do magazynu">
            </form>
            <form method="GET" action="./add/add_group_form.php" class="d-flex flex-column col-12 mx-auto">
                <input type="hidden" value="Grupy" name="Show">
                <input type="submit" class="btn btn-success" value="Dodaj grupę">
            </form>
            <form method="GET" action="./add/add_employee_form.php" class="d-flex flex-column col-12 mx-auto">
                <input type="hidden" value="Pracownicy" name="Show">
                <input type="submit" class="btn btn-danger" value="Dodaj pracownika">
            </form>
            <form method="GET" action="./add/add_client_form.php" class="d-flex flex-column col-12 mx-auto">
                <input type="hidden" value="Klienci" name="Show">
                <input type="submit" class="btn btn-warning" value="Dodaj klienta">
            </form>
            <a href="../index.php"><button type="button" class="btn btn-primary col-12" style="font-size: 1.5rem;">Powrót</button></a>
        </div>
    </div>

</body>
<script src="../bootstrap-4.5.0/jquery-3.5.1.slim.min.js"></script>
<script src="../bootstrap-4.5.0/popper.min.js"></script>
<script src="../bootstrap-4.5.0/dist/js/bootstrap.min.js"></script>
</html>