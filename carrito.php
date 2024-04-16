<?php
session_start();


$mensaje="";
if(isset($_POST['btnAccion'])){
    switch($_POST['btnAccion']){
        case'Agregar':
            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                $ID=openssl_decrypt($_POST['id'],COD,KEY);
                $mensaje.="ID correcto".$ID;
            }else{
                $mensaje.="ID incorrecto".$ID;
            }

            if(is_numeric(openssl_decrypt($_POST['nombre'],COD,KEY))){
                $NOMBRE=openssl_decrypt($_POST['nombre'],COD,KEY);
                $mensaje.="Nombre correcto".$NOMBRE;
            }else{
                $mensaje.="Nombre incorrecto";  break;}

            if(is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))){
                $CANTIDA=openssl_decrypt($_POST['cantida'],COD,KEY);
                $mensaje.="cantida correcto".$CANTIDA;
            }else{
                $mensaje.="cantida incorrecto";  break;}
            

            if(is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))){
                $PRECIO=openssl_decrypt($_POST['precio'],COD,KEY);
                $mensaje.="precio correcto".$PRECIO;
            }else{
                $mensaje.="Precio incorrecto"; break;}
            
                if(!isset($_SESSION['CARRITO'])){
                    $producto=array(
                        'ID'=> $ID,
                        'NOMBRE'=> $NOMBRE,
                        'CANTIDA'=> $CANTIDA,
                        'PRECIO'=> $PRECIO
                    );
                    $_SESSION['CARRITO'][0]=$producto;
                }else{
                    $NumeroProductos=count($_SESSION['CARRITO']);
                    $producto=array(
                        'ID'=> $ID,
                        'NOMBRE'=> $NOMBRE,
                        'CANTIDA'=> $CANTIDA,
                        'PRECIO'=> $PRECIO
                    );
                    $_SESSION['CARRITO'][$NumeroProductos]=$producto;
                }
                $mensaje= print_r($_SESSION,true);
            
        break;
    }
};
?>