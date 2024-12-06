<?php

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'ips';



try{
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$user,$password);
$pdo ->setAttribute(\PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die("Error en la conexión a base de datos!: " .$e ->getMessage());
}

function agregarProducto($pdo, $nombreProducto, $valorProducto, $cantidadProducto) {
    try {
        $sql = "INSERT INTO producto (nombreProducto,valorProducto,cantidadProducto) VALUES (:nombreproducto, :valorproducto, :cantidadproducto)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombreproducto', $nombreProducto);
        $stmt->bindParam(':valorproducto', $valorProducto);
        $stmt->bindParam(':cantidadproducto', $cantidadProducto);
        $stmt->execute();
        echo "Producto agregado correctamente.";
    } catch (PDOException $e) {
        echo "Error al agregar producto: " . $e->getMessage();
    }
}
function buscarProducto($pdo, $nombreProducto, $valorProducto, $cantidadProducto) {
    try {
        $sql = "SELECT * FROM producto WHERE nombreProducto= :nombreproducto OR valorProducto = :valorproducto OR cantidadProducto = :cantidadproducto";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombreproducto', $nombreProducto);
        $stmt->bindParam(':valorproducto', $valorProducto);
        $stmt->bindParam(':cantidadproducto', $cantidadProducto);
        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($productos) {
            foreach ($productos as $producto) {
                echo "Nombre: " . $producto['nombreProducto'] . "<br>";
                echo "Valor: " . $producto['valorProducto'] . "<br>";
                echo "Cantidad: " . $producto['cantidadProducto'] . "<br><br>";
            }
        } else {
            echo "No se encontraron productos con los datos proporcionados.";
        }
    } catch (PDOException $e) {
        echo "Error al buscar producto: " . $e->getMessage();
    }
}
function actualizarProducto($pdo, $nombreProducto, $valorProducto, $cantidadProducto) {
    try {
        $sql = "UPDATE producto SET valorProducto = :valorproducto, cantidadProducto = :cantidadproducto WHERE nombreProducto = :nombreproducto";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombreproducto', $nombreProducto);
        $stmt->bindParam(':valorproducto', $valorProducto);
        $stmt->bindParam(':cantidadproducto', $cantidadProducto);

        if ($stmt->execute()) {
            echo "Producto actualizado exitosamente.";
        } else {
            echo "Error al actualizar producto.";
        }
    } catch (PDOException $e) {
        echo "Error al actualizar producto: " . $e->getMessage();
    }
}

function eliminarProducto($pdo, $nombreProducto, $valorProducto, $cantidadProducto) {
    try {
        $sql = "DELETE FROM producto WHERE nombreProducto = :nombreproducto OR valorProducto = :valorproducto OR cantidadProducto = :cantidadproducto";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombreproducto', $nombreProducto);
        $stmt->bindParam(':valorproducto', $valorProducto);
        $stmt->bindParam(':cantidadproducto', $cantidadProducto);

        if ($stmt->execute()) {
            echo "Producto eliminado exitosamente.";
        } else {
            echo "Error al eliminar producto.";
        }
    } catch (PDOException $e) {
        echo "Error al eliminar producto: " . $e->getMessage();
    }
}

function agregarCliente($pdo, $nombre, $numeroDocumento, $tipoDocumento, $telefono, $fechaNacimiento) {
    try {
        $sql = "INSERT INTO cliente (nombre,tipoDocumento,numeroDocumento,telefono,fechaNacimiento) VALUES (:nombre, :tipo_documento, :numero_documento, :telefono, :fecha_nacimiento)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':tipo_documento', $tipoDocumento);
        $stmt->bindParam(':numero_documento', $numeroDocumento);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':fecha_nacimiento', $fechaNacimiento);
        $stmt->execute();
        echo "Cliente agregado correctamente.";
    } catch (PDOException $e) {
        echo "Error al agregar cliente: " . $e->getMessage();
    }
}
function buscarCliente($pdo, $nombre, $numeroDocumento, $tipoDocumento, $telefono, $fechaNacimiento) {
    try {
        $sql = "SELECT * FROM cliente WHERE nombre= :nombre OR tipoDocumento = :tipo_documento OR numeroDocumento = :numero_documento OR telefono = :telefono OR fechaNacimiento = :fecha_nacimiento";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':tipo_documento', $tipoDocumento);
        $stmt->bindParam(':numero_documento', $numeroDocumento);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':fecha_nacimiento', $fechaNacimiento);
        $stmt->execute();
        $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($clientes) {
            foreach ($clientes as $cliente) {
                echo "ID: " . $cliente['ID'] . "<br>";
                echo "Nombre: " . $cliente['nombre'] . "<br>";
                echo "Tipo de documento: " . $cliente['tipoDocumento'] . "<br>";
                echo "Número de documento: " . $cliente['numeroDocumento'] . "<br>";
                echo "Teléfono: " . $cliente['telefono'] . "<br>";
                echo "Fecha de nacimiento: " . $cliente['fechaNacimiento'] . "<br>";
            }
        } else {
            echo "No se encontraron clientes con los datos proporcionados.";
        }
    } catch (PDOException $e) {
        echo "Error al buscar cliente: " . $e->getMessage();
    }
}
function actualizarCliente($pdo, $nombre, $numeroDocumento, $tipoDocumento, $telefono, $fechaNacimiento) {
    try {
        $sql = "UPDATE cliente SET tipoDocumento = :tipo_documento, numeroDocumento = :numero_documento, telefono = :telefono, fechaNacimiento = :fecha_nacimiento WHERE nombre = :nombre";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':tipo_documento', $tipoDocumento);
        $stmt->bindParam(':numero_documento', $numeroDocumento);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':fecha_nacimiento', $fechaNacimiento);

        if ($stmt->execute()) {
            echo "Ciente actualizado exitosamente.";
        } else {
            echo "Error al actualizar cliente.";
        }
    } catch (PDOException $e) {
        echo "Error al actualizar cliente: " . $e->getMessage();
    }
}

function eliminarCliente($pdo, $nombre, $numeroDocumento, $tipoDocumento, $telefono, $fechaNacimiento) {
    try {
        $sql = "DELETE FROM cliente WHERE nombre = :nombre OR tipoDocumento = :tipo_documento OR numeroDocumento = :numero_documento OR telefono = :telefono OR fechaNacimiento = :fecha_nacimiento";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':tipo_documento', $tipoDocumento);
        $stmt->bindParam(':numero_documento', $numeroDocumento);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':fecha_nacimiento', $fechaNacimiento);

        if ($stmt->execute()) {
            echo "Cliente eliminado exitosamente.";
        } else {
            echo "Error al eliminar cliente.";
        }
    } catch (PDOException $e) {
        echo "Error al eliminar cliente: " . $e->getMessage();
    }
}

function agregarFactura($pdo, $idCliente, $nombreProductoF, $valorFactura, $cantidadFactura) {
    try {
        $sql = "INSERT INTO factura (idCliente, nombreProducto, valor, cantidad) VALUES (:idcliente, :nombreproducto, :valorfactura, :cantidadfactura)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idcliente', $idCliente);
        $stmt->bindParam(':nombreproducto', $nombreProductoF);
        $stmt->bindParam(':valorfactura', $valorFactura);
        $stmt->bindParam(':cantidadfactura', $cantidadFactura);
        $stmt->execute();
        echo "Factura agregada correctamente.";
    } catch (PDOException $e) {
        echo "Error al agregar factura: " . $e->getMessage();
    }
}

function buscarFactura($pdo, $idCliente, $nombreProductoF, $valorFactura, $cantidadFactura) {
    try {
        $sql = "SELECT * FROM factura WHERE idCliente = :idcliente OR nombreProducto = :nombreproducto OR valor = :valorfactura OR cantidad = :cantidadfactura";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':idcliente', $idCliente);
        $stmt->bindParam(':nombreproducto', $nombreProductoF);
        $stmt->bindParam(':valorfactura', $valorFactura);
        $stmt->bindParam(':cantidadfactura', $cantidadFactura);
        $stmt->execute();
        $facturas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($facturas) {
            foreach ($facturas as $factura) {
                echo "Número de Factura: " . $factura['numeroFactura'] . "<br>";
                echo "ID Cliente: " . $factura['idCliente'] . "<br>";
                echo "Producto: " . $factura['nombreProducto'] . "<br>";
                echo "Valor: " . $factura['valor'] . "<br>";
                echo "Cantidad: " . $factura['cantidad'] . "<br><br>";
            }
        } else {
            echo "No se encontraron facturas con los datos proporcionados.";
        }
    } catch (PDOException $e) {
        echo "Error al buscar factura: " . $e->getMessage();
    }
}

function actualizarFactura($pdo, $idCliente, $nombreProductoF, $valorFactura, $cantidadFactura) {
    try {
        $sql = "UPDATE factura SET valor = :valorfactura, cantidad = :cantidadfactura WHERE idCliente = :idcliente AND nombreProducto = :nombreproductofactura";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idcliente', $idCliente);
        $stmt->bindParam(':nombreproductofactura', $nombreProductoF);
        $stmt->bindParam(':valorfactura', $valorFactura);
        $stmt->bindParam(':cantidadfactura', $cantidadFactura);

        if ($stmt->execute()) {
            echo "Factura actualizada exitosamente.";
        } else {
            echo "Error al actualizar factura.";
        }
    } catch (PDOException $e) {
        echo "Error al actualizar factura: " . $e->getMessage();
    }
}

function eliminarFactura($pdo, $idCliente, $nombreProductoF) {
    try {
        $sql = "DELETE FROM factura WHERE idCliente = :idcliente AND nombreProducto = :nombreproducto";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idcliente', $idCliente);
        $stmt->bindParam(':nombreproducto', $nombreProductoF);

        if ($stmt->execute()) {
            echo "Factura eliminada exitosamente.";
        } else {
            echo "Error al eliminar factura.";
        }
    } catch (PDOException $e) {
        echo "Error al eliminar factura: " . $e->getMessage();
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accionCliente = $_POST['accionCliente'] ?? '';
    $accionProducto = $_POST['accionProducto'] ?? '';
    $accionFactura = $_POST['accionFactura'] ?? '';
    $nombre = htmlspecialchars(trim($_POST['nombre'] ?? ''));
    $numeroDocumento = htmlspecialchars(trim($_POST['numero_documento'] ?? ''));
    $tipoDocumento = htmlspecialchars(trim($_POST['tipo_documento'] ?? ''));
    $telefono = htmlspecialchars(trim($_POST['telefono'] ?? ''));
    $fechaNacimiento = htmlspecialchars(trim($_POST['fecha_nacimiento'] ?? ''));
    $nombreProducto = htmlspecialchars(trim($_POST['nombreproducto'] ?? ''));
    $valorProducto = htmlspecialchars(trim($_POST['valorproducto'] ?? ''));
    $cantidadProducto = htmlspecialchars(trim($_POST['cantidadproducto'] ?? ''));
    $idCliente = htmlspecialchars(trim($_POST['idcliente']??''));
    $nombreProductoF = htmlspecialchars(trim($_POST['nombreproductofactura']??''));
    $valorFactura = htmlspecialchars(trim($_POST['valorfactura'] ?? ''));
    $cantidadFactura = htmlspecialchars(trim($_POST['cantidadfactura'] ?? ''));
    $ID = htmlspecialchars(trim($_POST['ID']??''));
    if ($accionProducto == true){
    switch ($accionProducto) {
        case 'agregar':
            if ($nombreProducto && $valorProducto && $cantidadProducto) {
                agregarProducto($pdo, $nombreProducto, $valorProducto, $cantidadProducto);
            } else {
                echo "Error: todos los campos son obligatorios para agregar un producto.";
            }
            break;

        case 'buscar':
            buscarProducto($pdo, $nombreProducto, $valorProducto, $cantidadProducto);
            break;

        case 'actualizar':
            if ($nombreProducto && ($valorProducto || $cantidadProducto)) {
                actualizarProducto($pdo, $nombreProducto, $valorProducto, $cantidadProducto);
            } else {
                echo "Error: el nombre y al menos un dato adicional son obligatorios para actualizar.";
            }
            break;

        case 'eliminar':
            eliminarProducto($pdo, $nombreProducto, $valorProducto, $cantidadProducto);
            break;

        default:
            echo "Error: acción no reconocida.";
            break;
    }
}elseif($accionCliente == true){
    
    switch ($accionCliente) {
        case 'agregar':
            if ($nombre && $tipoDocumento && $numeroDocumento && $telefono && $fechaNacimiento) {
                agregarCliente($pdo, $nombre, $numeroDocumento, $tipoDocumento, $telefono, $fechaNacimiento);
            } else {
                echo "Error: todos los campos son obligatorios para agregar un cliente.";
            }
            break;

        case 'buscar':
            buscarCliente($pdo, $nombre, $tipoDocumento , $numeroDocumento, $telefono, $fechaNacimiento);
            break;

        case 'actualizar':
            if ($nombre && ($tipoDocumento || $numeroDocumento || $telefono || $fechaNacimiento)) {
                actualizarCliente($pdo, $nombre, $tipoDocumento, $numeroDocumento, $telefono, $fechaNacimiento);
            } else {
                echo "Error: el nombre y al menos un dato adicional son obligatorios para actualizar.";
            }
            break;

        case 'eliminar':
            eliminarCliente($pdo, $nombre, $tipoDocumento, $numeroDocumento, $telefono, $fechaNacimiento);
            break;

        default:
            echo "Error: acción no reconocida.";
            break;
    }
}else{
    switch ($accionFactura) {
        case 'agregar':
            if ($idCliente && $nombreProductoF && $valorFactura && $cantidadFactura) {
                agregarFactura($pdo, $idCliente, $nombreProductoF, $valorFactura, $cantidadFactura);
            } else {
                echo "Error: todos los campos son obligatorios para agregar una factura.";
            }
            break;

        case 'buscar':
            buscarFactura($pdo, $idCliente, $nombreProductoF, $valorFactura, $cantidadFactura);
            break;

        case 'actualizar':
            if ($idCliente && ($nombreProductoF || $valorFactura || $cantidadFactura)) {
                actualizarFactura($pdo, $idCliente, $nombreProductoF, $valorFactura, $cantidadFactura);
            } else {
                echo "Error: el nombre y al menos un dato adicional son obligatorios para actualizar.";
            }
            break;

        case 'eliminar':
            eliminarFactura($pdo, $idCliente, $nombreProductoF);
            break;

        default:
            echo "Error: acción no reconocida.";
            break;
        }
    }
}
?>