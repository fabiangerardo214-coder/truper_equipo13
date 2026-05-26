<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}

include("conexion.php");

/* ========================= */
/* INSERTAR */
/* ========================= */

if(isset($_POST['guardar'])){

    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $insertar = "INSERT INTO herramientas(nombre,precio,stock)
    VALUES('$nombre','$precio','$stock')";

    mysqli_query($conn,$insertar);

    header("Location: admin.php");
}

/* ========================= */
/* ELIMINAR */
/* ========================= */

if(isset($_GET['eliminar'])){

    $id = $_GET['eliminar'];

    $delete = "DELETE FROM herramientas WHERE id='$id'";

    mysqli_query($conn,$delete);

    header("Location: admin.php");
}

/* ========================= */
/* EDITAR */
/* ========================= */

if(isset($_GET['editar'])){

    $editar_id = $_GET['editar'];

    $editar = "SELECT * FROM herramientas WHERE id='$editar_id'";

    $resultado_editar = mysqli_query($conn,$editar);

    $fila_editar = mysqli_fetch_assoc($resultado_editar);
}

/* ========================= */
/* ACTUALIZAR */
/* ========================= */

if(isset($_POST['actualizar'])){

    $id = $_POST['id'];

    $nombre = $_POST['nombre'];

    $precio = $_POST['precio'];

    $stock = $_POST['stock'];

    $update = "UPDATE herramientas
    SET
    nombre='$nombre',
    precio='$precio',
    stock='$stock'
    WHERE id='$id'";

    mysqli_query($conn,$update);

    header("Location: admin.php");
}

/* ========================= */
/* CONSULTA */
/* ========================= */

$sql = "SELECT * FROM herramientas";

$resultado = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard TRUPER</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial;
}

body{
    background:#0f172a;
    color:white;
    padding:30px;
}

/* TOPBAR */

.topbar{

    display:flex;
    justify-content:space-between;
    align-items:center;

    margin-bottom:40px;
}

.logo{

    font-size:38px;

    color:#f97316;
}

.logout{

    background:#dc2626;

    color:white;

    text-decoration:none;

    padding:14px 25px;

    border-radius:12px;

    transition:.3s;
}

.logout:hover{
    background:#b91c1c;
}

/* CONTAINER */

.container{

    background:#1e293b;

    padding:30px;

    border-radius:25px;

    box-shadow:0 0 20px rgba(0,0,0,.4);
}

/* FORM */

.formulario{

    display:grid;

    grid-template-columns:repeat(4,1fr);

    gap:15px;

    margin-bottom:40px;
}

.formulario input{

    padding:15px;

    border:none;

    border-radius:12px;

    outline:none;

    background:#334155;

    color:white;
}

.formulario input::placeholder{
    color:#cbd5e1;
}

.formulario button{

    background:#f97316;

    color:white;

    border:none;

    border-radius:12px;

    cursor:pointer;

    font-size:16px;

    transition:.3s;
}

.formulario button:hover{

    background:#ea580c;

    transform:scale(1.03);
}

/* TABLA */

table{

    width:100%;

    border-collapse:collapse;
}

table th{

    background:#111827;

    padding:18px;

    font-size:17px;
}

table td{

    padding:16px;

    text-align:center;

    border-bottom:1px solid #334155;
}

tr:hover{
    background:#273549;
}

/* BOTONES */

.editar{

    background:#2563eb;

    color:white;

    padding:10px 15px;

    border-radius:10px;

    text-decoration:none;

    margin-right:8px;
}

.eliminar{

    background:#dc2626;

    color:white;

    padding:10px 15px;

    border-radius:10px;

    text-decoration:none;
}

.editar:hover{
    background:#1d4ed8;
}

.eliminar:hover{
    background:#b91c1c;
}

</style>

</head>
<body>

<div class="topbar">

    <h1 class="logo">

        <i class="fa-solid fa-screwdriver-wrench"></i>

        TRUPER DASHBOARD

    </h1>

    <a href="logout.php" class="logout">

        <i class="fa-solid fa-right-from-bracket"></i>

        Cerrar Sesión

    </a>

</div>

<div class="container">

<form class="formulario" method="POST">

<?php

if(isset($fila_editar)){

?>

<input
type="hidden"
name="id"
value="<?php echo $fila_editar['id']; ?>"
>

<input
type="text"
name="nombre"
value="<?php echo $fila_editar['nombre']; ?>"
required>

<input
type="number"
step="0.01"
name="precio"
value="<?php echo $fila_editar['precio']; ?>"
required>

<input
type="number"
name="stock"
value="<?php echo $fila_editar['stock']; ?>"
required>

<button type="submit" name="actualizar">

<i class="fa-solid fa-pen"></i>

Actualizar

</button>

<?php

}else{

?>

<input
type="text"
name="nombre"
placeholder="Nombre herramienta"
required>

<input
type="number"
step="0.01"
name="precio"
placeholder="Precio"
required>

<input
type="number"
name="stock"
placeholder="Stock"
required>

<button type="submit" name="guardar">

<i class="fa-solid fa-plus"></i>

Agregar

</button>

<?php } ?>

</form>

<table>

<tr>

    <th>ID</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Stock</th>
    <th>Acciones</th>

</tr>

<?php

if(mysqli_num_rows($resultado) > 0){

    while($fila = mysqli_fetch_assoc($resultado)){

?>

<tr>

<td><?php echo $fila['id']; ?></td>

<td><?php echo $fila['nombre']; ?></td>

<td>$<?php echo $fila['precio']; ?></td>

<td><?php echo $fila['stock']; ?></td>

<td>

<a
href="admin.php?editar=<?php echo $fila['id']; ?>"
class="editar"
>

<i class="fa-solid fa-pen"></i>

</a>

<a
href="admin.php?eliminar=<?php echo $fila['id']; ?>"
class="eliminar"

onclick="return confirm('¿Seguro que deseas eliminar esta herramienta?')"
>

<i class="fa-solid fa-trash"></i>

</a>

</td>

</tr>

<?php

    }

}else{

    echo "
    <tr>
        <td colspan='5'>
            No hay herramientas registradas
        </td>
    </tr>
    ";

}

?>

</table>

</div>

</body>
</html>
