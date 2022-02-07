<?php
    session_start();
    // Área del header
    include ('header.php');
?>

<?php

    /*  Área del banner  */
        include ('componentes/_banner-area.php');               
    /*  Área del banner  */

    /*  Área top ventas */
        include ('componentes/_top-sale.php');
    /*  Área top ventas */

    /*  Área descuentos  */
         include ('componentes/_special-price.php');
    /*  Área descuentos  */

    /*  Anuncios  */
        include ('componentes/_banner-ads.php');
    /*  Anuncios  */

    /*  Sección de novedades  */
        include ('componentes/_new.php');
    /*  Sección de novedades  */


?>


<?php
// Sección del footer
include ('footer.php');
?>