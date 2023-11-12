<?php 

    class Tigger {

        private static Tigger $instance;
        private static int $roarCounter=0;

        private function __construct() {
            echo "Building character..." . PHP_EOL;
        }

        public static function getInstance(): Tigger {
            if (!isset(self::$instance)) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function roar() {
            echo "Grrr!" . PHP_EOL;
            self::$roarCounter++;
        }

        public function getCounter(){
            return self::$roarCounter;
        }

    }

/*ACLARACIÓN (no es para el profesor)

    En la función getInstance(), la creación del objeto se puede hacer de 3 maneras, con implicaciones diferentes de cara a aplicar una
    futura herencia de la clase Tigger:

        1) con new Tigger()
        2) con new self()
        3) con new static()
    
        1) Con esta opción, SIEMPRE se creará una y solo una instancia de la clase Tigger, incluso cuando haya subclases que hereden de
           ella. Por ejemplo, clase Winnie, clase Piglet, etc... => Sólo se podrá crear una instancia, llamada Tigger, que sería "compartida"
           entre todas (padre e hijas), incluso cuando fuera la subclase Winnie o la subclase Piglet las que llamaran al método getInstance().
           No es una opción recomendada porque es muy "rígida". No es flexible en casos de herencia.
           Pero esto no significa que con esta opción se impida a una subclase tener su propia instancia, puesto que si quisiéramos poder hacer
           esto, se podría conseguir haciendo que esa subclase sobreescribiera el método getInstance(). Sin embargo, esto no es lo ideal.
           Sólo sería una opción "aceptable" si sabemos seguro que sólo habrá una clase Tigger y que no existirá herencia.

        2) Esta opción, que es la que se ha elegido, es mucho más flexible con la herencia. Si no hay subclases que heredan de Tigger, no pasa
           nada puesto que cuando se llama al método getInstance() se crea una instancia de la clase Tigger, y listo.
           Si hubiera subclases de Tigger, éstas también compartirían la misma instancia y deberían sobreescribir el método getInstance()
           si quisieran tener su propia instancia, pero el uso de new self() es una opción más recomendable para situaciones más complejas
           que aún no soy capaz de entender. Por tanto, es más recomendable 2) que 1).
        
        3) Esta opción es algo diferente a la 2), porque con ella, se consigue que una clase que herede de Tigger pueda tener su propia
           instancia, sin necesidad de sobreescribir su método getInstance(). Sin embargo, para implementar esta opción, es necesario añadir
           algo más de código en el método getInstance().
*/

?>