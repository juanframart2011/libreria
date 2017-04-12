<?php
if( $_SESSION["user_id"] != "" ){

	$cliente = $_POST["vendedor"];
	$inventory = $_POST["invetory_initial"];

	$updateInventario = new ClientData();
	
	$updateInventario->updateInventory( $inventory, $cliente );
	Core::redir("./?view=clienthistory&id=" . $cliente);
}
?>