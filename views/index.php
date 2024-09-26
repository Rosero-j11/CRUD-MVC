<h1>Lista de Contactos</h1>
<a href="index.php?action=create">Crear Contacto</a>
<table border="1">
    <tr>
        <th>Nombre</th>
        <th>Teléfono</th>
        <th>Email</th>
        <th>Dirección</th>
        <th>Acciones</th>
    </tr>
    <?php while ($row = $contacts->fetch(PDO::FETCH_ASSOC)): ?>
    <tr>
        <td><?= $row['nombre']; ?></td>
        <td><?= $row['telefono']; ?></td>
        <td><?= $row['email']; ?></td>
        <td><?= $row['direccion']; ?></td>
        <td>
            <a href="index.php?action=show&id=<?= $row['id']; ?>">Ver</a>
            <a href="index.php?action=edit&id=<?= $row['id']; ?>">Editar</a>
            <a href="index.php?action=delete&id=<?= $row['id']; ?>">Eliminar</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
