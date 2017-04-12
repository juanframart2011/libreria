<?php

if( $_SESSION["user_id"] != "" ){

	$operation = OperationData::getById( $_GET["id"] );
	$book = BookData::getById( $operation->book_id );
	/*
	$cantidad = $book->cantidad;

	$book->title = $book->title;
	$book->subtitle = $book->subtitle;
	$book->description = $book->description;
	$book->cantidad = $cantidad;
	$book->isbn = $book->isbn;
	$book->n_pag = $book->n_pag;
	$book->year = $book->year;
	$book->category_id = $book->category_id!="" ? $book->category_id : "NULL";
	$book->editorial_id = $book->editorial_id!="" ? $book->editorial_id : "NULL";
	$book->author_id = $book->author_id!="" ? $book->author_id : "NULL";
	$book->update();*/

	/*$item = ItemData::getById($operation->item_id);
	$item->avaiable();*/
	$operation->finalize();

	Core::redir("./?view=rents");
}
?>