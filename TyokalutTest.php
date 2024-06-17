<?php
    use PHPUnit\Framework\TestCase;

    require_once __DIR__.'/../include/tyokalut.php';

    class TyokalutTest extends TestCase
    {
        public function testAikaeroKuukausissa() {
            $mista = strtotime("2023-01-01");
            $mihin = strtotime("2023-12-01");
            $this->assertEquals(11, aikaero_kuukausissa($mista,$mihin));

            $mista = strtotime("2023-01-01");
            $mihin = strtotime("2024-01-01");
            $this->assertEquals(12, aikaero_kuukausissa($mista, $mihin));

            $mista = strtotime("2024-01-01");
            $mihin = strtotime("2023-01-01");
            $this->assertEquals(-12, aikaero_kuukausissa($mista, $mihin));
        }

        public function testViikonpaiva()
        {
            $this->assertEquals('MA', viikonpaiva(1));
            $this->assertEquals('TI', viikonpaiva(2));
            $this->assertEquals('KE', viikonpaiva(3));
            $this->assertEquals('TO', viikonpaiva(4));
            $this->assertEquals('PE', viikonpaiva(5));
            $this->assertEquals('LA', viikonpaiva(6));
            $this->assertEquals('SU', viikonpaiva(7));
            $this->assertEquals('', viikonpaiva(8));
        }

        public function testVuodenViikot()
        {
            $vuosi = 2023;
            $viikot = vuoden_viikot($vuosi);
            $this->assertIsArray($viikot);
            $this->assertArrayHasKey('202301', $viikot); // Vuoden ensimmäinen viikko
            $this->assertArrayHasKey('202352', $viikot); // Vuoden viimeinen viikko

            $vuosi = 2024;
            $viikot = vuoden_viikot($vuosi);
            $this->assertIsArray($viikot);
            $this->assertArrayHasKey('202401', $viikot);
            $this->assertArrayHasKey('202452', $viikot);
        }

    }

?>