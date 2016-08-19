<?php
use PHPUnit\Framework\TestCase;

function conversor($numeroRomano) {
    $numeroDeOcorrenciasDeI = substr_count($numeroRomano, 'I'); 
    $numeroDeOcorrenciasDeV = substr_count($numeroRomano, 'V');
	return $numeroDeOcorrenciasDeI + (5 * $numeroDeOcorrenciasDeV);
}

class ConversorTest extends TestCase
{
    public function testConverterIRetorna1()
    {
        $this->assertEquals(1, conversor('I'));
    }
	public function testConverterIIRetorna2()
	{
		$this->assertEquals(2, conversor('II'));
	}
	public function testConverterIIIRetorna3()
	{
		$this->assertEquals(3, conversor('III'));
	}
	public function testConverterVRetorna5()
	{
		$this->assertEquals(5, conversor('V'));
	}
}
