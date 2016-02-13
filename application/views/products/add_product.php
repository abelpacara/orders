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
				<textarea name="product_description" cols="50" rows="7" placeholder="Descripcion"></textarea>			
			</td>
		</tr>
		<tr>
			<td>				
				<button type="submit" name="btn_save" class="btn btn-default">Agregar Producto</button>				
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
			<tr>
				<td><?php echo ($i+1) ?></td>
				<td><?php echo $list_products[$i]['product_code']?></td>
				<td><?php echo $list_products[$i]['product_name']?></td>
				<td><?php echo $list_products[$i]['product_description']?></td>
			</tr>
		<?php
		}
		?>
	</table>
</div>