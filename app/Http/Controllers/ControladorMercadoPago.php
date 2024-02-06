<?php

namespace App\Http\Controllers;

use App\Entidades\Pedido; 

require app_path() . '/start/constants.php';

class ControladorMercadoPago extends Controller{
      public function aprobar($idpedido){
            $pedido = new Pedido();
            $pedido->obtenerPorId($idpedido);
            $pedido->fk_idestadopedido = 1 ;
            $pedido->guardar();
            return redirect("/mi-cuenta");
      }
      public function pendiente($idpedido){
            $pedido = new Pedido();
            $pedido->obtenerPorId($idpedido);
            $pedido->fk_idestadopedido = 5 ;
            $pedido->guardar();
            return redirect("/mi-cuenta");
      }
      public function error($idpedido){
            $pedido = new Pedido();
            $pedido->obtenerPorId($idpedido);
            $pedido->fk_idestadopedido = 4 ;
            $pedido->guardar();
            return redirect("/mi-cuenta");
      }
};