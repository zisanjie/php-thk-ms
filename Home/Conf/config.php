<?php
	$arr = include './config.php';		//引入公共配置项

	$brr = array(				//私有配置

		);

	return array_merge($arr, $brr);
?>