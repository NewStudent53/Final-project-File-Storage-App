<?php
session_start();
include 'connect.php';

// Obtener user_id de la solicitud
if (isset($_GET['user_id'])) {
    $id_usuario = $_GET['user_id'];
} /*else {
    // Manejar el caso en que no se proporciona user_id
    die("User ID no proporcionado.");
}*/

echo "entre a consultfiles";

// Definir la consulta SQL
$sql = "SELECT user_id, file_name, file_path, upload_date, trash_indicator FROM files WHERE user_id = ? AND trash_indicator = 0";
echo "$id_usuario aqui";
// Preparar y ejecutar la consulta
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$result = $stmt->get_result();

echo "$id_usuario aqui2";

// Mostrar los resultados en una tabla HTML
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>User ID</th><th>File Name</th><th>File Path</th><th>Upload Date</th><th>Trash Indicator</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["user_id"] . "</td>";
        echo "<td>" . $row["file_name"] . "</td>";
        echo "<td>" . $row["file_path"] . "</td>";
        echo "<td>" . $row["upload_date"] . "</td>";
        echo "<td>" . $row["trash_indicator"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron archivos.";
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>