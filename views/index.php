<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PruebaPHP | Login</title>
    <?php require_once ('partials/_styles.php') ?>
</head>
<body>  
    <?php require_once ('partials/_navbar.php') ?>    
    <div class="container-fluid">
        <div class="row"> 
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 mt-2">
                <img src="../../public/images/login.svg" class="w-100 content-register-left" srcset="">
            </div>  
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                <div class="card shadow content-register-right">
                    <div class="card-body">
                        <h5 class="card-title">Iniciar sesion</h5>
                        <form id="form_login">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text rounded-left" id="my-addon"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input class="form-control" type="email" name="email" id="email" placeholder="Correo electronico">
                                </div>
                            </div>
                            <p class="text-danger" id="email_error">  </p>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text rounded-left" id="my-addon"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input class="form-control" type="password" name="password" id="password" placeholder="Contraseña">
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-secondary"> Ingresar </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>            
        </div>
    </div>
    <?php require_once ('partials/_footer.php') ?>    
    <script src="../../public/js/user/login.js" type="module"></script>
</body>
</html>