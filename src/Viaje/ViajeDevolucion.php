<?php

/* The class ViajeDevolucion is a subclass of the class TipoViaje. */
class ViajeDevolucion extends TipoViaje {
    /* The line `public float  = 1000;` is declaring a public property named `` of type
    `float` with an initial value of `1000`. This property represents the cost of the
    `ViajeDevolucion` object. */
    public float $costo = 1000; // Tarifa plana para devoluciones

    /**
     * The function "calcularCosto" returns a fixed cost for a given trip.
     * 
     * @param Viaje viaje The parameter "viaje" is an object of the class "Viaje".
     * 
     * @return float the cost of the trip.
     */
    public function calcularCosto(Viaje $viaje): float {
        return $this->costo; 
    }
}