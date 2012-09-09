<?php

require_once(__DIR__.'/../sys/core/cli.php');
class LoadTest extends PHPUnit_Framework_TestCase
{
	public function testDemo()
	{
		$core = Vevui::get();
		$this->assertInstanceOf('Vevui', $core);
	}
}
