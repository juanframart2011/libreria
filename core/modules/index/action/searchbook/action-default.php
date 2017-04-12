<?php 
if( isset( $_GET["product"] ) && $_GET["product"] != "" ):

	$products = BookData::getLike( $_GET["product"] );
	
	if( count( $products ) > 0 ){ ?>
		<h3>Resultados de la Busqueda</h3>
		<table class="table table-bordered table-hover">
			<thead>
				<th>Clave</th>
				<th>Color</th>
				<th>Precio</th>
				<th>Talla / Pedir</th>
			</thead>
			<?php
			$products_in_cero = 0;
			foreach( $products as $product ): ?>
			<tr>
				<td style="width:80px;"><?= $product->isbn ?></td>
				<td><?= $product->title ?></td>
				<td><?= $product->cantidad ?></td>
				<td style="width:500px;">
					<form method="post" action="index.php?action=addtocart">
						<select class="form-control" id="talla" name="talla" required>
				            <option value="">Selecciona una Talla</option>
				            <option value="Unitalla">Unitalla</option>
				            <option value="1">1</option>
				            <option value="1 1/2">1 1/2</option>
				            <option value="2">2</option>
				            <option value="2 2/2">2 2/2</option>
				            <option value="3">3</option>
				            <option value="3 3/2">3 3/2</option>
				            <option value="4">4</option>
				            <option value="4 4/2">4 4/2</option>
				            <option value="5">5</option>
				            <option value="5 5/2">5 5/2</option>
				            <option value="6">6</option>
				            <option value="6 6/2">6 6/2</option>
				            <option value="7">7</option>
				            <option value="7 7/2">7 7/2</option>
				            <option value="8">8</option>
				            <option value="8 8/2">8 8/2</option>
				            <option value="9">9</option>
				            <option value="9 9/2">9 9/2</option>
				            <option value="10">10</option>
				            <option value="10 10/2">10 10/2</option>
				            <option value="11">11</option>
				            <option value="11 11/2">11 11/2</option>
				            <option value="12">12</option>
				            <option value="12 12/2">12 12/2</option>
				            <option value="13">13</option>
				            <option value="13 13/2">13 13/2</option>
				            <option value="14">14</option>
				            <option value="14 14/2">14 14/2</option>
				            <option value="15">15</option>
				            <option value="15 15/2">15 15/2</option>
				            <option value="16">16</option>
				            <option value="16 16/2">16 16/2</option>
				            <option value="17">17</option>
				            <option value="17 17/2">17 17/2</option>
				            <option value="18">18</option>
				            <option value="18 18/2">18 18/2</option>
				            <option value="19">19</option>
				            <option value="19 19/2">19 19/2</option>
				            <option value="20">20</option>
				            <option value="20 20/2">20 20/2</option>
				            <option value="21">21</option>
				            <option value="21 21/2">21 21/2</option>
				            <option value="22">22</option>
				            <option value="22 22/2">22 22/2</option>
				            <option value="23">23</option>
				            <option value="23 23/2">23 23/2</option>
				            <option value="24">24</option>
				            <option value="24 24/2">24 24/2</option>
				            <option value="25">25</option>
				            <option value="25 25/2">25 25/2</option>
				            <option value="26">26</option>
				            <option value="26 26/2">26 26/2</option>
				            <option value="27">27</option>
				            <option value="27 27/2">27 27/2</option>
				            <option value="28">28</option>
				            <option value="28 28/2">28 28/2</option>
				            <option value="29">29</option>
				            <option value="29 29/2">29 29/2</option>
				            <option value="30">30</option>
				            <option value="30 30/2">30 30/2</option>
				            <option value="CH">CH</option>
				            <option value="M">M</option>
				            <option value="G">G</option>
				            <option value="XL">XL</option>
				            <option value="2XL">2XL</option>
				            <option value="3XL">3XL</option>
		        		</select>
						<input type="hidden" name="book_id" value="<?php echo $product->id; ?>">
						<div class="input-group">
							<span class="input-group-btn">
								<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Agregar</button>
							</span>
							
				    	</div>
				   	</form>
				</td>
			</tr>
			<?php 
			endforeach;?>
		</table>

		<?php
	}
	else{
		echo "<br><p class='alert alert-danger'>No se encontro el producto</p>";
	}
?>
<hr><br>
<?php 
endif;?>