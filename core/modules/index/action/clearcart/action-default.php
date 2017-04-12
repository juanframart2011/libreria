<?php
/**
* @author evilnapsis
* @brief Eliminar autores 
**/
unset( $_SESSION["cart"] );
Core::redir("./index.php?view=rent");
?>