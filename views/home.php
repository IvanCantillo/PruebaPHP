<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PruebaPHP | Crear casos</title>
    <?php require_once ('partials/_styles.php') ?>
</head>
<body>  
    <?php require_once ('partials/_navbar.php') ?>    
    <div class="container-fluid">
        <div class="row"> 
            <?php if( $_SESSION['usuario']['rol'] == 2 ): ?>
                <div class="col-12 col-md-6 col-lg-6 col-xl-6 mt-3 mx-auto">
                    <table class="table table-border table-responsive">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Direccion</th>
                                <th>Motivo</th>
                                <th colspan="2" class="text-center">Opciones</th>
                            </tr>
                        </thead>
                        <tbody id="casos">
                            <?php if( $resCasos->rowCount() > 0 ): ?>
                                <?php $i = 1; foreach( $resCasos as $caso ): ?>
                                    <tr>
                                        <td> <?= $i++; ?> </td>
                                        <td> <?= $caso['direccion'] ?> </td>
                                        <td> <?= $caso['motivo'] ?> </td>
                                        <td> <a href="<?= URL_BASE ?>inicio/actualizar/<?= $caso['id'] ?>" class="btn btn-primary"> Actualizar </a> </td>
                                        <td> <a href="<?= URL_BASE ?>inicio/eliminar/<?= $caso['id'] ?>" class="btn btn-danger"> Eliminar </a> </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center">
                                        No hay casos.
                                    </td>
                                </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>  
            <?php else: ?>
                <div class="col-12 col-md-6 col-lg-6 col-xl-6 mt-3 mx-auto">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Crear un caso</h5>
                            <form action="<?= URL_BASE ?>inicio/crear/" method="POST">
                                <div class="form-group">
                                    <input id="nombre" class="form-control" type="text" name="direccion" placeholder="Direccion">
                                </div>
                                <div class="form-group">
                                    <textarea id="descripcion" class="form-control" type="text" name="motivo" placeholder="Motivo"></textarea>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-secondary btn-block" type="submit" value="Crear">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>            
            <?php endif; ?>
        </div>
    </div>
    <?php require_once ('partials/_footer.php') ?>    
    <script src="../../js/home/casos.js"></script>
</body>
</html>