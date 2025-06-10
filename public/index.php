<!DOCTYPE html>
<html>
<head>
    <title>LAMP con Docker</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid">
        <?php
            echo '<h1>Usuarios del sistema</h1>';
            $conn = mysqli_connect('db', 'user1', 'user1.pa55', 'db_ejm1');
            if (!$conn) {
                die("Error de conexión: " . mysqli_connect_error());
            }
            $query = 'SELECT * FROM Usuarios';
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo '<table class="table table-striped">';
                echo '<thead><tr><th>ID</th><th>Nombre del Usuario</th></tr></thead>';
                while ($value = $result->fetch_array(MYSQLI_ASSOC)) {
                    echo '<tr>';
                    foreach ($value as $element) {
                        echo '<td>' . htmlspecialchars($element) . '</td>';
                    }
                    echo '</tr>';
                }
                echo '</table>';
                $result->close();
            } else {
                echo "Error en la consulta: " . mysqli_error($conn);
            }

            mysqli_close($conn);
        ?>
    </div>
</body>
</html>
