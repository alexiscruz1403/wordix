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
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        /* Agregar 5 palabras más */
        "MANOS","TAZAS","PLATA","PALTA","RATON"
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
    $opcion=solicitarNumeroEntre(1,8);
    return $opcion;
}

/** funcion que muestra los datos de una partida solicitada explicacion 3 punto 6
 * @param array $coleccionPartidas
 * @param int $numeroPartida
 */
function mostrarPartida($coleccionPartidas,$numeroPartida){
    echo "Partida WORDIX ".$numeroPartida."\n";
    echo "Palabra: ".$coleccionPartidas[$numeroPartida-1]["palabra-Wordix"]."\n";
    echo "Jugador: ".$coleccionPartidas[$numeroPartida-1]["jugador"]."\n";
    echo "Puntaje: ".$coleccionPartidas[$numeroPartida-1]["puntaje"]."\n";
    if($coleccionPartidas[$numeroPartida-1]["puntaje"]==0){
        echo "Intento: No adivino la palabra";
    }
    else{
        echo "Intento: Adivino la palabra en ".$coleccionPartidas[$numeroPartida-1]["intentos"];
    }
}

/** funcion que agrega una nueva palabra a la coleccion de palabras a adivinar punto7
 * @param  array $coleccionPalabras
 * @param String $palabraNueva
 * @return array
 */
function agregarPalabra($coleccionPalabras,$palabraNueva){
    array_push($coleccionPalabras,$palabraNueva);
    return $coleccionPalabras;
}

/** funcion que retorna la primer victoria del jugador
 * @param array $coleccionPartidas
 * @param String $nombreJugador
 * @return int
 */
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

/** este modulo no es necesario, ya que es muy corto para poder serlo
 * @param String $nombre
 * @return boolean
 */
function nombreValido($nombre){
    $esLetra=ctype_alpha($nombre[0]);
    return $esLetra;
}

/** funcion que verifica el nombre del jugador
 * @return String
 */
function solicitarJugador(){
    echo "Ingrese su nombre: ";
    $nombre=trim(fgets(STDIN));
    $esLetra=ctype_alpha($nombre[0]);
    while(!nombreValido($nombre)){
        echo "Su nombre debe empezar con una letra\n";
        echo "Ingrese su nombre: ";
        $nombre=trim(fgets(STDIN));
    }
    $nombre=strtolower($nombre);
    return $nombre;
}

function yaJugo($coleccionPartidas,$palabra,$jugador){
    $cantidadPartidas=count($coleccionPartidas);
    $i=0;
    $palabraJugada=false;
    while($i<$cantidadPartidas && !$palabraJugada){
        if($coleccionPartidas[$i]["jugador"]==$jugador && $coleccionPartidas[$i]["palabra-Wordix"]==$palabra){
            $palabraJugada=true;
        }
        $i++;
    }
    return $palabraJugada;
}

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
/*array $coleccionPalabras
  array $coleccionPartidas
  String $nombre
  int $numeroPalabra
  int $cantidadPalabras
  int $cantidadPartidas
  int $numeroPartida
  String $jugadorNombre
  int $victoria
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
            echo "Ingrese su nombre";
            $nombre=trim(fgets(STDIN));
            escribirMensajeBienvenida($nombre);
            echo "Ingrese el numero de la Palabra Wordix: ";
            $numeroPalabra=solicitarNumeroEntre(0,$cantidadPalabras-1);
            $palabraWordix=$coleccionPalabras[$numeroPalabra];
            while(yaJugo($coleccionPartidas,$palabraWordix,$jugador)){
                echo "Usted ya jugo con esta palabra, pruebe con otra: ";
                $numeroPalabra=solicitarNumeroEntre(0,$cantidadPalabras-1);
                $palabraWordix=$coleccionPalabras[$numeroPalabra];
            }
            $partida = jugarWordix($palabraWordix, strtolower($nombre));
            $coleccionPartidas=agregarPartida($coleccionPartidas,$partida);
            break;
        case 2: 
            echo "Ingrese su nombre";
            $nombre=trim(fgets(STDIN));
            escribirMensajeBienvenida($nombre);
            do{
                $numeroPalabra=mt_rand(0,$cantidadPalabras-1);
                $palabraWordix=$coleccionPalabras[$numeroPalabra];
            }while(yaJugo($coleccionPalabras,$palabra,$nombre));
            $partida = jugarWordix($palabraWordix, strtolower($nombre));
            $coleccionPartidas=agregarPartida($coleccionPartidas,$partida);
            break;
        case 3:
            echo "Ingrese un numero de partida entre 0 y ".($cantidadPartidas-1).": ";
            $numeroPartida=solicitarNumeroEntre(0,$cantidadPartidas-1);
            mostrarPartida($coleccionPartidas,$numeroPartida);
            break;
        case 4:
            echo "Ingrese el nombre del jugador";
            $jugadorNombre=trim(fgets(STDIN));
            $victoria=retornaPrimerVictoria($coleccionPartidas,$jugadorNombre);
            mostrarPartida($coleccionPartidas,$victoria);
            break;
        case 5:;break;
        case 6:;break;
        case 7:
            $palabraNueva=leerPalabra5Letras();
            $coleccionPalabras=agregarPalabra($coleccionPalabras,$palabraNueva);
            break;
    }
} while ($opcion != 8);

?>