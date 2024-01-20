<?php

/* The TipoViaje class is a PHP class. */
class TipoViaje{
    /* The lines `public string ;` and `public float ;` are declaring two public properties of
    the `TipoViaje` class. */
    public string $nombre;
    public float $costo;

    /**
     * The function is a constructor that takes a string parameter and assigns it to the "nombre"
     * property of the object.
     * 
     * @param string nombre The parameter "nombre" is a string that represents the name of an object.
     */
    public function __construct(string $nombre) {
        $this->nombre = $nombre;
    }

    /**
     * The function "calcularCosto" returns the cost of a given "Viaje" object.
     * 
     * @param Viaje viaje The parameter "viaje" is of type "Viaje", which is likely a class
     * representing a trip or journey.
     * 
     * @return float the cost of the trip as a float value.
     */
    public function calcularCosto(Viaje $viaje): float {
        return $this->costo;
    }
}