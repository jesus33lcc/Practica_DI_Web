<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iescomercio";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
  die("La conexión falló: " . $conn->connect_error);
}

// Recuperar valores del formulario
$campo1 = $_POST['campo1'];
$campo2 = $_POST['campo2'];
$campo3 = $_POST['campo3'];

// Preparar y vincular parámetros
$stmt = $conn->prepare("INSERT INTO profesores (nombre, nivel_de_conocimientos, asignatura) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $campo1, $campo2, $campo3);

// Ejecutar
$stmt->execute();

// Cerrar conexiones
$stmt->close();
$conn->close();
?>
