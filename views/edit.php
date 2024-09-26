<h1>Editar Contacto</h1>
<form action="index.php?action=update" method="POST">
    <input type="hidden" name="id" value="<?= $contact['id']; ?>">
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?= $contact['nombre']; ?>" required><br>
    <label>Teléfono:</label>
    <input type="text" name="telefono" value="<?= $contact['telefono']; ?>" required><br>
    <label>Email:</label>
    <input type="email" name="email" value="<?= $contact['email']; ?>" required><br>
    <label>Dirección:</label>
    <input type="text" name="direccion" value="<?= $contact['direccion']; ?>" required><br>
    <input type="submit" value="Actualizar">
</form>
