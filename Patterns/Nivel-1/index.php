<?php 

    require_once "tigger.php";

    // Intentaremos crear 2 instancias de la clase Tigger para verificar si se crean 2 o sólo una:
    /*Resultado: la primera llamada al método getInstance() llama al constructor porque aún no existe ninguna instancia de la clase
                 Tigger y por eso crea la instancia y se imprime "Building character...".
                 Sin embargo, la segunda llamada, como la instancia ya existe, no ejecuta el constructor y no crea ninguna instancia,
                 sino que sólo devuelve la misma instancia creada en la llamada anterior. Por eso, tampoco se imprime "Building 
                 character...", porque NO SE VUELVE A EJECUTAR EL CONSTRUCTOR.
    */

    $personaje1=Tigger::getInstance();
    $personaje2=Tigger::getInstance();

    var_dump($personaje1);
    var_dump($personaje2);
    echo ($personaje1 == $personaje2) ? "Son iguales \n" : "Son diferentes \n";
    echo "\n";

    // Imprimimos varias veces el rugido de Tigger:

    // Rugir varias veces:

    echo "Rugiendo: \n";

    for ($i=0; $i<3 ; $i++) { 
        $personaje1->roar();
    }

    // Número de rugidos hasta ahora:

    echo "Tigger ha rugido " . $personaje1->getCounter() . " veces.\n";

    // Vuelve a rugir (pero ahora usamos la instancia $personaje2, que debería ser la misma que $personaje1):

    echo "Rugiendo: \n";

    for ($i=0; $i<5 ; $i++) { 
        $personaje2->roar();
    }

    // Volvemos a consultar los rugidos emitidos hasta ahora (usando, de nuevo, la instancia $personaje2):

    echo "Tigger ha rugido " . $personaje2->getCounter() . " veces.\n";

    // CONCLUSIÓN: el personaje 1 y el personaje 2 son la misma cosa: Tigger


?>