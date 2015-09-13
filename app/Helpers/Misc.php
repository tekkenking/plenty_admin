<?php

/*
 * --------------------------------------------------------------------
 * Used for outputing 
 * --------------------------------------------------------------------
 *This function displays structured information about one or more expressions that includes its type and value. Arrays and objects are explored recursively with values indented to show structure
 */
if( ! function_exists('tt')){
	function tt($array, $noexit=FALSE, $name='')
	{
		echo "<pre class='alert alert-info'>  {$name} ";
		var_dump($array);
		echo "</pre>";
			if($noexit === FALSE){ exit;}
	}
}

// Helpers for Laravel 4 Language translate
if( ! function_exists ('itrans') ){
	function itrans($filekey, Array $rep=null, $case="ucfirst"){
		$case = ($case == '') ? 'ucfirst' : $case;
		
		return $case( ($rep != null) ? trans($filekey, $rep) :  trans($filekey));
	}
}