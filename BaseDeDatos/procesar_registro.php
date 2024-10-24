<?php
// Iniciar la sesión
session_start();

// Verificar si el formulario se envió mediante POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Configuración de la conexión a la base de datos
    $servername = "localhost"; // Dirección del servidor (localhost si es en tu máquina)
    $username = "root";  // Nombre de usuario de la base de datos
    $password = "leon123"; // Contraseña de la base de datos
    $dbname = "proyecto_pruebaa"; // Nombre de tu base de datos

    // Crear la conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener datos del formulario
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $apellido = $conn->real_escape_string($_POST['apellido']);
    $correo = $conn->real_escape_string($_POST['correo']);
    $telefono = $conn->real_escape_string($_POST['telefono']);
    $clave = $conn->real_escape_string($_POST['clave']);
    $rol = $conn->real_escape_string($_POST['rol']); 
    $rol = $rol + 1;

    // Insertar datos en la base de datos
    $sql = "INSERT INTO persona (nombre, apellido, correo, telefono, clave, rol) VALUES ('$nombre', '$apellido', '$correo', '$telefono', '$clave', '$rol')";

    if ($conn->query($sql) === TRUE) {
        // Guardar un mensaje en la sesión
        $_SESSION['mensaje'] = "¡Registro completado con éxito!";
        
        // Redirigir a la página de confirmación
        header("Location: confirmacion.php");
        exit();
    } else {
        // Si hubo un error en la inserción
        $_SESSION['mensaje'] = "Error al registrar: " . $conn->error;
        
        // Redirigir de vuelta al formulario de registro
        header("Location: formulario_registro.php");
        exit();
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Si alguien intenta acceder directamente a este script sin enviar el formulario
    header("Location: formulario_registro.php");
    exit();
}
?>