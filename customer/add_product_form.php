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
    <div class="container mt-5  d-flex justify-content-center">
        <div class="d-flex flex-column col-6 d-flex justify-content-center">
            <form class="form-group d-flex flex-column col-12" action="./add_product.php" method="GET" style="font-size: 1.5rem;">
                Id_Środka:
                <?php
                    include "../connect.php";
                    $sql = "SELECT * FROM Srodki_czystosci";
                    $result = $conn->query($sql);
        
                    if ($result->num_rows > 0) {
                    // output data of each row
                        echo "<select class='form-control' name='Id_Srodek'>";
                        while($row = $result->fetch_assoc()) {
                            echo "<option value=".$row['Id'].">".$row["Id"] ." - ". $row["Nazwa"] ."</option>";
                        }
                        echo "</select>";
                    } else {
                        echo "0 results";
                    }
                    
                    //$conn->close();

                ?>
                Id_Uslugi: 
                <?php
                    include "../connect.php";
                    $sql = "SELECT * FROM Uslugi";
                    $result = $conn->query($sql);
        
                    if ($result->num_rows > 0) {
                    // output data of each row
                        echo "<select class='form-control' name='Id_Usluga'>";
                        while($row = $result->fetch_assoc()) {
                            echo "<option value=".$row['Id'].">".$row["Id"] ."</option>";
                        }
                        echo "</select>";
                    } else {
                        echo "0 results";
                    }
                    
                    //$conn->close();

                ?>
                Ilość: <input class="form-control" type="text" name="Ilosc">
                <input type="submit" name="submit" value="Dodaj usługę" class="col-12 btn btn-success">
                <a href="./index.php"><button type="button" class="btn btn-primary col-12" style="font-size: 1.5rem;">Powrót</button></a>
            </form>
        </div>   
    </div>
</body>
<script src="../bootstrap-4.5.0/jquery-3.5.1.slim.min.js"></script>
<script src="../bootstrap-4.5.0/popper.min.js"></script>
<script src="../bootstrap-4.5.0/dist/js/bootstrap.min.js"></script>
</html>