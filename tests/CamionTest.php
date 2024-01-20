<?php
use PHPUnit\Framework\TestCase;

class CamionTest extends TestCase{

    private $modelo1;
    private $camion1;
    private $modelo2;
    private $camion2;
    private $modelo3;
    private $camion3;
    private $hojaDeRuta;
    private $coordenada1;
    private $coordenada2;
    private $direccion1;
    private $direccion2;
    private $lugarDestino;
    private $lugarOrigen;
    private $paquete1;
    private $paquete2;
    private $viajeNormal;
    private $viajePrioritario;
    private $viajeDevolucion;
    private $viaje1;
    private $viaje2;
    private $viaje3;
    private $viaje4;
    private $hojaDeRuta1;
    private $hojaDeRuta2;
    private $hojaDeRuta3;
    private $hojaDeRuta4;

    public function setUp(): void{
        $this->coordenada1 = new Coordenada(40.7128, -74.0060); //coordenadas de la ciudad de Nueva York
        $this->coordenada2= new Coordenada(48.8566, 2.3522); //coordenadas de la ciudad de Paris

        $this->direccion1 = new Direccion('Central Park', 'Nueva York', 'EEUU');
        $this->direccion2 = new Direccion('Torre Eiffel', 'Paris', 'Francia');

        $this->lugarDestino = new Lugar($this->direccion1, $this->coordenada1);
        $this->lugarOrigen = new Lugar($this->direccion2, $this->coordenada2);

        $this->paquete1 = new Paquete(60, 50, 40, 30);
        $this->paquete2 = new Paquete(20, 30, 40, 50);

        $this->viajeNormal = new ViajeNormal('Viaje Normal');
        $this->viajePrioritario = new ViajePrioritario('Viaje Prioritario');
        $this->viajeDevolucion = new ViajeDevolucion('Viaje Devolucion');

        $this->viaje1 = new Viaje( $this->lugarOrigen, $this->lugarDestino, $this->viajeNormal, [$this->paquete1, $this->paquete2]);
        $this->viaje2 = new Viaje( $this->lugarOrigen, $this->lugarDestino, $this->viajePrioritario, [$this->paquete1, $this->paquete2]);
        $this->viaje3 = new Viaje( $this->lugarOrigen, $this->lugarDestino, $this->viajeDevolucion, [$this->paquete1]);
        $this->viaje4 = new Viaje( $this->lugarOrigen, $this->lugarDestino, $this->viajeDevolucion, [$this->paquete2]);

        $this->hojaDeRuta1 = new HojaDeRuta([$this->viaje1], []);
        $this->hojaDeRuta2 = new HojaDeRuta([$this->viaje2], []);
        $this->hojaDeRuta3 = new HojaDeRuta([$this->viaje3], []);
        $this->hojaDeRuta4 = new HojaDeRuta([$this->viaje4], [$this->hojaDeRuta3]);

        $this->modelo1 = new Modelo('Fiat',130000, 90);
        $this->camion1 = new Camion('456', $this->modelo1);

        $this->modelo2 = new Modelo('Ford',130000, 70);
        $this->camion2 = new Camion('456', $this->modelo2);

        $this->modelo3 = new Modelo('Ferrari',180000, 140);
        $this->camion3 = new Camion('456', $this->modelo3);
    }

    public function testGetPesoMaximo(){
        $this->assertEquals(90, $this->camion1->getModelo()->getPesoMaximo()); //Esta OK, el peso asignado al camion con el modelo1 es 90
    }

    public function testAsignarHojaACamionError(){
        $this->expectException(Exception::class);
        $this->camion2->asignarHojaDeRuta($this->hojaDeRuta1); //Arroja una Exception debido a que el peso maximo del camion es 70 y la hojaDeRuta1 asignada posee 2 paquetes, 
                                                              //uno con peso = 60 y otro con peso = 20 en total es 80, se excede
    }

    public function testAsignarHojaACamionOkey(){
        $this->camion1->asignarHojaDeRuta($this->hojaDeRuta1); 
        $this->assertEquals(80, $this->camion1->getHojaDeRuta()->calcularPesoTotal()); //No Arroja Exception debido a que el peso maximo del camion es 90 y la hoja de ruta asignada posee 2 paquetes, 
                                                                                      //uno con peso = 60 y otro con peso = 20 en total es 80, NO se excede

        // Verificar que el camión tiene la hoja de ruta asignada
        $this->assertSame($this->hojaDeRuta1, $this->camion1->getHojaDeRuta());
    }

    public function testCostoViajeNormal(){
        // Verificar que el costo de la hoja de ruta es el esperado
        $this->camion1->asignarHojaDeRuta($this->hojaDeRuta1); 
        $this->assertEquals(2 * (60 + 20) * 5836.96, $this->camion1->calcularCostoHojaDeRuta()); //Utilizando la formula del viajeNormal. Pongo las cuentas con los numeros TAL CUAL para que se entienda la formula
    }

    public function testCostoViajePrioritario(){
        // Verificar que el costo de la hoja de ruta es el esperado
        $this->camion1->asignarHojaDeRuta($this->hojaDeRuta2); 
        $this->assertEquals(10 * ((50 * 40 * 30) + (30 * 40 * 50)) * 5836.96, $this->camion1->calcularCostoHojaDeRuta()); //Utilizando la formula del viajePrioritario
    }

    public function testCostoViajeDevolucion(){
        // Verificar que el costo de la hoja de ruta es el esperado
        $this->camion3->asignarHojaDeRuta($this->hojaDeRuta3); 
        $this->assertEquals(1000, $this->camion3->calcularCostoHojaDeRuta()); //Utilizando la formula del viajeDevolucion que es siempre 1000
    }

    public function testCostoViajeDevolucionConHojaExtra(){
        // Verificar que el costo de la hoja de ruta es el esperado
        $this->camion3->asignarHojaDeRuta($this->hojaDeRuta4); 
        $this->assertEquals(2000, $this->camion3->calcularCostoHojaDeRuta()); //Utilizando la formula del viajeDevolucion, en este caso la hojaDeRuta4 tiene asignado el viaje4
                                                                              //pero tambien la hojaDeRuta3 con el viaje3, con lo cual el viajeDevolucion es 2000 (1000 + 1000)
    }

}

?>