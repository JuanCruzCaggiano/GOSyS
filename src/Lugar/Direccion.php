<?php

/* The Direccion class is a PHP class. */
class Direccion {
    /* The lines `private string ;`, `private string ;`, and `private string ;` are
    declaring private properties of the `Direccion` class. These properties are of type string and are
    used to store the values of the street, city, and country for a particular address. The `private`
    keyword indicates that these properties can only be accessed within the class itself and not from
    outside the class. */
    private string $calle;
    private string $ciudad;
    private string $pais;

    /**
     * The function is a constructor that initializes the calle, ciudad, and pais properties of an
     * object.
     * 
     * @param string calle The "calle" parameter represents the street address of a location. It is
     * expected to be a string value.
     * @param string ciudad The parameter "ciudad" is a string that represents the city where the
     * address is located.
     * @param string pais The parameter "pais" represents the country where the address is located.
     */
    public function __construct(string $calle, string $ciudad, string $pais) {
        $this->calle = $calle;
        $this->ciudad = $ciudad;
        $this->pais = $pais;
    }

    public function getDireccionCompleta(): string{
        return $this->calle.' '.$this->ciudad.' '.$this->pais;
    }
}