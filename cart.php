<?php
ob_start();
// include archivo header.php
include ('header.php');
?>

<?php

    /*  include cart items if it is not empty */
        count($product->getData('cart')) ? include ('componentes/_cart-template.php') :  include ('componentes/notFound/_cart_notFound.php');
    /*  include cart items if it is not empty */

        /*  include top sale section */


    /*  include top sale section */
        include ('componentes/_new.php');
    /*  include top sale section */

?>

<?php
// include footer.php file
include ('footer.php');
?>


