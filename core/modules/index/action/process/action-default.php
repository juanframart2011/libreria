<?php
$go = true;
#date_default_timezone_get( 'America/Mexico_City' );
if( $go && isset( $_SESSION["cart"] ) ){

	$cart = $_SESSION["cart"];

	if( count( $cart ) > 0 ){

		/*$sell = new SellData();
		$sell->user_id = $_SESSION["user_id"];
		$sell->total = $_POST["total"];
		$sell->discount = $_POST["discount"];
		$s = $sell->add();*/

		$a = 0;
		foreach($cart as  $c){

			$r[$a] = BookData::getById( $c["book_id"] );
			#$cantidad_libro = $r[$a]->cantidad - $c["cantidad"];
			/*
			$r[$a]->title = $r[$a]->title;
			$r[$a]->subtitle = $r[$a]->subtitle;
			$r[$a]->description = ( empty( $r[$a]->description ) ) ? 'NULL' : $r[$a]->description;
			$r[$a]->cantidad = $r[$a]->cantidad;
			$r[$a]->isbn = $r[$a]->isbn;
			$r[$a]->n_pag = ( empty( $r[$a]->n_pag ) ) ? 0 : $r[$a]->n_pag;
			$r[$a]->year = ( empty( $r[$a]->year ) ) ? 0 : $r[$a]->year;
			$r[$a]->category_id = $r[$a]->category_id!="" ? $r[$a]->category_id : "NULL";;
			$r[$a]->editorial_id = ( !empty( $r[$a]->editorial_id ) ) ? $r[$a]->editorial_id : "NULL";
			$r[$a]->author_id = ( !empty( $r[$a]->author_id ) ) ? $r[$a]->author_id : "NULL";
			$r[$a]->update();*/


			$op[$a] = new OperationData();
			
			$op[$a]->book_id = $c["book_id"];
			$op[$a]->cantidad = $c["talla"];
			$op[$a]->client_id = $_POST["client_id"];
			$op[$a]->start_at = $_POST["start_at"];
			#$op[$a]->finish_at = '30-12-9999';
			$op[$a]->user_id = $_SESSION["user_id"];

			#echo "<pre>";print_r( $op[$a] ); echo "</pre>";
			$add = $op[$a]->add( $op[$a]->cantidad );
			#return;
			#echo "<pre>";print_r( $op[$a] ); echo "</pre>";
			#return;
			/*$item = ItemData::getById($c["item_id"]);
			$item->unavaiable();*/

			unset($_SESSION["cart"]);
			setcookie("selled","selled");

			$a++;
		}
	}
}
if( $go ){

	print "<script>window.location='index.php?view=rents';</script>";
}
else{

	print "<script>alert('Rango de fecha invalido!');</script>";
	print "<script>window.location='index.php?view=rent';</script>";
}
?>