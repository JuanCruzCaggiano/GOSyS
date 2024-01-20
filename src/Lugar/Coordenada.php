<?php

/* The Coordenada class is a PHP class. */
class Coordenada {
    /* In the given code, `private float ;` and `private float ;` are declaring private
    properties of the class `Coordenada`. */
    private float $latitud;
    private float $longitud;

    public function __construct(float $latitud, float $longitud) {
        $this->latitud = $latitud;
        $this->longitud = $longitud;
    }

    /**
     * The function "getLatitud" returns the value of the "latitud" property as a float.
     * 
     * @return float the value of the variable ->latitud, which is of type float.
     */
    public function getLatitud(): float{
        return $this->latitud;
    }

    /**
     * The function "getLongitud" returns the value of the "longitud" property as a float.
     * 
     * @return float a float value, which is the value of the variable ->longitud.
     */
    public function getLongitud(): float{
        return $this->longitud;
    }
}