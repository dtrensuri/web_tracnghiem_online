<?php

session_start();

class Controller{

	function loadView($view){
		include_once ('view/'.$view.'.php');
	}
}

?>