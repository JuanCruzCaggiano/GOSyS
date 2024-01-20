<?php

/* The Camion class is a representation of a truck. */
class Camion{
    /* These lines of code are declaring private properties for the `Camion` class. */
    private Modelo $modelo;
    private string $patente;
    private HojaDeRuta $hojaDeRuta;
    
    /**
     * The function is a constructor that takes a string parameter for "patente" and an object
     * parameter for "modelo".
     * 
     * @param string patente The parameter "patente" is a string that represents the license plate of a
     * vehicle.
     * @param Modelo modelo The "modelo" parameter is of type "Modelo". It is an object that represents
     * the model of a car.
     */
    public function __construct(string $patente, Modelo $modelo) {
        $this->patente = $patente;
        $this->modelo = $modelo;
    }

    /**
    * The function "asignarHojaDeRuta" assigns a given "HojaDeRuta" object to a truck, after verifying if
    * the total volume and weight of the route exceed the truck's capacity.
    * 
    * @param HojaDeRuta hojaDeRuta An instance of the HojaDeRuta class, which represents a route sheet or
    * itinerary.
    */
    public function asignarHojaDeRuta(HojaDeRuta $hojaDeRuta): void {
        // Verificar si la hoja de ruta supera las capacidades del camión
        $volumenTotal = $hojaDeRuta->calcularVolumenTotal();
        $pesoTotal = $hojaDeRuta->calcularPesoTotal();

        if ($volumenTotal > $this->getModelo()->getVolumenSoportado() || $pesoTotal > $this->getModelo()->getPesoMaximo()) {
            throw new Exception("La hoja de ruta supera las capacidades del camión.");
        }

        $this->hojaDeRuta = $hojaDeRuta;
    }

    /**
     * The function calculates the cost of a route sheet for a truck.
     * 
     * @return float a float value, which is the calculated cost of the route.
     */
    public function calcularCostoHojaDeRuta(): float {
        if ($this->getHojaDeRuta() instanceof HojaDeRuta) {
            return $this->hojaDeRuta->calcularCosto();
        } else {
            throw new Exception("El camión no tiene asignada una hoja de ruta.");
        }
    }

    /**
     * The function returns an instance of the HojaDeRuta class.
     * 
     * @return HojaDeRuta an object of type HojaDeRuta.
     */
    public function getHojaDeRuta(): HojaDeRuta{
        return $this->hojaDeRuta;
    }

    public function getModelo(): Modelo{
        return $this->modelo;
    }
}