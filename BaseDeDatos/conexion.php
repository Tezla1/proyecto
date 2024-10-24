<?php
// Configuración de la conexión a la base de datos
$servername = "localhost"; // Dirección del servidor (localhost si es en tu máquina)
$username = "root";  // Nombre de usuario de la base de datos
$password = "leon123"; // Contraseña de la base de datos
$dbname = "proyecto"; // Nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "Conexión exitosa";
?>

