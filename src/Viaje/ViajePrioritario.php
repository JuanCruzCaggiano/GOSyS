<?php

/* The class "ViajePrioritario" is a subclass of "TipoViaje". */
class ViajePrioritario extends TipoViaje {

    public function calcularCosto(Viaje $viaje): float {
        $distancia = $viaje->getDistanceBetweenPoints($viaje->getOrigen()->getCoordenada()->getLatitud(), $viaje->getOrigen()->getCoordenada()->getLongitud(), $viaje->getDetino()->getCoordenada()->getLatitud(), $viaje->getDetino()->getCoordenada()->getLongitud());
        $costoPorPeso = 4 * $viaje->calcularPeso() * $distancia;
        $costoPorVolumen = 10 * $viaje->calcularVolumen() * $distancia;
        $this->costo = max($costoPorPeso, $costoPorVolumen);
        return $this->costo;
    }
}