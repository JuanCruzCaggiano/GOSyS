<?php

/* The Paquete class is a PHP class. */
class Paquete {
    /* The lines `private float ; private float ; private float ; private float
    ;` are declaring private properties of the `Paquete` class. These properties are of type
    `float` and are used to store the weight, height, width, and length of a package. The `private`
    visibility modifier means that these properties can only be accessed within the class itself and
    not from outside the class. */
    private float $peso;
    private float $alto;
    private float $ancho;
    private float $largo;

    /**
     * The function is a constructor that initializes the properties of an object with the given
     * parameters.
     * 
     * @param float peso The "peso" parameter represents the weight of an object. It is of type float,
     * which means it can store decimal values.
     * @param float alto The "alto" parameter represents the height of an object.
     * @param float ancho The "ancho" parameter represents the width of an object.
     * @param float largo The "largo" parameter represents the length of an object.
     */
    public function __construct(float $peso, float $alto, float $ancho, float $largo) {
        $this->peso = $peso;
        $this->alto = $alto;
        $this->ancho = $ancho;
        $this->largo = $largo;
    }

    /**
     * The function getPeso() returns the value of the "peso" property as a float.
     * 
     * @return float the value of the variable ->peso, which is of type float.
     */
    public function getPeso(): float{
        return $this->peso;
    }

    /**
     * The function calculates the volume of an object based on its height, width, and length.
     * 
     * @return float the calculated volume, which is the product of the height, width, and length.
     */
    public function getVolumen(): float {
        return $this->alto * $this->ancho * $this->largo;
    }
}