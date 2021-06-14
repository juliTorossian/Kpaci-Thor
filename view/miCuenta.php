<?php

    require_once('header.php');

?>



    <div class="container bg-white py-4">
        <div class="row mx-auto my-auto">
            <h2 class="text-center">Mi Cuenta</h2>
            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#DatosUsuario" type="button" role="tab" aria-controls="DatosUsuario" aria-selected="true">Datos Personales</button>
                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#FavoritosUsuario" type="button" role="tab" aria-controls="FavoritosUsuario" aria-selected="false">Mis Favoritos</button>
                    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#ComprasUsuario" type="button" role="tab" aria-controls="ComprasUsuario" aria-selected="false">Mis Compras</button>
                </div>
                <div class="tab-content ml-3" id="v-pills-tabContent" style="width:100%">
                    <div class="tab-pane fade show active" id="DatosUsuario" role="tabpanel" aria-labelledby="v-pills-home-tab"><?php echo($_SESSION['username']); ?></div>
                    <div class="tab-pane fade" id="FavoritosUsuario" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <?php //$productos = $productos_fav ?>
                        <iframe src="./index.php?controller=favoritoCON&action=favoritosOnly" style="width:100%; height: 100vh;"></iframe>
                    </div>
                    <div class="tab-pane fade" id="ComprasUsuario" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                </div>
            </div>

        </div>
            
    </div>

</main>




<?php 

    require_once('footer.php');

?>