<div class="row">
	<div class="col-md-12">
		<h1><i class='fa fa-th-large'></i> Pedidos Completados</h1>
		<br>
	
		<?php
		$products = array();
		if(isset($_GET["start_at"]) && $_GET["start_at"]!="" && isset($_GET["finish_at"]) && $_GET["finish_at"]!=""){

			if($_GET["start_at"]<$_GET["finish_at"]){
				$products = OperationData::getRentsByRangeCompleted($_GET["start_at"],$_GET["finish_at"]);
			}
		}
		else{

			$products = OperationData::getRentsCompleted();
		}
		if(count($products)>0){
		?>
			<br>
			<table class="table table-bordered table-hover	">
				<thead>
					<th>Clave</th>
					<?/*<th>Producto</th>*/?>
					<th>Vendedora</th>
					<th>Fecha del pedido</th>
				
				</thead>
				<?php
				foreach( $products as $sell ):
					/*$item = $sell->getItem();
					$book = $item->getBook();*/
					$book = BookData::getById( $sell->book_id );

					$client = $sell->getClient();
					?>
					<tr>
						<?/*<td style="width:30px;">
							<?php echo $sell->book_id;?>
						</td>*/?>
						<td>
							<?php echo $book->isbn; ?>
						</td>
						<td>
							<?php echo $client->name." ".$client->lastname; ?>
						</td>
						<td><?php echo $sell->start_at; ?></td>
					
					</tr>
				<?php
				endforeach; ?>
			</table>
			<div class="clearfix"></div>
			<?php
		}
		else{
			?>
			<p class="alert alert-danger">No hay pedidos completados en estos momentos.</p>
			<?php
		}
		?>
		<br><br><br><br><br><br><br><br><br><br>
	</div>
</div>