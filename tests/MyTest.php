<?php
use PHPUnit\Framework\TestCase;

function conversor($numeroRomano) {
    $ultimaLetra = null;
    $total = 0;

    $arrayNumeroRomanos = str_split($numeroRomano);

    foreach ($arrayNumeroRomanos as $letraAtual) {
      if ($ultimaLetra == null) {
        $total += valorDoCaracterRomano($letraAtual);
      }
      else {
        if(valorDoCaracterRomano($ultimaLetra) < valorDoCaracterRomano($letraAtual)){
          $total += valorDoCaracterRomano($letraAtual) - valorDoCaracterRomano($ultimaLetra) - 1;
        }
        else {
          $total += valorDoCaracterRomano($letraAtual);
        }
      }
      $ultimaLetra = $letraAtual;
    }
    return $total;
}

function valorDoCaracterRomano($caracterRomano) {
  return array(
    "I" => 1,
    "V" => 5,
    "X" => 10,
  )[$caracterRomano];
}


class ValorDoCaracterRomanoTest extends TestCase {
    public function testRecebeIRetorna1(){
      $this->assertEquals(1, valorDoCaracterRomano('I'));
    }
    public function testRecebeVRetorna5(){
      $this->assertEquals(5, valorDoCaracterRomano('V'));
    }
    public function testRecebeXRetorna10(){
      $this->assertEquals(10, valorDoCaracterRomano('X'));
    }
}


class ConversorTest extends TestCase {
  public function testConverterIRetorna1() {
      $this->assertEquals(1, conversor('I'));
  }

	public function testConverterIIRetorna2() {
		$this->assertEquals(2, conversor('II'));
	}

	public function testConverterIIIRetorna3() {
		$this->assertEquals(3, conversor('III'));
	}

  public function testConverterIVRetorna4(){
    $this->assertEquals(4, conversor('IV'));
  }

	public function testConverterVRetorna5() {
		$this->assertEquals(5, conversor('V'));
	}

  public function testConverterIXRetorna9() {
		$this->assertEquals(9, conversor('IX'));
	}

}
