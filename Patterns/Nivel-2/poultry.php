<?php 

    /* No es estrictamente necesario crear esta interface y hacer "class TurkeyAdapter implements duck_interaction", SIEMPRE Y CUANDO
       en la clase TurkeyAdapter{} realmente implementemos los métodos quack() y fly().
       Sin embargo, si lo hacemos definiendo la interface y obligando a la clase TurkeyAdapter{} a implementarla, nos aseguramos de
       que dichos métodos se implementen: si probamos a comentar uno de los métodos, el editor nos marcará un error.
    */
    interface duck_interaction{
        public function quack();
        public function fly();
    }

    class Duck {

        public function quack() {
            echo "Quack \n";
        }

        public function fly() {
            echo "I'm flying \n";
        }
    }

    class Turkey {

        public function gobble() {
            echo "Gobble gobble \n";
        }

        public function fly() {
        echo "I'm flying a short distance \n";
        }
    }

    class TurkeyAdapter implements duck_interaction{
        
        private Turkey $turkey_Adapter;

        function __construct($turkey){
            $this->turkey_Adapter=$turkey;
        }

        public function quack() {
            echo "Gobble gobble \n";
        }

        public function fly() {
            for ($i=0; $i<5 ; $i++) { 
                echo "I'm flying a short distance \n";
            }
        }

    }

/* EXPLICACION (no es para el mentor):
    1) Tenemos una clase Duck{} que está implementando dos funciones llamadas quack() y fly().

    2) Ahora queremos poder utilizar también la clase Turkey{}, pero los métodos que utiliza son diferentes de los de la clase Duck{}
       Concretamente, utiliza el método gooble() y el método fly() (el método fly está implementado de manera diferente en ambas clases)
    
    3) Queremos poder utilizar los objetos de la clase Turkey{} en nuestra aplicación (en nuestro caso, en nuestro index mediante la
       función duck_intercaction() ), pero no podemos porque no son compatibles con los objetos de la clase Duck{}, para los cuales
       está preparada esa función duck_intercaction(). Por un lado, la clase Turkey{} tiene un método llamado gooble() que no existe
       en la clase Duck{}, y por otro lado, tiene un metodo fly() que, aunque sí existe en la clase Duck{}, actúa de forma diferente.
    
    4) La solución es crear una clase Adaptadora que se encargue de "adaptar" las funciones de nuestra aplicación a los objetos "externos"
       a ella de tipo Turkey.

    5) La aplicación del patron Adapter, en resumen, lo que implica es crear una clase "intermedia", en este caso llamada TurkeyAdapter{}
       que va a "conectar" nuestra aplicación con objetos "ajenos" a ella, tal y como lo hace un adaptador de corriente.
       Un adaptador de corriente, por ejemplo, debe interactuar con ambas partes a "conectar":
            -> por un lado, "RECIBE" algo (en este caso, los bornes +/- del enchufe, o la clavija usb)
            -> por otro lado, "OFRECE" algo (en este caso, los bornes de la red eléctrica de otro país, o los bornes +/- en el caso de 
               un adaptador usb a corriente).
    
    6) Siguiendo esta analogía, nuestra clase Adaptadora o "intermedia", llamada TurkeyAdapter{}, hará lo mismo:
            -> por un lado, "RECIBE" un objeto de tipo Turkey, que, lógicamente, debe haber sido instanciado previamente a través de su
               clase "original", en este caso, la clase Turkey{}.
            -> por otro lado, "OFRECE" algo, que en este caso, es la implementación de LOS MISMOS MÉTODOS que nuestra aplicación requiere
               con los objetos de la clase Duck{}, que en nuestro caso son los métodos quack() y fly() pero, lógicamente, adaptados a 
               las características de los objetos de tipo Turkey{}.
    
    7) De esta forma, cuando nuestra aplicación quiere utilizar un objeto de una clase externa, como en este caso Turkey{}, le pasa
       dicho objeto a la clase Adaptadora TurkeyAdapter{}, la cual lo "convierte" en un "pavo adaptado". Es decir, tomando ese objeto
       de la clase Turkey{} crea una nueva instancia de la nueva clase TurkeyAdapter{}, y ese nuevo objeto es capaz de llamar a los 
       métodos definidos en esa nueva clase TurkeyAdapter{}, que son una adaptación a los que nuestra aplicación utiliza y que se llaman
       exáctamente igual que los de nuestra aplicación.



*/

?>