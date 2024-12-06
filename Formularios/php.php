<html>
<body>
    
<?php

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];

echo "Su nombre es ", $nombre , "<br>";
echo "Su apellido es ", $apellido, "<br>";
echo "Su teléfono es ", $telefono,"<br>";

$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Se ha conectado correctamente con el servidor de la base de datos </br>";
} catch(PDOException $e) {
  echo "Conexion Fallida, con PDO Orientada a Objetos, extencion de PHP </br> " . $e->getMessage();
}
?>

</body>

</html>