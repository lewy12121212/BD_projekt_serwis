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
        $table_name = $_GET['Show'];

        $sql = "SELECT * FROM $table_name";
        $result = $conn->query($sql);

        if($table_name == 'Srodki_czystosci'){
            if ($result->num_rows > 0) {
                // output data of each row
                echo "<table border='1' class='table' style='text-align:center'>
                <thead class='thead-dark'>
                <tr style='text-align:center'>
                    <th scope='col'>Id</th>
                    <th scope='col'>Nazwa</th>
                    <th scope='col'>Ilość</th>
                    <th scope='col'>Jednostka</th>
                    <th scope='col'>Cena</th>
                    <th scope='col'>Zarządzanie</th>
                </tr>
                </thead>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>" .$row['Id']. "</td>
                    <td>" .$row['Nazwa']. "</td>
                    <td>" .$row['Ilosc']. "</td>
                    <td>" .$row['Jednostka']. "</td>
                    <td>" .$row['Cena']. "</td>
                    <td>
                    <form action='manage.php'>
                    <input type='hidden' value=".$row['Id']." name='row_id'>
                    <input type='hidden' value='Srodki_czystosci' name='table_name'>
                    <input type='submit' value='Edytuj wiersz' class='btn btn-primary col-8 m-0' style='font-size: 1.3rem; padding: 0.2rem'>
                    </form>             
                    </td>
                    </td></tr>";
                    /*echo "<td><input type='button' value='edytuj wpis' class='btn btn-info'></td>";*/
                }
            } else {
                echo "table information error\n";   
            }
        } else if($table_name == 'Uslugi'){
            if ($result->num_rows > 0) {
                // output data of each row
                echo "<table border='1' class='table' style='text-align:center'>
                <thead class='thead-dark'>
                <tr style='text-align:center'>
                    <th scope='col'>Id</th>
                    <th scope='col'>Typ_usługi</th>
                    <th scope='col'>Id_grupa</th>
                    <th scope='col'>Id_klient</th>
                    <th scope='col'>Czas_wykonania</th>
                    <th scope='col'>Koszt</th>
                    <th scope='col'>Cena_usługi</th>
                    <th scope='col'>Zarządzanie</th>
                </tr>
                </thead>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>" .$row['Id']. "</td>
                    <td>" .$row['Typ_uslugi']. "</td>
                    <td>" .$row['Id_grupa']. "</td>
                    <td>" .$row['Id_klient']. "</td>
                    <td>" .$row['Czas_wykonania']. "</td>
                    <td>" .$row['Koszt']. "</td>
                    <td>" .$row['Cena_uslugi']. "</td>
                    <td>
                    <form action='manage.php'>
                    <input type='hidden' value=".$row['Id']." name='row_id'>
                    <input type='hidden' value='Uslugi' name='table_name'>
                    <input type='submit' value='Edytuj wiersz' class='btn btn-primary col-8 m-0' style='font-size: 1.3rem; padding: 0.2rem'>
                    </form>             
                    </td>
                    </td></tr>";
                    /*echo "<td><input type='button' value='edytuj wpis' class='btn btn-info'></td>";*/
                }
            } else {
                echo "table information error\n";      
            }
        } else if($table_name == 'Grupy'){
            if ($result->num_rows > 0) {
                // output data of each row
                echo "<table border='1' class='table' style='text-align:center'>
                <thead class='thead-dark'>
                <tr style='text-align:center'>
                    <th scope='col'>Id</th>
                    <th scope='col'>Nazwa</th>
                    <th scope='col'>Typ_grupy</th>
                    <th scope='col'>Liczebnosc_grupy</th>
                    <th scope='col'>Zarządzanie</th>
                </tr>
                </thead>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>" .$row['Id']. "</td>
                    <td>" .$row['Nazwa']. "</td>
                    <td>" .$row['Typ_grupy']. "</td>
                    <td>" .$row['Liczebnosc_grupy']. "</td>
                    <td>
                    <form action='manage.php'>
                    <input type='hidden' value=".$row['Id']." name='row_id'>
                    <input type='hidden' value='Grupy' name='table_name'>
                    <input type='submit' value='Edytuj wiersz' class='btn btn-primary col-8 m-0' style='font-size: 1.3rem; padding: 0.2rem'>
                    </form>             
                    </td>
                    </td></tr>";
                    /*echo "<td><input type='button' value='edytuj wpis' class='btn btn-info'></td>";*/
                }
            } else {
                echo "table information error\n";      
            }
        } else if($table_name == 'Klienci'){
            if ($result->num_rows > 0) {
                // output data of each row
                echo "<table border='1' class='table' style='text-align:center'>
                <thead class='thead-dark'>
                <tr style='text-align:center'>
                    <th scope='col'>Id</th>
                    <th scope='col'>Nazwa</th>
                    <th scope='col'>Adres</th>
                    <th scope='col'>Zarządzanie</th>
                </tr>
                </thead>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>" .$row['Id']. "</td>
                    <td>" .$row['Nazwa']. "</td>
                    <td>" .$row['Adres']. "</td>
                    <td>
                    <form action='manage.php'>
                    <input type='hidden' value=".$row['Id']." name='row_id'>
                    <input type='hidden' value='Klienci' name='table_name'>
                    <input type='submit' value='Edytuj wiersz' class='btn btn-primary col-8 m-0' style='font-size: 1.3rem; padding: 0.2rem'>
                    </form>             
                    </td>
                    </td></tr>";
                    /*echo "<td><input type='button' value='edytuj wpis' class='btn btn-info'></td>";*/
                }
            } else {
                echo "table information error\n";      
            }
        } else if($table_name == 'Pracownicy'){
            if ($result->num_rows > 0) {
                // output data of each row
                echo "<table border='1' class='table' style='text-align:center'>
                <thead class='thead-dark'>
                <tr style='text-align:center'>
                    <th scope='col'>Id</th>
                    <th scope='col'>Imie</th>
                    <th scope='col'>Nazwisko</th>
                    <th scope='col'>Id_grupy</th>
                    <th scope='col'>Stawka_godzinowa</th>
                    <th scope='col'>Zarządzanie</th>
                </tr>
                </thead>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>" .$row['Id']. "</td>
                    <td>" .$row['Imie']. "</td>
                    <td>" .$row['Nazwisko']. "</td>
                    <td>" .$row['Id_grupy']. "</td>
                    <td>" .$row['Stawka_godzinowa']. "</td>
                    <td>
                    <form action='manage.php'>
                    <input type='hidden' value=".$row['Id']." name='row_id'>
                    <input type='hidden' value='Pracownicy' name='table_name'>
                    <input type='submit' value='Edytuj wiersz' class='btn btn-primary col-8 m-0' style='font-size: 1.3rem; padding: 0.2rem'>
                    </form>             
                    </td>
                    </td></tr>";
                    /*echo "<td><input type='button' value='edytuj wpis' class='btn btn-info'></td>";*/
                }
            } else {
                echo "table information error\n";      
            }
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