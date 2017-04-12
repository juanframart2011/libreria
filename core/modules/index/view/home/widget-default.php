<?php
//unset($_SESSION["cart"]);
?>
<div class="row">
	<div class="col-md-12">
	<h1>Pedir</h1>
	<p><b>Buscar producto por clave:</b></p>
		<form id="searchp">
		<div class="row">
			<div class="col-md-6">
				<input type="hidden" name="view" value="sell">
				<input type="text" id="product_code" name="product" class="form-control">
			</div>
			<div class="col-md-3">
			<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Buscar</button>
			</div>
		</div>
		</form>
	</div>
<div id="show_search_results"></div>
<script>
//jQuery.noConflict();

$(document).ready(function(){
	$("#searchp").on("submit",function(e){
		e.preventDefault();
		
		$.get("./?action=searchbook",$("#searchp").serialize(),function(data){
			$("#show_search_results").html(data);
		});
		$("#product_code").val("");
	});
});
</script>
<!--- Carrito de compras :) -->
<?php 
if( isset( $_SESSION["cart"] ) ):
	$total = 0;
?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Datos del pedido</h2>

				<form class="form-horizontal" role="form" method="post" action="./?action=process">
					<div class="form-group">
						<div class="col-lg-3">
							<label class="control-label">Vendedora</label>
							<select name="client_id" required class="form-control">
								<option value="">-- SELECCIONE --</option>
								<?php 
								foreach(ClientData::getAll() as $p):?>
									<option value="<?php echo $p->id; ?>"><?php echo $p->name." ".$p->lastname; ?></option>
								<?php 
								endforeach; ?>
							</select>
						</div>

						<div class="col-lg-3">
							<label class="control-label">Fecha que se realiza el pedido:</label>
							<input type="date" name="start_at" required class="form-control" placeholder="Email">
						</div>
						<div class="col-lg-2">
							<label class="control-label"><br></label>
							<input type="submit" value="Procesar" class="btn btn-primary btn-block" placeholder="Email">
						</div>
						<div class="col-lg-1">
							<label class="control-label"><br></label>
							<a href="./?action=clearcart" class="btn btn-danger btn-block"><i class="fa fa-trash"></i></a>
						</div>
					</div>
				</form>

				<table class="table table-bordered table-hover">
					<thead>
						<th style="width:40px;">Clave</th>
						<?/*<th style="width:40px;">Cantidad</th>*/?>
						<th>Color</th>
						<th>Precio</th>
						<th>Talla</th>
						<th></th>
					</thead>
					<?php 
					foreach( $_SESSION["cart"] as $p ):
						$book = BookData::getById( $p["book_id"] );
						#$item = ItemData::getById($p["cantidad"]);
						?>
						<tr>
							<td><?= $book->isbn; ?></td>
							<?/*<td ><?php echo $item->code; ?></td>*/?>
							<td ><?= $book->title; ?></td>
							<td ><?= $book->cantidad; ?></td>
							<td ><?= $p["talla"] ?></td>
							<td style="width:30px;">
								<a href="index.php?view=clearcart&product_id=<?php echo $book->id; ?>" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Cancelar</a>
							</td>
						</tr>
					<?php 
					endforeach; ?>
				</table>
			</div>
		</div>
	</div>
	<br><br><br><br><br>
<?php
endif;?>
















<?php
/*
$thejson = array();
$events = OperationData::getRents();

foreach( $events as $event ){

	$book = BookData::getById( $event->book_id );
	/*$item = ItemData::getById($event->item_id);
	$book = $item->getBook();

	if( !empty( $book ) ){

		$thejson[] = array("title"=>$book->code." - ".$book->title,"url"=>"","start"=>$event->start_at,"end"=>$event->finish_at);
	}
	else{

		$thejson[] = array("title"=>" - ","url"=>"","start"=>$event->start_at,"end"=>$event->finish_at);
	}
}
// print_r(json_encode($thejson));
?>
<script>


	$(document).ready(function() {

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			defaultDate: '<?php echo date("Y-m-d");?>',
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			events: <?php echo json_encode($thejson); ?>
		});
	});
</script>


<div class="row">
	<div class="col-md-12">
		<h1>Calendario</h1>
		<div id="calendar"></div>
	</div>
</div>*/?>