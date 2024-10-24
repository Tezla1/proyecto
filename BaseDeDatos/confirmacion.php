<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmación de Registro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .mensaje {
            text-align: center;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <div class="mensaje">
        <h1>Confirmación</h1>
        <?php
        if (isset($_SESSION['mensaje'])) {
            echo "<p>" . htmlspecialchars($_SESSION['mensaje']) . "</p>";
            unset($_SESSION['mensaje']); // Limpiar el mensaje después de mostrarlo
        } else {
            echo "<p>No hay mensaje de confirmación.</p>";
        }
        ?>
        <p>Serás redirigido a la página principal en 5 segundos...</p>
    </div>

    <script>