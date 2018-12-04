<?php
require 'vendor/autoload.php';
$Foo=new Acme\Foo();
class code extends Acme\Foo{
	public function working()
	{
		echo "code<br/>";
	}
}

class techer extends Acme\Foo{
	public function working()
	{
		echo "techer<br/>";
	}
}

$techer=new techer();
$code=new code();
$code->working();
$techer->working();

?>