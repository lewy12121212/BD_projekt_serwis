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

                </tr>
                </thead>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>" .$row['Id']. "</td>
                    <td>" .$row['Nazwa']. "</td>
                    <td>" .$row['Ilosc']. "</td>
                    <td>" .$row['Jednostka']. "</td>
                    <td>" .$row['Cena']. "</td>
                    </td></tr>";
                    /*echo "<td><input type='button' value='edytuj wpis' class='btn btn-info'></td>";*/
                }
                echo "</table>";
            } else {
                echo "table information error\n";   
            }
        } else if($table_name == 'Srodki_zuzyte'){
            if ($result->num_rows > 0) {
                // output data of each row
                echo "<table border='1' class='table' style='text-align:center'>
                <thead class='thead-dark'>
                <tr style='text-align:center'>
                    <th scope='col'>Id</th>
                    <th scope='col'>Id_środka</th>
                    <th scope='col'>Id_usługi</th>
                    <th scope='col'>Ilość</th>
                </tr>
                </thead>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>" .$row['Id']. "</td>
                    <td>" .$row['Id_Srodek']. "</td>
                    <td>" .$row['Id_Usluga']. "</td>
                    <td>" .$row['Ilosc']. "</td>
                    </td></tr>";
                    /*echo "<td><input type='button' value='edytuj wpis' class='btn btn-info'></td>";*/
                }
                echo "</table>";
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
                    </td></tr>";
                    /*echo "<td><input type='button' value='edytuj wpis' class='btn btn-info'></td>";*/
                }
                echo "</table>";
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