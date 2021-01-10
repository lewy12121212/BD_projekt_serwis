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
    <div class="container mt-5" style="font-size: 1.5rem;">

        <?php
        include '../connect.php';
        $table_name = $_GET['table_name'];
        $row_id = $_GET['row_id'];

        $sql = "SELECT * FROM $table_name WHERE Id LIKE $row_id";
        $result = $conn->query($sql);
        echo $table_name . " - " . $row_id . "<br>";
        echo "<div class='container d-flex flex-column'>";
        if($table_name == 'Srodki_czystosci'){
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<form action='./edit_record.php' method='GET' class='align-items-center container d-flex flex-column col-6'>";
                    echo "Id: ".$row['Id']."<br>";
                    echo "Nazwa: <input type='text' value=".$row['Nazwa']." name='Nazwa'>";
                    echo "Ilosc: <input type='text' value=".$row['Ilosc']." name='Ilosc'>";
                    echo "Jednostka: <input type='text' value=".$row['Jednostka']." name='Jednostka'>";
                    echo "Cena: <input type='text' value=".$row['Cena']." name='Cena'>";
                    echo "<input type='hidden' value=".$row_id." name='row_id'>
                    <input type='hidden' value=".$table_name." name='table_name'>";
                    echo "<input class='btn btn-warning col-8' type='submit' value='zatwierdź zmiany'>";
                    echo "</form>";
                    echo "<form action='./delete_record.php' method='get' class='align-items-center container d-flex flex-column col-6'>
                    <input type='hidden' value=".$row_id." name='row_id'>
                    <input type='hidden' value=".$table_name." name='table_name'>
                    <input class='btn btn-danger col-8' type='submit' value='Usuń rekord'>
                    </form>";
                }
                
            } else {
                echo "table information error1\n";   
            }
        } else if($table_name == 'Uslugi'){
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<form action='./edit_record.php' method='GET' class='align-items-center container d-flex flex-column col-6'>";
                    echo "Id: ".$row['Id']."<br>";
                    echo "Typ_uslugi: <input type='text' value=".$row['Typ_uslugi']." name='Typ_uslugi'>";
                    echo "Id_grupa: <input type='text' value=".$row['Id_grupa']." name='Id_grupa'>";
                    echo "Id_klient: <input type='text' value=".$row['Id_klient']." name='Id_klient'>";
                    echo "Czas_wykonania: <input type='time' value=".$row['Czas_wykonania']." name='Czas_wykonania'>";
                    echo "<input type='hidden' value=".$row_id." name='row_id'>
                    <input type='hidden' value=".$table_name." name='table_name'>";
                    echo "<input class='btn btn-warning col-8' type='submit' value='zatwierdź zmiany'>";
                    echo "</form>";
                    echo "<form action='./delete_record.php' method='get' class='align-items-center container d-flex flex-column col-6'>
                    <input type='hidden' value=".$row_id." name='row_id'>
                    <input type='hidden' value=".$table_name." name='table_name'>
                    <input class='btn btn-danger col-8' type='submit' value='Usuń rekord'>
                    </form>";
                }
                
            } else {
                echo "table information error1\n";   
            }
        } else if($table_name == 'Grupy'){
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<form action='./edit_record.php' method='GET' class='align-items-center container d-flex flex-column col-6'>";
                    echo "Id: ".$row['Id']."<br>";
                    echo "Nazwa: <input type='text' value=".$row['Nazwa']." name='Nazwa'>";
                    echo "Typ_grupy: <input type='text' value=".$row['Typ_grupy']." name='Typ_grupy'>";
                    echo "<input type='hidden' value=".$row_id." name='row_id'>
                    <input type='hidden' value=".$table_name." name='table_name'>";
                    echo "<input class='btn btn-warning col-8' type='submit' value='zatwierdź zmiany'>";
                    echo "</form>";
                    echo "<form action='./delete_record.php' method='get' class='align-items-center container d-flex flex-column col-6'>
                    <input type='hidden' value=".$row_id." name='row_id'>
                    <input type='hidden' value=".$table_name." name='table_name'>
                    <input class='btn btn-danger col-8' type='submit' value='Usuń rekord'>
                    </form>";
                }
                
            } else {
                echo "table information error1\n";   
            }
        } else if($table_name == 'Pracownicy'){
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<form action='./edit_record.php' method='GET' class='align-items-center container d-flex flex-column col-6'>";
                    echo "Id: ".$row['Id']."<br>";
                    echo "Imie: <input type='text' value=".$row['Imie']." name='Imie'>";
                    echo "Nazwisko: <input type='text' value=".$row['Nazwisko']." name='Nazwisko'>";
                    echo "Id_grupy: <input type='text' value=".$row['Id_grupy']." name='Id_grupy'>";
                    echo "Stawka_godzinowa: <input type='text' value=".$row['Stawka_godzinowa']." name='Stawka_godzinowa'>";
                    echo "<input type='hidden' value=".$row_id." name='row_id'>
                    <input type='hidden' value=".$table_name." name='table_name'>";
                    echo "<input class='btn btn-warning col-8' type='submit' value='zatwierdź zmiany'>";
                    echo "</form>";
                    echo "<form action='./delete_record.php' method='get' class='align-items-center container d-flex flex-column col-6'>
                    <input type='hidden' value=".$row_id." name='row_id'>
                    <input type='hidden' value=".$table_name." name='table_name'>
                    <input class='btn btn-danger col-8' type='submit' value='Usuń rekord'>
                    </form>";
                }
                
            } else {
                echo "table information error1\n";   
            }
        } else if($table_name == 'Klienci'){
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<form action='./edit_record.php' method='GET' class='align-items-center container d-flex flex-column col-6'>";
                    echo "Id: ".$row['Id']."<br>";
                    echo "Nazwa: <input type='text' value=".$row['Nazwa']." name='Nazwa'>";
                    echo "Adres: <input type='text' value=".$row['Adres']." name='Adres'>";
                    echo "<input type='hidden' value=".$row_id." name='row_id'>
                    <input type='hidden' value=".$table_name." name='table_name'>";
                    echo "<input class='btn btn-warning col-8' type='submit' value='zatwierdź zmiany'>";
                    echo "</form>";
                    echo "<form action='./delete_record.php' method='get' class='align-items-center container d-flex flex-column col-6'>
                    <input type='hidden' value=".$row_id." name='row_id'>
                    <input type='hidden' value=".$table_name." name='table_name'>
                    <input class='btn btn-danger col-8' type='submit' value='Usuń rekord'>
                    </form>";
                }
                
            } else {
                echo "table information error1\n";   
            }
        } else {
                echo "table information error\n";      
        }
        

        $conn->close();
        ?>

        <a href="./index.php"><button type="button" class="btn btn-primary w-25" style="font-size: 1.5rem;">Powrót</button></a>
    </div>
</body>
<script src="../bootstrap-4.5.0/jquery-3.5.1.slim.min.js"></script>
<script src="../bootstrap-4.5.0/popper.min.js"></script>
<script src="../bootstrap-4.5.0/dist/js/bootstrap.min.js"></script>
</html>