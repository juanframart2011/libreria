<?php 
$u = null;
if( Session::getUID() != "" ):
                        
    $u = UserData::getById( Session::getUID() );
    $user = $u->name." ".$u->lastname;
endif;
?>
<div class="row">
	<div class="col-md-12">
		<h1><i class='fa fa-th-large'></i> Pedidos</h1>
		<br>

		<div class="row">
			<div class="col-lg-4 col-lg-offset-2">
				<a href="index.php?view=order_completed"><button class="btn btn-info btn-block">Pedidos Completados</button></a>
			</div>
			<div class="col-lg-4">
				<a href="index.php?view=order_canceled"><button class="btn btn-warning btn-block">Devoluciones</button></a>
			</div>
		</div>
		<?php
		$products = array();
		if(isset($_GET["start_at"]) && $_GET["start_at"]!="" && isset($_GET["finish_at"]) && $_GET["finish_at"]!=""){

			if($_GET["start_at"]<$_GET["finish_at"]){

				if( $u->is_admin == 1 ){

					$products = OperationData::getRentsByRange( $_GET["start_at"], $_GET["finish_at"] );
				}
				else{

					$products = OperationData::getRentsByRangeId( $_GET["start_at"], $_GET["finish_at"], $u->id );
				}
			}
		}
		else{

			if( $u->is_admin == 1 ){

				$products = OperationData::getRents();
			}
			else{

				$products = OperationData::getRentsId( $u->id );
			}
		}
		if(count($products)>0){
		?>
			<br>
			<table class="table table-bordered table-hover	">
				<thead>
					<th>Clave</th>
					<?/*<th>Producto</th>*/?>
					<th>Vendedora</th>
					<th>Talla</th>
					<th>Fecha del pedido</th>
					<? 
                	if( $u->is_admin == 1 ):?>
						<th></th>
						<th></th>
					<?
					endif;?>
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
						<td><?php echo $sell->cantidad; ?></td>
						<td><?php echo $sell->start_at; ?></td>
						<? 
                		if( $u->is_admin == 1 ):?>
							<td style="width:60px;">
								<?php 
								if( $sell->returned_at == "" ):?>
									<a href="index.php?action=finalize&id=<?php echo $sell->id; ?>" class="btn btn-xs btn-success">Finalizar</a>
								<?php
								endif;?>
							</td>
							<td style="width:30px;">
								<a href="index.php?action=deloperation&id=<?php echo $sell->id; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
							</td>
						<?
						endif;?>
					</tr>
				<?php
				endforeach; ?>
			</table>
			<div class="clearfix"></div>
			<?php
		}
		else{
			?>
			<p class="alert alert-danger">No hay pedidos realizados en estos momentos.</p>
			<?php
		}
		?>
		<br><br><br><br><br><br><br><br><br><br>
	</div>
</div>