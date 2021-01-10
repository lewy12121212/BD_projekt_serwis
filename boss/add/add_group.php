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
<body>
    <?php
    // odbieramy dane z formularza

        include "../../connect.php";

        $Nazwa = $_GET['Nazwa'];
        $Typ_grupy = $_GET['Typ_grupy'];

        $sql = "INSERT INTO Grupy (Nazwa, Typ_grupy) VALUES ('$Nazwa', '$Typ_grupy')";
        $result = $conn->query($sql);
        echo $sql;
        if($conn->error){
            echo "Błąd dodania grupy:( ";
        } else {
            echo "Grupę dodano poprawnie! :) ";
        }

        $conn->close();
        //echo "<script>alert('Dodano nową usługę.');</script>";
        //header("Location: ./index.php");
        echo "<br><a href='../index.php'><button type='button' class='btn btn-success'>Powrót</button></a>"
    ?>
</body>
<script src="../../bootstrap-4.5.0/jquery-3.5.1.slim.min.js"></script>
<script src="../../bootstrap-4.5.0/popper.min.js"></script>
<script src="../../bootstrap-4.5.0/dist/js/bootstrap.min.js"></script>
</html>

