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
	<h1>Agregar Producto</h1>
	<?php
	echo form_open_multipart("orders/add_product");
	?>
	<table>
		<tr>
			<td>
				<input type="text" name="product_code" placeholder="Codigo"/>	
			</td>
		</tr>
		<tr>
			<td>
				<input type="text" name="product_name" placeholder="Nombre"/>				
			</td>
		</tr>
		<tr>
			<td>
				<textarea cols="50" rows="7" placeholder="Descripcion"></textarea>			
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="btn_save" value="Agregar Producto"/>				
			</td>
		</tr>
	</table>
	<?php
	echo form_close();
	?>
	<table>
		<tr>
			<th>#</th>
			<th>Codigo</th>
			<th>Nombre</th>
			<th>Descripcion</th>
		</tr>
		<?php
		for($i=0; $i<count($list_products); $i++)
		{?>
			<td><?php echo ($i+1) ?></td>
			<td><?php echo $list_products[$i]['product_code']?></td>
			<td><?php echo $list_products[$i]['product_name']?></td>
			<td><?php echo $list_products[$i]['product_description']?></td>
		<?php
		}
		?>
	</table>
</div>
</body>
</html>