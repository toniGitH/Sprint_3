<?php 

require_once "couponGenerator.php";

    // Generación de un cupón para BMW en temporada baja y con stock alto:
    $bmwCouponGenerator = new bmwCouponGenerator();
    $couponGenerator = new couponGenerator();
    $couponGenerator->setCarCouponGenerator($bmwCouponGenerator);
    $couponGenerator->executeCarCouponGenerator(false, true);

    // Generación de un cupón para Mercedes en temporada baja y con stock alto:
    $mercedesCouponGenerator = new mercedesCouponGenerator();
    $couponGenerator->setCarCouponGenerator($mercedesCouponGenerator);
    $couponGenerator->executeCarCouponGenerator(false, true);

    // Generación de un cupón para BMW en temporada alta y con stock alto:
    $bmwCouponGenerator = new bmwCouponGenerator();
    $couponGenerator = new couponGenerator();
    $couponGenerator->setCarCouponGenerator($bmwCouponGenerator);
    $couponGenerator->executeCarCouponGenerator(true, true);

    // Generación de un cupón para Mercedes en temporada alta y con stock bajo:
    $mercedesCouponGenerator = new mercedesCouponGenerator();
    $couponGenerator->setCarCouponGenerator($mercedesCouponGenerator);
    $couponGenerator->executeCarCouponGenerator(true, false);


?>