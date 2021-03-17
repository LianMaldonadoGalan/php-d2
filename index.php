<!DOCTYPE html>

<?php include('conexion.php')?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP INTRO</title>
</head>
<body>
    <h1>MANEJADOR DE TAREAS</h1>
    
    <form action="store.php" method = "POST">
    
        <label for="tarea"> Nombre Tarea </label><br>
        <input type="Text" name="tarea">
        <br><br>

        <label for="descripcion"> Descripcion </label><br>
        <textarea name="descripcion" cols = "50" rows = "10"></textarea>
        <br>

        <label for="prioridad">Prioridad</label><br>
        <select name="prioridad">
            <option value = "Baja"> Baja </option>
            <option value = "Media"> Media </option>
            <option value = "Alta"> Alta </option>
        </select>
        <br>

        <label for="urgente">Urgente</label>
        <input type="checkbox" name="urgente" value = "1"><br>

        <label for="tipo"> Escuela </label>
        <input type="radio" name = "tipo" value = "escuela">

        <label for="tipo"> Trabajo </label>
        <input type="radio" name = "tipo" value = "trabajo"><br>

        <input type ="submit" value = "enviar">
    
    </form>

    <hr>

    <h2>Lista de Tareas</h2>

    <?php

        $sql = "SELECT * FROM tareas";
        $stmt  = $conn->prepare($sql);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        echo "<table border = 1>";
        echo "<tr> <th>ID</th> <th>Tarea</th> <th>Descripcion</th></tr>";

        foreach($stmt->fetchAll() as $tarea){
                echo "<tr>
                        <td>".$tarea['id']."</td>
                        <td>".$tarea['tarea']."</td>
                        <td>".$tarea['descripcion']."</td>
                </tr>";
        }
        echo "</table>";
       
    ?>

</body>
</html>