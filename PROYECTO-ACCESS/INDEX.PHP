<?php
$con = odbc_connect("CERE0", "", "");
if ($con) {
    echo "Connectado";
} else {
    echo "Failed";
}

$sql = "SELECT SUM(OrdenesTrabajo_Act.Costo) AS TotalItemsOrdered FROM Articulos, Articulos_Lineas, OrdenesTrabajo INNER JOIN OrdenesTrabajo_Act ON OrdenesTrabajo.ID = OrdenesTrabajo_Act.ID_OrdenTrabajo WHERE (((OrdenesTrabajo.Status)='C') AND ((OrdenesTrabajo.ID_Vehiculo)='142')) AND OrdenesTrabajo.Fecha BETWEEN #01/01/2019# AND #31/01/2019#";
$result = odbc_exec($con, $sql);
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<table>
    <tr>
        <th>ID</th>
        <th>Descripcion</th>
    </tr>


</table>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Status</th>
            <th scope="col">Fecha</th>
            <th scope="col">TipoVehiculo</th>
            <th scope="col">ID_Vehiculo</th>
            <th scope="col">TipoTaller</th>
            <th scope="col">ID_Articulo</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Costo</th>
            <th scope="col">Descripcion</th>

        </tr>
    </thead>
    <tbody>
        <tr>
            <?php $CONTADOR=0; while ($row = odbc_fetch_array($result)) { ?>
        <tr>
            <td><?php echo $row['TotalItemsOrdered'] ?></td>
            <td><?php echo $row['Status'] ?></td>
            <td><?php echo $row['Fecha'] ?></td>
            <td><?php echo $row['TipoVehiculo'] ?></td>
            <td><?php echo $row['ID_Vehiculo'] ?></td>
            <td><?php echo $row['TipoTaller'] ?></td>
            <td><?php echo $row['ID_Articulo'] ?></td>
            <td><?php echo $row['Cantidad'] ?></td>
            <td> <?php echo $CONTADOR = $CONTADOR + $row['Costo'] ?>  </td>

            <td><?php echo $row['Descripcion'] ?></td>

        </tr>

    <?php } ?>
    </tr>

    </tbody>
</table>