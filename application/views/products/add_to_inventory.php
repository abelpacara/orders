<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Agregar Producto</title>
</head>
<body>

<div id="container">
	<h1>Agregar Inventario de Productos</h1>	
	<?php
	echo form_open_multipart("orders/add_to_inventory");
	?>
	<input type="hidden" name="availables_maximum" value="<?php echo count($list_inventories)?>"/>
	<table>
		<tr>
			<th>#</th>
			<th>Codigo</th>
			<th>Nombre</th>
			<th>Ultima modificacion</th>
			<th>Saldo Actual</th>
			<th>Cantidad</th>
		</tr>
		<?php
		for($i=0; $i<count($list_inventories); $i++)
		{?>
			<tr>
				<td><?php echo ($i+1) ?></td>
				<td><?php echo $list_inventories[$i]['product_code']?></td>
				<td><?php echo $list_inventories[$i]['product_name']?></td>
				<td><?php echo $list_inventories[$i]['inventory_last_date']?></td>
				<td><?php echo $list_inventories[$i]['inventory_quantity']?></td>
				<td>
					<input type="hidden" name="product_id_<?php echo $i?>" value="<?php echo $list_inventories[$i]['id_product']?>"/>
					<input type="text" name="inventory_quantity_<?php echo $i?>"/>
				</td>
			</tr>
		<?php
		}
		?>

		<tr>
			<td>
				<input type="submit" name="btn_save" value="Agregar en Inventario"/>				
			</td>
		</tr>
	</table>
	<?php
	echo form_close();
	?>
</div>
</body>
</html>