<?php

/* The Modelo class is a PHP class. */
class Modelo{
    /* The code is declaring private properties for the class `Modelo`. */
    private string $nombre;
    private float $volumen; // m3
    private float $pesoMaximo; // kg

    /**
     * The function is a constructor that initializes the properties of an object with the given
     * parameters.
     * 
     * @param string nombre The "nombre" parameter is a string that represents the name of the object
     * being constructed.
     * @param float volumen The "volumen" parameter represents the volume of an object. It is of type
     * float, which means it can store decimal values.
     * @param float pesoMaximo The parameter "pesoMaximo" represents the maximum weight that the object
     * can hold.
     */
    public function __construct(string $nombre, float $volumen, float $pesoMaximo) {
        $this->volumen = $volumen;
        $this->pesoMaximo = $pesoMaximo;
        $this->nombre = $nombre;
    }

    /**
     * The function "getVolumenSoportado" returns the value of the "volumen" property as a float.
     * 
     * @return float the value of the variable ->volumen, which is of type float.
     */
    public function getVolumenSoportado(): float{
        return $this->volumen;
    }

    /**
     * The function getPesoMaximo() returns the maximum weight as a float.
     * 
     * @return float the value of the variable ->pesoMaximo, which is of type float.
     */
    public function getPesoMaximo(): float {
        return $this->pesoMaximo;
    }
}