<?php
if(!function_exists('listLevel')){
	function listLevel($a){
	switch($a){
	case '1' :
		return "Adminstrator";
		break;
	case '2' :
		return "Petugas";
		break;
	default :
		return "None";
		break;
	}
	}
}