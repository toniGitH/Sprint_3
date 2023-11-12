<?php 

    require_once "poultry.php";

    function duck_interaction($duck) {
        $duck->quack();
        $duck->fly();
    }

    // Instrucciones proporcionadas en el enunciado, que deben gererar los outputs especificados:
    $duck = new Duck;
    $turkey = new Turkey;
    $turkey_adapter = new TurkeyAdapter($turkey);
    echo "The Turkey says...\n";
    $turkey->gobble();
    $turkey->fly();
    echo "The Duck says...\n";
    duck_interaction($duck);
    echo "The TurkeyAdapter says...\n";
    duck_interaction($turkey_adapter);


    // OBSERVACIONES NO DIRIGIDAS AL MENTOR
    /* Instrucciones de prueba, para verificar que un objeto de la clase Turkey{} no se puede usar en el método duck_interaction() si
       utilizamos un patrón Adapter (descomentar las siguientes instrucciones y comentar las instrucciones anteriores para hacer esta 
       prueba)
       Observación interesante: como la clase Duck{} y la clase Turkey{} tienen un método fly() que se llama igual, si hacemos la
       prueba de comentar la llamada a la función quack() que hay dentro de la función duck_interaction(), vemos que aún sin adaptador
       el programa se ejecuta sin dar errores, pero realmente el objeto $turkey no estaría volando como un pato, sino como un pavo.
       Esto es así porque ha dado la casualidad de que ambas clases tienen una función que se llama igual, pero realmente no estaríamos
       adaptando los objetos de la clase Turkey{}*/
    //$turkey = new Turkey;
    //duck_interaction($turkey);

?>