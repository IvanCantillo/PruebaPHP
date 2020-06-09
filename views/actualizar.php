<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PruebaPHP | Actualizar casos</title>
    <?php require_once ('partials/_styles.php') ?>
</head>
<body>  
    <?php require_once ('partials/_navbar.php') ?>    
    <div class="container-fluid">
        <div class="row">   
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 mt-3 mx-auto">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Actualizar caso</h5>
                        <form action="<?= URL_BASE ?>inicio/update/<?= $resCaso['id'] ?>" method="POST">
                            <div class="form-group">
                                <input id="nombre" class="form-control" type="text" name="direccion" placeholder="Direccion" value="<?= $resCaso['direccion'] ?>">
                            </div>
                            <div class="form-group">
                                <textarea id="descripcion" class="form-control" type="text" name="motivo" placeholder="Motivo"> <?= $resCaso['motivo'] ?> </textarea>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-secondary btn-block" type="submit" value="Actualizar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>            
        </div>
    </div>
    <?php require_once ('partials/_footer.php') ?>    
    <script src="../../js/home/casos.js"></script>
</body>
</html>