<?php
// Daniel Bonifaz Zaquinaula - DEC

//Si entran escribiendo la URL (sin POST), los mandamos al formulario
if ($_SERVER['REQUEST_METHOD'] != "POST") {
    header("Location: index.php");
    exit;
}

include "header.php";

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$edad = $_POST['edad'];
$pase = $_POST['pase'];
$pago = $_POST['pago'];
$comentarios = $_POST['comentarios'];

// Días marcados (si no marca ninguno, array vacío)
$dias = array();
if (isset($_POST['dias'])) {
    $dias = $_POST['dias'];
}

// Validamos la edad
if ($edad < 18) {
?>
<div class="card error">
<p>El evento es exclusivo para mayores de 18 años.</p>
<a href="index.php">Volver</a>
</div>
<?php
    exit;
}

// Validamos la foto
if ($_FILES['foto']['type'] != "image/png" && $_FILES['foto']['type'] != "image/jpeg") {
?>
<div class="card error">
<p>La foto no es válida (solo png o jpg).</p>
<a href="index.php">Volver</a>
</div>
<?php
    exit;
}

// Movemos la foto a images/
$foto = $_FILES['foto']['name'];
move_uploaded_file($_FILES['foto']['tmp_name'], "images/" . $foto);

// 4. Precio según el pase + 10 € por día
$precioBase = 180;
if ($pase == "General") {
    $precioBase = 50;
}
if ($pase == "VIP") {
    $precioBase = 120;
}
$suplemento = count($dias) * 10;
$total = $precioBase + $suplemento;
?>

<div class="card ticket">
<h3>Acreditación Digital</h3>
<img src="images/<?php echo $foto; ?>" alt="Foto">
<p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
<p><strong>Email:</strong> <?php echo $email; ?></p>
<p><strong>Pase:</strong> <?php echo $pase; ?></p>
<p><strong>Días:</strong> <?php echo implode(", ", $dias); ?></p>
<p><strong>Pago:</strong> <?php echo $pago; ?></p>
<p><strong>Observaciones:</strong> <?php echo $comentarios; ?></p>
<hr>
<p>Precio base: <?php echo $precioBase; ?> €</p>
<p>Suplemento días: <?php echo $suplemento; ?> €</p>
<p class="total">TOTAL A PAGAR: <?php echo $total; ?> €</p>
<a href="index.php">Nueva reserva</a>
</div>

</body>
</html>
