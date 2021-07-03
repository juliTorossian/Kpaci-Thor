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
                    <div class="tab-pane fade show active" id="DatosUsuario" role="tabpanel" aria-labelledby="v-pills-home-tab" style="background-color: lightgrey;">
                        <div style="margin-left: 70px; margin-right: 70px; background-color: white;">
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-5">
                                    <div class="my-4 px-5">
                                        <label>Nombre:</label>
                                        <h3 style="margin-left: 40px;"><?php echo($usuario['usrNombre']); ?></h3>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="my-4 px-5">
                                        <label>Email:</label>
                                        <h3 style="margin-left: 40px;"><?php echo($usuario['usrMail']); ?></h3>
                                    </div>
                                </div>
                                <div class="col-1"></div>
                            </div>
                            
                            <!-- <div class="row">
                                <div class="col-3"></div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Modificar contraseña</label>
                                        <input type="text" class="form-control mx-2 mb-2" id="newPass" placeholder="Nueva contraseña">
                                        <input type="text" class="form-control mx-2 mb-2" id="newPassRepeat" placeholder="Repetir nueva contraseña">
                                        <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            Cambiar contraseña
                                        </button>

                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Confirmar Identidad</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="row g-3">
                                                            <div class="col-auto">
                                                                <label for="staticEmail2" class="visually-hidden">Email</label>
                                                                <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="<?php //echo($usuario['usrMail']); ?>">
                                                            </div>
                                                            <div class="col-auto">
                                                                <label for="inputPassword2" class="visually-hidden">Password</label>
                                                                <input type="password" class="form-control" id="contraseniaUsuario" placeholder="Password">
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                        <button type="button"  id="bCambiarContrasenia" class="btn btn-primary">Confirmar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-3"></div>
                            </div> -->
                        </div>
                    </div>
                    <div class="tab-pane fade" id="FavoritosUsuario" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <iframe src="./index.php?controller=favoritoCON&action=favoritosOnly" style="width:100%; height: 100vh;"></iframe>
                    </div>
                    <div class="tab-pane fade" id="ComprasUsuario" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <iframe src="./index.php?controller=compraCON&action=compraHisOnly" style="width:100%; height: 100vh;"></iframe>
                    </div>
                </div>
            </div>

        </div>
            
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./public/js/miCuenta.js"></script>
    <script src="./public/js/jquery-3.6.0.js"></script>
</main>




<?php 

    require_once('footer.php');

?>