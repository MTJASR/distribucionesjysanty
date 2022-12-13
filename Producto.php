<?php
// Chiphysi programación suscribete 
// V 0.1 original 
// Autor: Chiphysi  Autor: Jhonatan Cardona  
// Derechos de autor(Suscribete)  

class Producto
{
	function get(){
		$sql = "SELECT * FROM tb_productos";
		global $cnx;
		return $cnx->query($sql);
	}
	
	function getById($id){
		$sql = "SELECT * FROM tb_productos WHERE id=$id";
		global $cnx;
		return $cnx->query($sql);
	}
}