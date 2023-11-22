<?php
include_once("wordix.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/*Montesino Lautaro FAI-3318 TUDW lautaro.montesino@est.fi.uncoma.edu.ar lautyMonte*/
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
function cargarPartidas(){ 
    //array multidimensional $colecPartidas
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

/**  funcion que cargar la partida de un jugador en la coleccion de partidas
 * @param array $coleccionPartidas
 * @param array $partida
 * @return array
 */
function agregarPartida($coleccionPartidas,$partida){
    array_push($coleccionPartidas,$partida);
    return $coleccionPartidas;
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
    echo "Opcion: ";
    $opcion=solicitarNumeroEntre(1,8);
    return $opcion;
}

/**funcion que muestra los datos de una partida solicitada
 * @param array $coleccionPartidas
 * @param int $numeroPartida
 */
function mostrarPartida($coleccionPartidas,$numeroPartida){
    echo "Partida WORDIX ".$numeroPartida."\n";
    echo "Palabra: ".$coleccionPartidas[$numeroPartida-1]["palabraWordix"]."\n";
    echo "Jugador: ".$coleccionPartidas[$numeroPartida-1]["jugador"]."\n";
    echo "Puntaje: ".$coleccionPartidas[$numeroPartida-1]["puntaje"]."\n";
    if($coleccionPartidas[$numeroPartida-1]["puntaje"]==0){
        echo "Intento: No adivino la palabra \n";
    }
    else{
        echo "Intento: Adivino la palabra en el ".$coleccionPartidas[$numeroPartida-1]["intentos"]."° "."\n";
    }
}

/** funcion que agrega una nueva palabra a la coleccion de palabras a adivinar
 * @param  array $coleccionPalabras
 * @param String $palabraNueva
 * @return array
 */
function agregarPalabra($coleccionPalabras,$palabraNueva){
    array_push($coleccionPalabras,$palabraNueva);
    return $coleccionPalabras;
}

/** Funcion que retorna el indice de la primer partida ganada de un jugador.
 * @param array $coleccionPartidas
 * @param string $nombreJugador
 * @return int 
 */
function retornaPrimerVictoria($coleccionPartidas,$nombreJugador){
    /* int $cantidadPartidas,$i,$indice
       boolean $encontrado*/
    $cantidadPartidas=count($coleccionPartidas);
    $i=0;
    $encontrado=false;
    $indice=-1;
    do{
        if($coleccionPartidas[$i]["puntaje"]!=0 & $coleccionPartidas[$i]["jugador"]==$nombreJugador){
            $encontrado=true;
            $indice=$i;
        }
        else{
            $i++;
        }
    }while($i<$cantidadPartidas && !$encontrado);
    return $indice;
}

/** funcion que devuelve el resumen de un jugador de una partidas
 * @param array $coleccionPartidas
 * @param String $nombre
 * @return array
 */
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
    $resumen["partidas"]=$contadorPartidas;
    $resumen["puntaje"]=$acumuladorPuntaje;
    $resumen["victorias"]=$contadorVictorias;
    $resumen["intento1"]=$contadorIntento1;
    $resumen["intento2"]=$contadorIntento2;
    $resumen["intento3"]=$contadorIntento3;
    $resumen["intento4"]=$contadorIntento4;
    $resumen["intento5"]=$contadorIntento5;
    $resumen["intento6"]=$contadorIntento6;
    return $resumen;
}

/** Funcion que muestra el resumen de un jugador
 * @param array $resumen
 */
function mostrarResumen($resumen){
    $cantidadPartidas=$resumen["partidas"];
    $cantidadVictorias=$resumen["victorias"];
    $porcentajeVictorias=round(($cantidadVictorias*100)/$cantidadPartidas);
    echo "Jugador: ".$resumen["jugador"];
    echo "Partidas: ".$resumen["partidas"];
    echo "Puntaje total: ".$resumen["puntaje"];
    echo "Victorias: ".$resumen["victorias"];
    echo "Porcentaje victorias: ".$porcentajeVictorias;
    echo "Intento 1: ".$resumen["intentos1"];
    echo "Intento 2: ".$resumen["intentos2"];
    echo "Intento 3: ".$resumen["intentos3"];
    echo "Intento 4: ".$resumen["intentos4"];
    echo "Intento 5: ".$resumen["intentos5"];
    echo "Intento 6: ".$resumen["intentos6"];
}

/** funcion que verifica el nombre del jugador
 * @return String
 */
function solicitarJugador(){
    /* String $nombre
       boolean $esLetra
    */
    echo "Ingrese su nombre: ";
    $nombre=trim(fgets(STDIN));
    $esLetra=ctype_alpha($nombre[0]);
    while(!$esLetra){
        echo "Su nombre debe empezar con una letra\n";
        echo "Ingrese su nombre: ";
        $nombre=trim(fgets(STDIN));
        $esLetra=ctype_alpha($nombre[0]);
    }
    $nombre=strtolower($nombre);
    return $nombre;
}

/** Funcion que verifica si un usuario ya jugo con una palabra dada
 * @param array $coleccionPalabras
 * @param string $palabra
 * @param string $jugador
 * @return boolean
 */
function yaJugo($coleccionPartidas,$palabra,$jugador){
    /*int $cantidadPartidas,$i
      boolean $palabraJugada
     */
    $cantidadPartidas=count($coleccionPartidas);
    $i=0;
    $palabraJugada=false;
    while($i<$cantidadPartidas && !$palabraJugada){
        if($coleccionPartidas[$i]["jugador"]==$jugador && $coleccionPartidas[$i]["palabraWordix"]==$palabra){
            $palabraJugada=true;
        }
        $i++;
    }
    return $palabraJugada;
}

/** Funcion que verifica si una palabra ingresada ya pertenece al arreglo de palabras
 * @param array $coleccionPalabras
 * @param string $nuevaPalabra
 * @return boolean
 */
function pertenece($coleccionPalabras,$nuevaPalabra){
    /* int $cantidadPalabras,$i*/
    $cantidadPalabras=count($coleccionPalabras);
    $i=0;
    while($i<$cantidadPalabras && $coleccionPalabras[$i]!=$nuevaPalabra){
        $i++;
    }
    if($i<$cantidadPalabras){
        return true;
    }
    else{
        return false;
    }
}

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
/*array $coleccionPalabras
  array $coleccionPartidas
  array $resumen
  String $nombre
  String palabraNueva
  int $numeroPalabra
  int $cantidadPalabras
  int $cantidadPartidas
  int $numeroPartida
*/

//Inicialización de variables:
$coleccionPalabras=cargarColeccionPalabras();
$coleccionPartidas=cargarPartidas();
//Proceso:

//print_r($partida);
//imprimirResultado($partida);
do{
    $cantidadPalabras=count($coleccionPalabras);
    $cantidadPartidas=count($coleccionPartidas);
    $opcion = seleccionarOpcion();
    switch ($opcion) {
        case 1:
            $nombre=solicitarJugador();
            echo "Ingrese el numero de la Palabra Wordix: ";
            $numeroPalabra=solicitarNumeroEntre(0,$cantidadPalabras-1);
            $palabraWordix=$coleccionPalabras[$numeroPalabra];
            while(yaJugo($coleccionPartidas,$palabraWordix,$nombre)){
                echo "Usted ya jugo con esta palabra, pruebe con otra: ";
                $numeroPalabra=solicitarNumeroEntre(0,$cantidadPalabras-1);
                $palabraWordix=$coleccionPalabras[$numeroPalabra];
            }
            $partida = jugarWordix($palabraWordix, strtolower($nombre));
            $coleccionPartidas=agregarPartida($coleccionPartidas,$partida);
            break;
        case 2: 
            $nombre=solicitarJugador();
            do{
                $numeroPalabra=rand(0,$cantidadPalabras-1);
                $palabraWordix=$coleccionPalabras[$numeroPalabra];
            }while(yaJugo($coleccionPartidas,$palabraWordix,$nombre));
            $partida = jugarWordix($palabraWordix, strtolower($nombre));
            $coleccionPartidas=agregarPartida($coleccionPartidas,$partida);
            break;
        case 3:
            echo "Ingrese un numero de partida entre 1 y ".($cantidadPartidas).": ";
            $numeroPartida=solicitarNumeroEntre(1,$cantidadPartidas);
            mostrarPartida($coleccionPartidas,$numeroPartida);
            break;
        case 4:
            echo "ingrese el nombre de un jugador";
            $nnJugador=trim(fgets(STDIN));
            $pos=retornaPrimerVictoria($coleccionPartidas,$nnJugador);
            if($pos=-1){
                echo "el jugador ".$nnJugador." no gano ninguna partida";
            }
            else{
                mostrarPartida($coleccionPartidas,$pos);
            }
            ;break;
        case 5:
            echo "Ingrese el nombre del jugador: ";
            $nnJugador=trim(fgets(STDIN));
            $resumen=retornaResumen($coleccionPartidas,$nnJugador);
            mostrarResumen($resumen);
            ;break;
        case 6:;break;
        case 7:
            echo "Ingrese una nueva palabra: ";
            $palabraNueva=leerPalabra5Letras();
            while(pertenece($coleccionPalabras,$palabraNueva)){
                echo "La palabra ya existe en Wordix, intente con otra: ";
                $palabraNueva=leerPalabra5Letras();
            }
            $coleccionPalabras=agregarPalabra($coleccionPalabras,$palabraNueva);
            break;
    }
} while ($opcion != 8);

?>