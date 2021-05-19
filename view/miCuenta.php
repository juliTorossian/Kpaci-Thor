<?php

    require_once('header.php');

?>



    <div class="container bg-white py-4">
        <div class="row mx-auto my-auto">
            <p>Mi Cuenta</p>
            <p><?php echo($_SESSION['username']);?></p>
            <br>
        </div>
            
    </div>

</main>




<?php 

    require_once('footer.php');

?>