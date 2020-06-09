<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PruebaPHP | Registro</title>
    <?php require_once('partials/_styles.php') ?>
</head>

<body>
    <?php require_once('partials/_navbar.php') ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                <img src="../../public/images/register.svg" class="w-100 h-75 content-register-left" srcset="">
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                <div class="card shadow content-register-right">
                    <div class="card-body">
                        <h5 class="card-title">Registro</h5>
                        <form id="form_register">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text rounded-left" id="my-addon"><i class="fas fa-user-alt"></i></i></span>
                                    </div>
                                    <input class="form-control" required type="text" name="nombre" id="nombre" placeholder="Nombres">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text rounded-left" id="my-addon"><i class="fas fa-user-alt"></i></i></span>
                                    </div>
                                    <input class="form-control" required type="text" name="apellido" id="apellido" placeholder="Apellidos">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text rounded-left" id="my-addon"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input class="form-control" required type="tel" name="telefono" id="telefono" placeholder="Telefono">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <span class="input-group-text rounded-left" id="my-addon"><i class="fas fa-address-card"></i></span>
                                            </div>
                                            <select name="tipo_documento" id="tipo_documento" class="form-control" required>
                                                <option value='null'> Tipo Documento </option>
                                                <option value="c.c"> C.C </option>
                                                <option value="t.i"> T.I </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <span class="input-group-text rounded-left" id="my-addon"><i class="fas fa-hashtag"></i></span>
                                            </div>
                                            <input class="form-control" required type="text" name="numero_documento" id="numero_documento" placeholder="Numero documento">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-danger" id="tipo_documento_error"></p>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text rounded-left" id="my-addon"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input class="form-control" required type="email" name="email" id="email" placeholder="Correo electronico">
                                </div>
                            </div>
                            <p class="text-danger" id="email_error">  </p>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text rounded-left" id="my-addon"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input class="form-control" required type="password" name="password" id="password" placeholder="Contraseña">
                                </div>
                            </div>
                            <p class="text-danger" id="password_error">  </p>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text rounded-left" id="my-addon"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input class="form-control" required type="password" id="password_confirm" placeholder="Repetir contraseña">
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-secondary"> Registrarse </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('partials/_footer.php') ?>
    <script src="../../public/js/user/register.js"></script>
</body>

</html>