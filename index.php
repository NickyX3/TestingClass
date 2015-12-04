<?php
	error_reporting(E_ERROR | E_WARNING);
	setlocale(LC_TIME,'ru_RU.UTF-8');
	// autoloader :-)
	include_once 'cloader.php';
	
	$results = array();
	$am 	= new TestClass();
	// for total time
	$c		= new Bench();
	// 10 iterations for averages
	for($a=1;$a<=10;$a++) {
		// for one run bench
		$b	= new Bench();
		for($i=1;$i<=100000;$i++) {
			$nav 	= $am->generateMenu();
		}
		$results[] = $b->end(false);
	}
	
	echo '<pre>'.print_r($results,1).'</pre>';
	$total = $c->end(false);
	
	echo 'Total: '.$total.', Average: '.($total/count($results));
?>
