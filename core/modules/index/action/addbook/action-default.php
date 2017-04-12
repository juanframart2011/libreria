<?php

if( !empty( $_POST ) ){

	$r = new BookData();
	$r->title = $_POST["title"];
	$r->subtitle = 0;
	$r->description = $_POST["description"];
	$r->cantidad = $_POST["cantidad"];
	$r->precio_costo = $_POST["cost_price"];
	$r->isbn = $_POST["isbn"];
	$r->n_pag = ( empty( $_POST["n_pag"] ) ) ? 0 : $_POST["n_pag"];
	$r->year = ( empty( $_POST["year"] ) ) ? 0 : $_POST["year"];
	$r->category_id = $_POST["category_id"]!="" ? $_POST["category_id"] : "NULL";
	$r->editorial_id = @$_POST["editorial_id"]!="" ? @$_POST["editorial_id"] : "NULL";
	$r->author_id = @$_POST["author_id"]!="" ? @$_POST["author_id"] : "NULL";
	$r->add();
}
//Core::alert("Agregado exitosamente!");
Core::redir("./index.php?view=books");
?>