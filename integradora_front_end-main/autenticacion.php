<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
<?php
include 'data_base.php';
session_start();
// Si el usuario ya inició sesión, redirigirlo a la página de inicio
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['usuario'];
    $password = $_POST['contraseña'];

    if (empty($username) || empty($password)) {
        echo "<h2>Por favor, complete todos los campos.</h2>";
    } else {
        // Aquí se ejecutan las consultas a la base de datos
        $sql = "SELECT * FROM usuarios_autorizados WHERE email='$username' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION['usuario'] = $username;
            echo "Inicio de sesión exitoso.";
           header("location:interfaz.php");
           exit();
        } else {
            echo "<h2>Nombre de usuario o contraseña incorrectos.</h2>";
        }
    }
}
?>   
</body>
</html>