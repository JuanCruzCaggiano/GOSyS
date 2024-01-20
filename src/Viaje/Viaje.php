<?php

/* The Viaje class is a PHP class. */
class Viaje {
    /* The code snippet `private array  = [];
    private Lugar ;
    private Lugar ;
    private TipoViaje ;` is declaring private properties for the `Viaje` class. */
    private array $paquetes = [];
    private Lugar $origen;
    private Lugar $destino;
    private TipoViaje $tipoViaje;

    /**
     * The function constructs an object with the given origin, destination, type of trip, and array of
     * packages.
     * 
     * @param Lugar origen The "origen" parameter is an instance of the "Lugar" class, which represents
     * the starting location of the trip.
     * @param Lugar destino The "destino" parameter is an instance of the "Lugar" class, which
     * represents the destination of the trip.
     * @param TipoViaje viaje The parameter `` is of type `TipoViaje`. It represents the type of
     * trip.
     * @param array paquetes The "paquetes" parameter is an array that contains the packages for the
     * trip.
     */
    public function __construct(Lugar $origen, Lugar $destino, TipoViaje $viaje, array $paquetes) {
        $this->origen = $origen;
        $this->destino = $destino;
        $this->tipoViaje = $viaje;
        $this->paquetes = $paquetes;
    }

    /**
     * The function calculates the distance between two points on the Earth's surface using their
     * latitude and longitude coordinates.
     * 
     * @param float latitude1 The latitude of the first point.
     * @param float longitude1 The longitude of the first point.
     * @param float latitude2 The latitude of the second point.
     * @param float longitude2 The parameter "longitude2" represents the longitude of the second point.
     * 
     * @return float the distance between two points in kilometers, rounded to two decimal places.
     */
    public function getDistanceBetweenPoints(float $latitude1, float $longitude1, float $latitude2, float $longitude2): float {
        $theta = $longitude1 - $longitude2;
        $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta)));
        $distance = acos($distance);
        $distance = rad2deg($distance);
        $distance = $distance * 60 * 1.1515;
        $distance = $distance * 1.609344;
        return round($distance, 2);
    }

    /**
     * The function "calcularCosto" calculates the cost of a trip based on the type of trip.
     * 
     * @return float the calculated cost of the trip.
     */
    public function calcularCosto(): float {
        $costo = $this->getTipoViaje()->calcularCosto($this);

        return $costo;
    }

    /**
     * The function "calcularPesoTotal" calculates the total weight of an array of "Paquete" objects.
     * 
     * @return float the total weight of all the packages in the array.
     */
    public function calcularPeso(): float {
        $pesoTotal = array_sum(array_map(fn (Paquete $paquete) => $paquete->getPeso(), $this->paquetes));

        return $pesoTotal;
    }

    /**
     * The function "calcularVolumenTotal" calculates the total volume of all the packages in an array.
     * 
     * @return float the total volume of all the packages in the array.
     */
    public function calcularVolumen(): float {
        $volumenTotal = array_sum(array_map(fn (Paquete $paquete) => $paquete->getVolumen(), $this->paquetes));

        return $volumenTotal;
    }

    /**
     * The function "getTipoViaje" returns the value of the property "tipoViaje".
     * 
     * @return TipoViaje an object of type "TipoViaje".
     */
    public function getTipoViaje(): TipoViaje{
        return $this->tipoViaje;
    }

    /**
     * The function "getOrigen" returns the value of the "origen" property.
     * 
     * @return Lugar an object of type "Lugar".
     */
    public function getOrigen(): Lugar{
        return $this->origen;
    }

    /**
     * The function "getDestino" returns the destination location.
     * 
     * @return Lugar an object of type "Lugar".
     */
    public function getDetino(): Lugar{
        return $this->destino;
    }

    /**
     * The function "getPaquetes" returns an array of paquetes.
     * 
     * @return array An array of paquetes.
     */
    public function getPaquetes(): array{
        return $this->paquetes;
    }
}