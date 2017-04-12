<?php

if( count( $_POST ) > 0 ){

	$discount = new OperationData();
	$discount->discount = $_POST["discount_n"];
	$discount->Discount_add( $_POST["cliente"] );

	print "<script>window.location='index.php?view=clienthistory&id=".$_POST["cliente"]."';</script>";
}


?>