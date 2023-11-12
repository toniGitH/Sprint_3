<?php 

    interface carCouponGenerator {
        public function addSeasonDiscount(bool $paramIsHighSeason): void;
        public function addStockDiscount(bool $paramBigStock): void;
        public function getDiscount(): int;
        public function getBrand(): string;
    } //Esta interfaz especifica los métodos que deben cumplir las diferentes "estrategias" de nuestra aplicación (Mercedes y BMW)


    class bmwCouponGenerator implements carCouponGenerator {

        private int $discount = 0;
        private string $brand = "BMW"; 

        public function addSeasonDiscount(bool $paramIsHighSeason): void {
            if (!$paramIsHighSeason) {
                $this->discount += 5;
            }
        }

        public function addStockDiscount(bool $paramBigStock): void {
            if ($paramBigStock) {
                $this->discount += 7;
            }
        }

        public function getDiscount(): int {
            return $this->discount;
        }

        public function getBrand(): string{
            return $this->brand;
        }
    }

    class mercedesCouponGenerator implements carCouponGenerator {

        private int $discount = 0;
        private string $brand = "Mercedes"; 


        public function addSeasonDiscount(bool $paramIsHighSeason): void {
            if (!$paramIsHighSeason) {
                $this->discount += 4;
            }
        }

        public function addStockDiscount(bool $paramBigStock): void {
            if ($paramBigStock) {
                $this->discount += 10;
            }
        }

        public function getDiscount(): int {
            return $this->discount;
        }

        public function getBrand(): string{
            return $this->brand;
        }
    }

    class couponGenerator {

        private carCouponGenerator $carCouponGenerator;

        public function setCarCouponGenerator(carCouponGenerator $paramCarCouponGenerator): void {
            $this->carCouponGenerator = $paramCarCouponGenerator;
        }

        public function executeCarCouponGenerator(bool $paramIsHighSeason, bool $paramBigStock): void {

            // Aplicar descuentos según la temporada y el inventario
            $this->carCouponGenerator->addSeasonDiscount($paramIsHighSeason);
            $this->carCouponGenerator->addStockDiscount($paramBigStock);

            // Obtener el descuento total y la marca y mostrar el resultado
            $totalDiscount = $this->carCouponGenerator->getDiscount();
            $brand = $this->carCouponGenerator->getBrand();
            echo "Puedes beneficiarte de un descuento del " . $totalDiscount . "% en la compra de tu nuevo " . $brand .".\n";
        }
    }


?>