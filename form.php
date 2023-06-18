<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];

    // conexión con PDO
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cursosql";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // establecer el modo de error de PDO a excepción
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellido, email) VALUES (:nombre, :apellido, :email)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        echo "Nuevo registro creado exitosamente";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario de Alta</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap" rel="stylesheet">
</head>
<body>
    
    <div class="goup">
        <form method="post" action="" id="altaform">
            <h2><em>Formulario de Alta</em></h2>    
            <label for="nombre">Nombre: <span><em> (requerido) </em></span></label>
            <input type="text" name="nombre" class="form-input" required/>
                        
            <label for="apellido">Apellido:<span><em> (requerido) </em></span></label>
            <input type="text" name="apellido" class="form-input" required>            
                        
            <label for="email">Email:<span><em> (requerido) </em></span></label>
            <input type="email" name="email" class="form-input" />
                    
            <input class="form-btn" name="submit" type="submit" value="suscribirse" />
        </form>
       
    </div>

    <script src="script.js"></script>

</body>
</html>
