<?php
    require_once('header.php');

?>



    <div class="container bg-white py-4">
        <div class="row mx-auto my-auto">

            <div class="row">
                <div class="col-7">
                    <img src="https://via.placeholder.com/540.png" alt="Imagen producto" class="px-auto">
                </div>
                <div class="col-5">

                    <p>PRODUCTO</p>
                    <p>nombre - <?php echo($producto->proNombre);?></p>
                </div>
            </div>

        </div>
            
    </div>

</main>




<?php 

    require_once('footer.php');

?>