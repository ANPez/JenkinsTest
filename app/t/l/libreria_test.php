<?php

require_once __DIR__.'/../../../sys/core/test.php';

class Libreria_test extends Test_case
{
	function test_true()
	{
		$this->assertTrue($this->ul->libreria->prueba(), 'No devuelve TRUE.');
	}

	function test_false()
	{
		$this->getMock('Libreria')->expects($this->any())
			->method('prueba')
			->will($this->returnValue(FALSE));
		$this->assertTrue(!$this->ul->libreria->prueba(), 'No devuelve FALSE.');
	}
}
