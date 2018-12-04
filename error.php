<?php
set_error_handler("customerror");

function customerror($errno,$errstr,$errfile,$errline)
{
	echo "errno:{$errno};<br/>errstr:{$errstr}<br/>errfile:{$errfile}<br/>errline:{$errline}";
}

try
{
	$a=5/0;
}catch(Exception $e){

	$e->getMessage();
}


?>