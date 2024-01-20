<?php

$ejemploDestinos1 = [
    [
        "nombre" => "America",
        "hijos" => [
            [
                "nombre" => "Argentina",
                "hijos" => [
                    [
                        "nombre" => "Buenos Aires",
                        "hijos" => [
                            [
                                "nombre" => "Pilar",
                                "hijos" => [["nombre" => "Manzanares"]]
                            ]
                        ]
                    ],
                    ["nombre" => "Córdoba"]
                ],
            ],
            [
                "nombre" => "Venezuela",
                "hijos" => [
                    ["nombre" => "Caracas"],
                    ["nombre" => "Vargas"]
                ]
            ]
        ]
    ]
];

$ejemploDestinos2 = [
    [
        "nombre" => "America",
        "hijos" => [
            [
                "nombre" => "Argentina",
                "hijos" => [
                    ["nombre" => "Buenos Aires"],
                    ["nombre" => "Córdoba"],
                    ["nombre" => "Santa Fe"]
                ],
            ],
            [
                "nombre" => "EEUU",
                "hijos" => [
                    ["nombre" => "Arizona"],
                    ["nombre" => "Florida"]
                ]
            ]
        ]
    ],
    [
        "nombre" => "Europa",
        "hijos" => [
            ["nombre" => "España"],
            ["nombre" => "Italia"],
        ]
    ]
];

//Solución del ejercicio
function buscarDestinos(array $destinos, string $substring): array {
    $resultados = [];

    foreach ($destinos as $destino) {
        // Verifico si el nombre del destino contiene la subcadena buscada
        if (stripos($destino["nombre"], $substring) !== false) { //utilizo stripos que no distingue entre mayusuclas y minusculas
            $resultados[] = $destino["nombre"];
        }

        // Verifico si hay hijos y realizar la búsqueda recursiva
        if (isset($destino["hijos"]) && is_array($destino["hijos"])) {
            $resultadosHijos = buscarDestinos($destino["hijos"], $substring);

            // Agrego los resultados de la búsqueda de los hijos al resultado general
            $resultados = array_merge($resultados, $resultadosHijos);
        }
    }

    return $resultados;
}

//ej
$coincidencias = buscarDestinos($ejemploDestinos1, "ar"); //["Argentina", "Pilar", "Manzanares", "Caracas", "Vargas"]
$coincidencias = buscarDestinos($ejemploDestinos2, "ar"); //["Argentina", "Arizona"]

//Solución del ejercicio agregando orden superior
function buscarDestinosSuperior(array $destinos, callable $criterio): array {
    $resultados = [];

    foreach ($destinos as $destino) {
        // Verificar si el destino cumple con el criterio de búsqueda
        if ($criterio($destino)) {
            $resultados[] = $destino["nombre"];
        }

        // Verificar si hay hijos y realizar la búsqueda recursiva
        if (isset($destino["hijos"]) && is_array($destino["hijos"])) {
            $resultadosHijos = buscarDestinosSuperior($destino["hijos"], $criterio);

            // Agregar los resultados de la búsqueda de los hijos al resultado general
            $resultados = array_merge($resultados, $resultadosHijos);
        }
    }

    return $resultados;
}

// Función para crear criterios de búsqueda
function crearCriterio(string $substring): callable {
    return function ($destino) use ($substring) {
        return stripos($destino["nombre"], $substring) !== false;
    };
}

//ej
$substringBusqueda = "ar";
$criterioBusqueda = crearCriterio($substringBusqueda);
$coincidencias = buscarDestinosSuperior($ejemploDestinos1, $criterioBusqueda); //["Argentina", "Pilar", "Manzanares", "Caracas", "Vargas"]