<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>

        <br>
        <div class="alert alert-success">
            <?php echo $mensaje;?>
            <a href="" class="badge badge-success">Ver carrito</a>
        </div>

        <div class="row">
            <?PHP
            $sentencia=$pdo->prepare("SELECT * FROM `tblproductos`");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);
            ?>
            <?php foreach($listaProductos as $producto){ ?>
                <div class="col-3">
                <div class="card">
                    <img title="<?php echo $producto['nombre']?>" alt="<?php echo $producto['nombre']?>" data-toggle="popover" data-content="<?php echo $producto['descripcion'] ?>" data-trigger="hover" class="card-img-top" src="<?php echo $producto['descripcion'] ?>" height="317px">
                    <div class="card-body">
                        <span><?php echo $producto['nombre']?></span>
                        <h5 class="card-title">$RD<?php echo $producto['precio']?></h5>
                        <form action="" method="post">
                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['id'],COD,KEY) ?>">
                            <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre'],COD,KEY);?>">
                            <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio'],COD,KEY);?>">
                            <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt($producto['1'],COD,KEY);?>">
                        <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al Carrito</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php } ?>
            
            
        </div>
    </div>

    <script>
        $(function () {
        $('[data-toggle="popover"]').popover()
        });
    </script>
<?php 
include 'templates/pie.php'
?>