<?php include('conexion.php')?>

<?php
    //validacion de 1 sola columna, deben validarse todos los datos.
    if(!empty($_POST['tarea'])){

        $tarea = $_POST['tarea'];
        $descripcion = $_POST['descripcion'];
        $prioridad = $_POST['prioridad'];
        $urgente = $_POST['urgente'];
        $tipo = $_POST['tipo'];

        if($urgente != 1){
            $urgente = 0;
        }

        $sql = "INSERT INTO tareas (tarea, descripcion, prioridad, urgente, tipo) VALUES ('$tarea', '$descripcion', '$prioridad', '$urgente', '$tipo') ";

        $conn->exec($sql);

        header('Location:index.php');
    }
    else{
        echo "No hay datos";
    }
?>