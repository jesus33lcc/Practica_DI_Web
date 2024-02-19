<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Formulario de inserción y visualización de datos</title>
</head>
<body>
    <div class="container">
        <h2>Formulario de inserción</h2>
        <form action="insertar.php" method="post">
            Campo 1 (nombre): <input type="text" name="campo1"><br>
            Campo 2 (nivel de conocimientos): <input type="text" name="campo2"><br>
            Campo 3 (asignatura): <input type="text" name="campo3"><br>
            <input type="submit" value="Insertar">
        </form>
    </div>

    

    <!-- Aquí comienza la sección para mostrar los datos -->
    <h2>Datos de la Base de Datos</h2>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Nivel de Conocimientos</th>
            <th>Asignatura</th>
        </tr>
        <?php
        // Crear conexión
        $conn = new mysqli("localhost", "root", "", "iescomercio");

        // Verificar conexión
        if ($conn->connect_error) {
            die("La conexión falló: " . $conn->connect_error);
        }

        // Consultar la base de datos
        $sql = "SELECT nombre, nivel_de_conocimientos, asignatura FROM profesores";
        $result = $conn->query($sql);

        // Mostrar los datos en la tabla
        if ($result->num_rows > 0) {
            // Salida de datos de cada fila
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row["nombre"]) . "</td>
                        <td>" . htmlspecialchars($row["nivel_de_conocimientos"]) . "</td>
                        <td>" . htmlspecialchars($row["asignatura"]) . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No se encontraron datos</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
