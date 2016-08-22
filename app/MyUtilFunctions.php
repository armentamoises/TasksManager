<?php

namespace App;


use Input;

class MyUtilFunctions {


	public static function getParameter($alias, $arr, $default=''){
	
		return isset($arr[$alias])?$arr[$alias]:$default;
	
	}
}
