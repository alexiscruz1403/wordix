<?php
include_once("wordix.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/*Montesino Lautaro FAI-3318 TUDW lautaro.montesino@est.fi.uncoma.edu.ar*/
/* ****COMPLETAR***** */


/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS"
        /* Agregar 5 palabras más */
    ];

    return ($coleccionPalabras);
}

/* ****COMPLETAR***** */

/**
*
*/
function cargarPartidas(){
    //cargo partidas manualmente o cada vez que se jurga una partida este mismo es guardado como ejemplo?
}

function seleccionarOpcion(){
    echo "Seleccione una opcion: \n";
    echo "1. Jugar Wordix con una palabra elegida\n";
    echo "2. Jugar Wordix con una palabra aleatoria\n";
    echo "3. Mostrar una partida\n";
    echo "4. Mostrar la primer partida ganadora\n";
    echo "5. Mostrar resumern de jugador\n";
    echo "6. Mostrar listado de partidas ordenadas por jugador y por palabra\n";
    echo "7. Agregar una palabra de 5 letras a wordix\n";
    echo "8. Salir\n";
    do{
        echo "Opcion: ";
        $opcion=trim(fgets(STDIN));
    }while($opcion<1 || $opcion>8);
    return $opcion;
}

function mostrarPartida($coleccionPartidas,$numeroPartida){
    echo "Partida WORDIX 13\n";
    echo "Palabra: ".$coleccionPartidas[$numeroPartida-1]["palabra-Wordix"];
    echo "Jugador: ".$coleccionPartidas[$numeroPartida-1]["jugador"];
    echo "Puntaje: "$coleccionPartidas[$numeroPartida-1]["puntaje"];
    if($coleccionPartidas[$numeroPartida-1]["puntaje"]==0){
        echo "Intento: No adivino la palabra";
    }
    else{
        echo "Intento: Adivino la palabra en ".$coleccionPartidas[$numeroPartida-1]["intentos"];
    }
}

function agregarPalabra($coleccionPalabras,$palabraNueva){
    array_push($coleccionPalabras,$palabraNueva);
}

function retornaPrimerVictoria($coleccionPartidas,$nombreJugador){
    $cantidadPartidas=count($coleccionPartidas);
    $i=0;
    $encontrado=false;
    $indice=-1;
    do{
        if($coleccionPartidas[0]["puntaje"]!=0){
            $encontrado=true;
            $indice=$i;
        }
        else{
            $i++;
        }
    }while($i<$cantidadPartidas && !$encontrado);
    return $indice;
}

function nombreValido($nombre){
    $esLetra=ctype_alpha($nombre[0]);
    return $esLetra;
}

function solicitarJugador(){
    echo "Ingrese su nombre: ";
    $nombre=trim(fgets(STDIN));
    while(!nombreValido($nombre)){
        echo "Su nombre debe empezar con una letra\n";
        echo "Ingrese su nombre: ";
        $nombre=trim(fgets(STDIN));
    }
    $nombre=strtolower($nombre);
    return $nombre;
}
/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:
$coleccionPalabras=cargarColeccionPalabras();
$coleccionPartidas=[];
//Proceso:

//$partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);

do{
    $opcion = seleccionarOpciones();
    switch ($op) {
        case 1: 
            $partida = jugarWordix("MELON", strtolower("MaJo"));

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2
            $partida = jugarWordix("MELON", strtolower("MaJo"));
            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        case 4:;break;
        case 5:;break;
        case 6:;break;
        case 7:
            $palabraNueva=leerPalabra5Letras();
            $coleccionPalabras=agregarPalabra($coleccionPalabras,$palabraNueva);
            break;
    }
} while ($opcion != 8);

