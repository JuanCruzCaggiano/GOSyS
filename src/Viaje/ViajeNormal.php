<?php

/* The class ViajeNormal is a subclass of the class TipoViaje. */
class ViajeNormal extends TipoViaje {

    /**
     * The function calculates the cost of a trip based on the distance and weight of the packages.
     * 
     * @param Viaje viaje The parameter "viaje" is an instance of the "Viaje" class. It represents a
     * trip or journey and contains information such as the origin, destination, and packages
     * associated with the trip.
     * 
     * @return float the calculated cost of the trip as a float value.
     */
    public function calcularCosto(Viaje $viaje): float {
        $distancia = $viaje->getDistanceBetweenPoints($viaje->getOrigen()->getCoordenada()->getLatitud(), $viaje->getOrigen()->getCoordenada()->getLongitud(), $viaje->getDetino()->getCoordenada()->getLatitud(), $viaje->getDetino()->getCoordenada()->getLongitud());
        $this->costo = 2 * $viaje->calcularPeso() * $distancia;
        return $this->costo;
    }
}