<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Agregar Productos a Pedido</title>
</head>
<body>

<div id="container">
	<h1>Agregar Productos a Pedido</h1>	
	<?php
	echo form_open_multipart("orders/add_to_order");
	?>
	<table>
		<tr>
			<th>
				Seleccione Cliente:
				<select name="id_client">
					<?php					
					for($i=0; $i<count($list_clients); $i++)
					{?>
						<option value="<?php echo $list_clients[$i]['id_client']?>"><?php echo $list_clients[$i]['client_name']?></option>
						<?php
					}?>
				</select>
			</th>
		</tr>
	</table>

	<input type="hidden" name="availables_maximum" value="<?php echo count($list_inventories)?>"/>
	<table>
		<tr>
			<th></th>
			<th><input value="Buscar por codigo"  placeholder/></th>
			<th><input value="Buscar por nombre"  placeholder/></th>
		</th>
		<tr>
			<th>#</th>
			<th>Codigo</th>
			<th>Nombre</th>
			<th>Ultima modificacion</th>
			<th>Saldo Actual</th>
			<th>Precio Minimo</th>
			<th>Precio Maximo</th>			
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
				<td><?php echo $list_inventories[$i]['product_minimum_price']?></td>
				<td><?php echo $list_inventories[$i]['product_maximum_price']?></td>

				<td>
					<input type="hidden" name="product_id_<?php echo $i?>" value="<?php echo $list_inventories[$i]['id_product']?>"/>
					<input type="text" name="order_item_quantity_<?php echo $i?>" value="0"/>
				</td>
			</tr>
		<?php
		}
		?>

		<tr>
			<td>
				<input type="submit" name="btn_save" value="Agregar A Pedido"/>				
			</td>
		</tr>
	</table>
	<?php
	echo form_close();
	?>
</div>
</body>
</html>