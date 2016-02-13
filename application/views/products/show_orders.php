<table>		
		<tr>
			<th>#</th>
			<th>Id Order</th>
			<th>Order Date</th>
			<th>Producto</th>
			<th>Cantidad</th>
			<th>Precio</th>
		</tr>
		<?php
		for($i=0; $i<count($list_order_items); $i++)
		{?>
			<tr>
				<td><?php echo ($i+1) ?></td>
				<td><?php echo $list_order_items[$i]['id_order']?></td>
				<td><?php echo $list_order_items[$i]['order_date']?></td>
				<td><?php echo $list_order_items[$i]['product_name']?></td>
				<td><?php echo $list_order_items[$i]['order_item_quantity']?></td>
				<td><?php echo $list_order_items[$i]['order_item_price']?></td>
			</tr>
		<?php
		}
		?>
	</table>