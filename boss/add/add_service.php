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

        $type = $_GET['Typ_uslugi'];
        $id_group = $_GET['Id_grupa'];
        $id_custom = $_GET['Id_klient'];
        $time = $_GET['Czas_wykonania'];

        $sql = "INSERT INTO Uslugi (Typ_uslugi, Id_grupa, Id_klient, Czas_wykonania) VALUES ('$type', '$id_group', '$id_custom', '$time')";
        $result = $conn->query($sql);
        echo $sql;
        if($conn->error){
            echo "Błąd dodania usługi:(";
        } else {
            echo "Usługę dodano poprawnie! :)";
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


