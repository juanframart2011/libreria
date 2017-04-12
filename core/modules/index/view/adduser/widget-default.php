<?php

if( count( $_POST ) > 0 ){

	$user = new UserData();

	$user->name = $_POST["name"];
	$user->username = $_POST["username"];
	$user->is_admin = $_POST["is_admin"];
	$user->password = sha1( md5( $_POST["password"] ) );
	$user_id = $user->add();

	if( $user->is_admin == 2 ){

		$client = new ClientData();
		$client->name = $_POST["name"];
		$client->user = $user_id[0]->id;
		$client->add();
	}
	
	print "<script>window.location='index.php?view=users';</script>";
}
?>