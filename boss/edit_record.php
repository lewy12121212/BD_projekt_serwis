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
<?php
// odbieramy dane z formularza

    include "../connect.php";

    $table_name = $_GET['table_name'];
    $row_id = $_GET['row_id'];

    if($table_name == "Grupy"){
        $Nazwa = $_GET['Nazwa'];
        $Typ_grupy = $_GET['Typ_grupy'];
        $sql = "UPDATE $table_name SET Nazwa = '$Nazwa', Typ_grupy = '$Typ_grupy' WHERE Id LIKE $row_id";    

    } else if($table_name == "Klienci"){
        $Nazwa = $_GET['Nazwa'];
        $Adres = $_GET['Adres'];
        $sql = "UPDATE $table_name SET Nazwa = '$Nazwa', Adres = '$Adres' WHERE Id LIKE $row_id";    

    } else if($table_name == "Pracownicy"){
        $Imie = $_GET['Imie'];
        $Nazwisko = $_GET['Nazwisko'];
        $Id_grupy = $_GET['Id_grupy'];
        $Stawka_godzinowa = $_GET['Stawka_godzinowa'];
        $sql = "UPDATE $table_name SET Imie = '$Imie', Nazwisko = '$Nazwisko', Id_grupy = '$Id_grupy', Stawka_godzinowa = $Stawka_godzinowa WHERE Id LIKE $row_id";    

    } else if($table_name == "Srodki_czystosci"){
        $Nazwa = $_GET['Nazwa'];
        $Ilosc = $_GET['Ilosc'];
        $Jednostka = $_GET['Jednostka'];
        $Cena = $_GET['Cena'];
        $sql = "UPDATE $table_name SET Nazwa = '$Nazwa', Ilosc = '$Ilosc', Jednostka = '$Jednostka', Cena = '$Cena' WHERE Id LIKE $row_id";    

    } else if($table_name == "Srodki_zuzyte"){
        $Id_Srodek = $_GET['Nazwa'];
        $Id_Usluga = $_GET['Id_Usluga'];
        $Ilosc = $_GET['Ilosc'];
        $sql = "UPDATE $table_name SET Nazwa = '$Nazwa', Ilosc = '$Ilosc', Jednostka = '$Jednostka', Cena = '$Cena' WHERE Id LIKE $row_id"; 
    } else if($table_name == "Uslugi"){
        $Typ_uslugi = $_GET['Typ_uslugi'];
        $Id_grupa = $_GET['Id_grupa'];
        $Id_klient = $_GET['Id_klient'];
        $Czas_wykonania = $_GET['Czas_wykonania'];
        $sql = "UPDATE $table_name SET Typ_uslugi = '$Typ_uslugi', Id_grupa = '$Id_grupa', Id_klient = '$Id_klient', Czas_wykonania = '$Czas_wykonania' WHERE Id LIKE $row_id"; 
    }
    $result = $conn->query($sql);
    echo $sql;
    if($conn->error){
        echo "Błąd edycji :(";
    } else {
        echo "Rekord poprawnie zedytowano :)";
    }

    $conn->close();
    //echo "<script>alert('Dodano nową usługę.');</script>";
    //header("Location: ./index.php");
    echo "<a href='./index.php'><button type='button' class='btn btn-success'>Powrót</button></a>"
?>
</body>
<script src="../bootstrap-4.5.0/jquery-3.5.1.slim.min.js"></script>
<script src="../bootstrap-4.5.0/popper.min.js"></script>
<script src="../bootstrap-4.5.0/dist/js/bootstrap.min.js"></script>
</html>
