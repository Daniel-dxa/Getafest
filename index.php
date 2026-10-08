<?php
include "header.php";
?>
// Daniel Bonifaz Zaquinaula - DEC

<div class="card">
<h2>Reserva tu Pase</h2>
    <!-- action lleva los datos a procesar.php -->
    <form action="procesar.php" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label>Nombre y apellidos: </label>
        <input type="text" name="nombre" required placeholder="Ej. Ana García">
    </div>

    <div class="form-group">
        <label>Correo electrónico: </label>
        <input type="email" name="email" required placeholder="tu@email.com">
    </div>

    <div class="form-group">
        <label>Edad: </label>
        <input type="number" name="edad" required min="1">
    </div>

    <div class="form-group">
        <label>Tipo de pase: </label>
        <label class="opcion"><input type="radio" name="pase" value="General" checked>General (50 €)</label>
        <label class="opcion"><input type="radio" name="pase" value="VIP">VIP con Backstage (120 €)</label>
        <label class="opcion"><input type="radio" name="pase" value="Super VIP">Super VIP + Camping (180 €)</label>
    </div>

    <div class="form-group">
        <label>Días de asistencia (+10 € por día): </label>
        <label class="opcion"><input type="checkbox" name="dias[]" value="Viernes">Viernes</label>
        <label class="opcion"><input type="checkbox" name="dias[]" value="Sábado">Sábado</label>
        <label class="opcion"><input type="checkbox" name="dias[]" value="Domingo">Domingo</label>
    </div>

    <div class="form-group">
        <label>Método de pago: </label>
        <select name="pago">
            <option>Tarjeta de crédito</option>
            <option>Bizum</option>
            <option>PayPal</option>
        </select>
    </div>

    <div class="form-group">
        <label>Foto del asistente: </label>
        <input type="file" name="foto" accept="image/*" required>
    </div>

    <div class="form-group">
        <label>Observaciones: </label>
        <textarea name="comentarios" rows="3" placeholder="Peticiones especiales..."></textarea>
    </div>

    <input type="submit" class="btn" value="Reservar">

    </form>
    </div>

    </div>

</body>
</html>