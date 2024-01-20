<?php

/* The HojaDeRuta class is a PHP class. */
class HojaDeRuta {
    /* The code `private array  = []; private array  =[];` is declaring two private
    properties in the class `HojaDeRuta`. */
    private array $viajes = [];
    private array $hojasDeRuta =[];

    /**
     * The function is a constructor that initializes the "viajes" and "hojasDeRuta" properties of an
     * object.
     * 
     * @param array viajes An array containing information about different trips or journeys.
     * @param array hojasDeRuta An array containing the hojas de ruta (route sheets) for the viajes
     * (trips).
     */
    public function __construct(array $viajes, array $hojasDeRuta) {
        $this->viajes = $viajes;
        $this->hojasDeRuta = $hojasDeRuta;
    }

    /**
     * The function calculates the total cost by summing the costs of all the trips and route sheets.
     * 
     * @return float the total cost as a float value.
     */
    public function calcularCosto(): float {
        $costoTotal = 0;

        $costoTotal += array_sum(array_map(fn (Viaje $viaje) => $viaje->calcularCosto(), $this->viajes));

        $costoTotal += array_sum(array_map(fn (HojaDeRuta $hojaDeRuta) => $hojaDeRuta->calcularCosto(), $this->hojasDeRuta));

        return $costoTotal;
    }

    /**
     * The function "calcularVolumenTotal" calculates the total volume by summing the volume of all
     * "Viaje" and "HojaDeRuta" objects in the given arrays.
     * 
     * @return float the total volume calculated from the sum of the volumes of all the trips and route
     * sheets.
     */
    public function calcularVolumenTotal(): float {
        $volumenTotal = 0;

        $volumenTotal += array_sum(array_map(fn (Viaje $viaje) => $viaje->calcularVolumen(), $this->viajes));

        $volumenTotal += array_sum(array_map(fn (HojaDeRuta $hojaDeRuta) => $hojaDeRuta->calcularVolumenTotal(), $this->hojasDeRuta));

        return $volumenTotal;
    }

    /**
     * The function "calcularPesoTotal" calculates the total weight by summing the weights of all
     * "Viaje" and "HojaDeRuta" objects in the given arrays.
     * 
     * @return float the total weight calculated from the sum of the weights of all the "Viaje" objects
     * in the "viajes" array and all the "HojaDeRuta" objects in the "hojasDeRuta" array.
     */
    public function calcularPesoTotal(): float {
        $pesoTotal = 0;

        $pesoTotal += array_sum(array_map(fn (Viaje $viaje) => $viaje->calcularPeso(), $this->viajes));

        $pesoTotal += array_sum(array_map(fn (HojaDeRuta $hojaDeRuta) => $hojaDeRuta->calcularPesoTotal(), $this->hojasDeRuta));

        return $pesoTotal;
    }
}