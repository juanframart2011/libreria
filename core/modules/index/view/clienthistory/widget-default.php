<?php
$u = null;
if( Session::getUID() != "" && !empty( $_GET["id"] ) ):

	$u = UserData::getById( Session::getUID() );
    $user = $u->name." ".$u->lastname;
    $client_id = $_GET["id"];
    $client = ClientData::getById( $client_id );
    $cliente = false;
elseif( Session::getUID() != "" && empty( $_GET["id"] ) ):

	$u = UserData::getById( Session::getUID() );
    $user = $u->name." ".$u->lastname;
    
    $client = ClientData::getByIdUser( $u->id );
    $client_id = $client->id;
    $cliente = true;
else:

	print "<script>window.location='index.php';</script>";
endif;
?>
<div class="row">
	<div class="col-md-12">
		<h1><i class='fa fa-clock-o'></i> <?php echo $client->name." ".$client->lastname; ?> </h1>
		<br>

		<?php
		$products = array();
		if(isset($_GET["start_at"]) && $_GET["start_at"]!="" && isset($_GET["finish_at"]) && $_GET["finish_at"]!=""){

			if($_GET["start_at"]<$_GET["finish_at"]){
				
				$products = OperationData::getAllByClientIdAndRange( $client->id,$_GET["start_at"], $_GET["finish_at"] );
			}
		}
		else{
			
			$products = OperationData::getAllByClientId( $client->id );
		}
		$comision_total = 0;
		if( count( $products ) > 0 ){
			?>
			<br>
			<table class="table table-bordered table-hover	">
				<thead>
					<th>Clave</th>
					<th>Precio de Venta</th>
					<th>Precio de Costo</th>
					<th>Fecha del pedido</th>
					<th>Comisión</th>
					<? 
                	if( $u->is_admin == 1 ):?>
						<th></th>
					<?
					endif;?>
				</thead>
				<?php 
				#echo "<pre>";print_r( $products );echo "</pre>";
				foreach($products as $sell):


					#$item = $sell->getItem();
					$book = BookData::getById( $sell->book_id );
					?>
					<tr>
						<td>
						<?php echo $book->isbn; ?>
						</td>
						<td><?php echo $book->cantidad; ?></td>
						<td><?php echo $book->precio_costo; ?></td>
						<td><?php echo $sell->start_at; ?></td>
						<td>
							<?
							$comision = $book->cantidad - $book->precio_costo;
							if( $comision >= 80 ){

								echo '$40';
								$comision_total = 40 + $comision_total;
							}
							else{

								echo '$20';
								$comision_total = 20 + $comision_total;
							}
							?>
						</td>
						<? 
                		if( $u->is_admin == 1 ):?>
							<td>
								<a href="index.php?action=delorder&id=<?php echo $sell->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
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
			<p class="alert alert-danger">No hay pedidos.</p>
			<?php
		}
		$inventario = OperationData::getInventory( $client->id );
		$list_inventario = OperationData::Discount_list( $client->id );
		$inventario_sum = OperationData::Discount_sum( $client->id );
		$initial_vendedor = ClientData::getById( $client->id );
		?>
		<div class="row">
			<div class="col-lg-3">
				Inventario Inicial<br>
				<?
				if( !$cliente ):?>
					<form action="index.php?action=updateinventory" method="post">
						<input id="vendedor" type="hidden" name="vendedor" value="<?= $client->id ?>">
						<input required id="invetory_initial" type="text" name="invetory_initial" value="<?= $initial_vendedor->initial_inventory ?>">
						<button type="submit" class="btn btn-success">Editar</button>
					</form>
				<?
				else:?>
					<h3>$<?= $initial_vendedor->initial_inventory ?></h3>
				<?
				endif;?>
			</div>
			<div class="col-lg-2">
				Pedidos Realizados: <h3> $<?= ( empty( $inventario[0]->total ) ) ? 0 : $inventario[0]->total ?></h3>
			</div>
			<div class="col-lg-2">
				Abonos: <h3> $<?= ( empty( $inventario_sum[0]->total ) ) ? 0 : $inventario_sum[0]->total ?></h3>
			</div>
			<div class="col-lg-2">
				Deuda Total: <h3>$<?= ( ( $initial_vendedor->initial_inventory + $inventario[0]->total ) - $inventario_sum[0]->total ) ?></h3>
			</div>
			<div class="col-lg-2">
				Utilidades: <h3> $<?= $comision_total ?></h3>
			</div><br>
		</div>
		<?
		if( count( $list_inventario ) > 0 ){?>
			<div class="row">
				<h3 class="col-lg-4 col-lg-offset-4">Lista de Abonos:</h3><br>
				<?
				if( count( $list_inventario ) > 0 ){
					?>
					<br>
					<table align="center" class="table table-bordered table-hover">
						<thead>
							<th>Abono:</th>
							<th>Fecha del Abono:</th>
						</thead>
						<?php 
						foreach($list_inventario as $list_inventario):
							?>
							<tr>
								<td>
									<?php echo $list_inventario->discount_valor; ?>
								</td>
								<td>
									<?php echo $list_inventario->discount_date; ?>
								</td>
							</tr>
						<?php
						endforeach; ?>
					</table>
					<?php
				}?>
			</div>
		<?
		}
		if( !$cliente ):?>
			<div>
				<form action="index.php?action=addiscount" method="post">
					<input id="cliente" name="cliente" type="hidden" value="<?= $client->id ?>">
					<label>Abono: </label>
					<input required id="discount_n" type="text" name="discount_n">
					<button type="submit" class="btn btn-success">Abonar</button>
				</form>
			</div>
		<?
		endif;?>
		<div class="clearfix"></div>
		<br><br><br><br><br><br><br><br><br><br>
	</div>
</div>
