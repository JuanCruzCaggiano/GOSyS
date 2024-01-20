<?php

/* The Lugar class is a PHP class. */
class Lugar {
    /* In the code snippet provided, `private Direccion ;` and `private Coordenada
    ;` are declaring two private properties of the `Lugar` class. */
    private Direccion $direccion;
    private Coordenada $coordenada;

    /**
     * The function constructs an object with a Direccion and Coordenada parameter.
     * 
     * @param Direccion direccion The "direccion" parameter is an instance of the "Direccion" class. It
     * represents the address or location of an object.
     * @param Coordenada coordenada The "coordenada" parameter is an instance of the "Coordenada"
     * class. It is used to represent a coordinate, typically in a two-dimensional space.
     */
    public function __construct(Direccion $direccion, Coordenada $coordenada) {
        $this->direccion = $direccion;
        $this->coordenada = $coordenada;
    }

    /**
     * The function "getCoordenada" returns the value of the "coordenada" property.
     * 
     * @return Coordenada an object of type Coordenada.
     */
    public function getCoordenada(): Coordenada{
        return $this->coordenada;
    }
}