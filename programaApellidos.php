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

/** funcion que devuelve la coleccion de partidas jugadas
* @return array
*/
function cargarPartidas($colecPartidas){ 
    $colecPartidas[0]=["palabraWordix"=>"QUESO","jugador"=>"majo","intentos"=>0,"puntaje"=>0];
    $colecPartidas[1]=["palabraWordix"=>"CASAS","jugador"=>"rudolf","intentos"=>3,"puntaje"=>14];
    $colecPartidas[2]=["palabraWordix"=>"QUESO","jugador"=>"pink2000","intentos"=>6,"puntaje"=>10];
    $colecPartidas[3]=["palabraWordix"=>"MELON","jugador"=>"pablo","intentos"=>2,"puntaje"=>4];
    $colecPartidas[4]=["palabraWordix"=>"VERDE","jugador"=>"luis","intentos"=>1,"puntaje"=>3];
    $colecPartidas[5]=["palabraWordix"=>"GATOS","jugador"=>"manuel","intentos"=>5,"puntaje"=>12];
    $colecPartidas[6]=["palabraWordix"=>"RASGO","jugador"=>"lauti","intentos"=>2,"puntaje"=>2];
    $colecPartidas[7]=["palabraWordix"=>"YUYOS","jugador"=>"alexis","intentos"=>5,"puntaje"=>20];
    $colecPartidas[8]=["palabraWordix"=>"HUEVOS","jugador"=>"matias","intentos"=>3,"puntaje"=>17];
    $colecPartidas[9]=["palabraWordix"=>"FUEGO","jugador"=>"martina","intentos"=>6,"puntaje"=>10];
    return $colecPartidas;
}

/** funcion que muestra un menu de opciones y el usuario debe elegir una
 * @return int
 */
function seleccionarOpcion(){
    // int $opcion
    echo "Seleccione una opcion: \n";
    echo "1. Jugar Wordix con una palabra elegida\n";
    echo "2. Jugar Wordix con una palabra aleatoria\n";
    echo "3. Mostrar una partida\n";
    echo "4. Mostrar la primer partida ganadora\n";
    echo "5. Mostrar resumern de jugador\n";
    echo "6. Mostrar listado de partidas ordenadas por jugador y por palabra\n";
    echo "7. Agregar una palabra de 5 letras a wordix\n";
    echo "8. Salir\n";
    $opcion=solicitarNumeroEntre(1,8);
    return $opcion;
}

function mostrarPartida($coleccionPartidas,$numeroPartida){
    echo "Partida WORDIX ".$numeroPartida."\n";
    echo "Palabra: ".$coleccionPartidas[$numeroPartida-1]["palabra-Wordix"];
    echo "Jugador: ".$coleccionPartidas[$numeroPartida-1]["jugador"];
    echo "Puntaje: ".$coleccionPartidas[$numeroPartida-1]["puntaje"];
    if($coleccionPartidas[$numeroPartida-1]["puntaje"]==0){
        echo "Intento: No adivino la palabra";
    }
    else{
        echo "Intento: Adivino la palabra en ".$coleccionPartidas[$numeroPartida-1]["intentos"];
    }
}

function agregarPalabra($coleccionPalabras,$palabraNueva){
    array_push($coleccionPalabras,$palabraNueva);
    return $coleccionPalabras;
}

function retornaPrimerVictoria($coleccionPartidas,$nombreJugador){
    $cantidadPartidas=count($coleccionPartidas);
    $i=0;
    $encontrado=false;
    $indice=-1;
    do{
        if($coleccionPartidas[$i]["puntaje"]!=0 && $coleccionPartidas[$i]["nombre"]==$nombreJugador){
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

function retornaResumen($coleccionPartidas,$nombreJugador){
    // int contadorIntento1,contadorIntento2,contadorIntento3,contadorIntento4,contadorIntento5,contadorIntento6
    // int contadorPartidas
    // int contadorVictorias
    // int acumuladorPuntaje
    // int cantidadPartidas
    // array asociativo resumen
    $resumen=[];
    $contadorIntento1=0;
    $contadorIntento2=0;
    $contadorIntento3=0;
    $contadorIntento4=0;
    $contadorIntento5=0;
    $contadorIntento6=0;
    $contadorPartidas=0;
    $contadorVictorias=0;
    $acumuladorPuntaje=0;
    $cantidadPartidas=count($coleccionPartidas);
    for($i=0;$i<$cantidadPartidas;$i++){
        if($nombreJugador==$coleccionPartidas[$i]["jugador"]){
            $contadorPartidas++;
            if($coleccionPartidas[$i]["puntaje"]!=0){
                $contadorVictorias++;
                $acumuladorPuntaje=$acumuladorPuntaje+$coleccionPartidas[$i]["puntaje"];
                switch($coleccionPartidas[$i]["intentos"]){
                    case 1:
                        $contadorIntento1++;
                        break;
                    case 2:
                        $contadorIntento2++;
                        break;
                    case 3:
                        $contadorIntento3++;
                        break;
                    case 4:
                        $contadorIntento4++;
                        break;
                    case 5:
                        $contadorIntento5++;
                        break;
                    case 6:
                        $contadorIntento6++;
                        break;
                }
            }
        }
    }
    $resumen["jugador"]=$nombreJugador;
    $resumen["partidas"]=$cantidadPartidas;
    $resumen["puntaje"]=$nombreJugador;
    $resumen["victorias"]=$nombreJugador;
    $resumen["intento1"]=$nombreJugador;
    $resumen["intento2"]=$nombreJugador;
    $resumen["intento3"]=$nombreJugador;
    $resumen["intento4"]=$nombreJugador;
    $resumen["intento5"]=$nombreJugador;
    $resumen["intento6"]=$nombreJugador;
    return $resumen;
}
/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:
$coleccionPalabras=cargarColeccionPalabras();
$coleccionPartidas=[];
//Proceso:

//print_r($partida);
//imprimirResultado($partida);


do{
    $opcion = seleccionarOpcion();
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

?>