<?php
include("db.php");
if (isset($_POST['save_task'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    // Utilizamos sentencia preparada para evitar inyección de SQL
    $query = "INSERT INTO task (title, description) VALUES (?, ?)";
    
    // Preparar la sentencia
    $stmt = mysqli_prepare($conn, $query);
    
    // Asignar los valores y tipos de datos a los parámetros
    mysqli_stmt_bind_param($stmt, "ss", $title, $description);
    
    // Ejecutar la sentencia
    $result = mysqli_stmt_execute($stmt);
    
    if (!$result) {
        die('error');
    }
    $_SESSION['message'] = 'Task saved succesfully';
    $_SESSION['message_type'] = 'success';
    header( 'Location: index.php' ) ;
}

?>
