<?php

require_once 'Conexion.php';

class Pedidos
{
    private static $instancia;
    private $db;

    function __construct()
    {
        $this->db = Conexion::singleton_conexion();
    }

    public static function singletonPedidos()
    {
        if (!isset(self::$instancia)) {
            $miClase = __CLASS__;
            self::$instancia = new $miClase;
        }
        return self::$instancia;
    }

    public function getPedidosTodos()
    {
        try {
            $consulta = "SELECT * FROM pedidos";
            $query = $this->db->preparar($consulta);
            $query->execute();
            $tPedidos = $query->fetchAll();
        } catch (Exception $e) {
            echo "Se ha producido un error";
        }

        $tablaPedidos = array();
        foreach ($tPedidos as $ped) {
            $p = new Pedido($ped[0], $ped[1], $ped[2], $ped[3], $ped[4], $ped[5], $ped[6], $ped[7], $ped[8], $ped[9], $ped[10], $ped[11], $ped[12], $ped[13], $ped[14]);
            array_push($tablaPedidos, $p);
        }

        return $tablaPedidos;
    }

    public function getPedidosNoFacturados()
    {
        try {
            $consulta = "SELECT * FROM pedidos WHERE facturado=0";
            $query = $this->db->preparar($consulta);
            $query->execute();
            $tPedidos = $query->fetchAll();
        } catch (Exception $e) {
            echo "Se ha producido un error";
        }

        $tablaPedidos = array();
        foreach ($tPedidos as $ped) {
            $p = new Pedido($ped[0], $ped[1], $ped[2], $ped[3], $ped[4], $ped[5], $ped[6], $ped[7], $ped[8], $ped[9], $ped[10], $ped[11], $ped[12], $ped[13], $ped[14]);
            array_push($tablaPedidos, $p);
        }

        return $tablaPedidos;
    }

    public function getPedidosEntreFechas($fechaInicio, $fechaFin)
    {
        try {
            $consulta = "SELECT * FROM pedidos WHERE fecha_pedido >= '$fechaInicio' AND fecha_pedido <= '$fechaFin'";
            $query = $this->db->preparar($consulta);
            $query->execute();
            $tPedidos = $query->fetchAll();
        } catch (Exception $e) {
            echo "Se ha producido un error";
        }

        $tablaPedidos = array();
        foreach ($tPedidos as $ped) {
            $p = new Pedido($ped[0], $ped[1], $ped[2], $ped[3], $ped[4], $ped[5], $ped[6], $ped[7], $ped[8], $ped[9], $ped[10], $ped[11], $ped[12], $ped[13], $ped[14]);
            array_push($tablaPedidos, $p);
        }

        return $tablaPedidos;
    }

    public function getPedidosPorCliente($idCliente)
    {
        try {
            $consulta = "SELECT * FROM pedidos WHERE id_cliente = '$idCliente'";
            $query = $this->db->preparar($consulta);
            $query->execute();
            $tPedidos = $query->fetchAll();
        } catch (Exception $e) {
            echo "Se ha producido un error";
        }

        $tablaPedidos = array();
        foreach ($tPedidos as $ped) {
            $p = new Pedido($ped[0], $ped[1], $ped[2], $ped[3], $ped[4], $ped[5], $ped[6], $ped[7], $ped[8], $ped[9], $ped[10], $ped[11], $ped[12], $ped[13], $ped[14]);
            array_push($tablaPedidos, $p);
        }

        return $tablaPedidos;
    }
    
    public function getPedidosPendientesCliente($idCliente)
    {
        try {
            $consulta = "SELECT * FROM pedidos WHERE id_cliente = '$idCliente' AND fecha_entrega='0000-00-00'";
            $query = $this->db->preparar($consulta);
            $query->execute();
            $tPedidos = $query->fetchAll();
        } catch (Exception $e) {
            echo "Se ha producido un error";
        }

        $tablaPedidos = array();
        foreach ($tPedidos as $ped) {
            $p = new Pedido($ped[0], $ped[1], $ped[2], $ped[3], $ped[4], $ped[5], $ped[6], $ped[7], $ped[8], $ped[9], $ped[10], $ped[11], $ped[12], $ped[13], $ped[14]);
            array_push($tablaPedidos, $p);
        }

        return $tablaPedidos;
    }
    
    public function facturarPedido($idPedido){
        $facturado = false;
        try {
            $consulta = "UPDATE pedidos SET facturado = 1 WHERE id_pedido = '$idPedido'";
            $query = $this->db->preparar($consulta);
            $query->execute();
            $facturado = true;
        } catch (Exception $e) {
            echo "Se ha producido un error";
        }
        return $facturado;
    }
    

    public function getPedidosFacturadosCliente($idCliente)
    {
        try {
            $consulta = "SELECT * FROM pedidos WHERE id_cliente = '$idCliente' AND facturado=1";
            $query = $this->db->preparar($consulta);
            $query->execute();
            $tPedidos = $query->fetchAll();
        } catch (Exception $e) {
            echo "Se ha producido un error";
        }

        $tablaPedidos = array();
        foreach ($tPedidos as $ped) {
            $p = new Pedido($ped[0], $ped[1], $ped[2], $ped[3], $ped[4], $ped[5], $ped[6], $ped[7], $ped[8], $ped[9], $ped[10], $ped[11], $ped[12], $ped[13], $ped[14]);
            array_push($tablaPedidos, $p);
        }

        return $tablaPedidos;
    }

    public function getPedidosServidosCliente($idCliente)
    {
        try {
            $consulta = "SELECT * FROM pedidos WHERE id_cliente = '$idCliente' AND fecha_entrega!='0000-00-00'";
            $query = $this->db->preparar($consulta);
            $query->execute();
            $tPedidos = $query->fetchAll();
        } catch (Exception $e) {
            echo "Se ha producido un error";
        }

        $tablaPedidos = array();
        foreach ($tPedidos as $ped) {
            $p = new Pedido($ped[0], $ped[1], $ped[2], $ped[3], $ped[4], $ped[5], $ped[6], $ped[7], $ped[8], $ped[9], $ped[10], $ped[11], $ped[12], $ped[13], $ped[14]);
            array_push($tablaPedidos, $p);
        }

        return $tablaPedidos;
    }

    public function getPedidoByCodigo($idPedido)
    {
        try {
            $consulta = "SELECT * FROM pedidos WHERE id_pedido = '$idPedido'";
            $query = $this->db->preparar($consulta);
            $query->execute();
            $tPedidos = $query->fetchAll();
        } catch (Exception $e) {
            echo "Se ha producido un error";
        }

        $tablaPedidos = array();
        foreach ($tPedidos as $ped) {
            $p = new Pedido($ped[0], $ped[1], $ped[2], $ped[3], $ped[4], $ped[5], $ped[6], $ped[7], $ped[8], $ped[9], $ped[10], $ped[11], $ped[12], $ped[13], $ped[14]);
            array_push($tablaPedidos, $p);
        }

        return $tablaPedidos;
    }

    public function getPedidosPorEmpleadoEmpaqueta($idEmpleadoEmpaqueta)
    {
        try {
            $consulta = "SELECT * FROM pedidos WHERE id_empleado_empaqueta = '$idEmpleadoEmpaqueta'";
            $query = $this->db->preparar($consulta);
            $query->execute();
            $tPedidos = $query->fetchAll();
        } catch (Exception $e) {
            echo "Se ha producido un error";
        }

        $tablaPedidos = array();
        foreach ($tPedidos as $ped) {
            $p = new Pedido($ped[0], $ped[1], $ped[2], $ped[3], $ped[4], $ped[5], $ped[6], $ped[7], $ped[8], $ped[9], $ped[10], $ped[11], $ped[12], $ped[13], $ped[14]);
            array_push($tablaPedidos, $p);
        }

        return $tablaPedidos;
    }

    public function getPedidosPorEmpresaTransporte($idEmpresaTransporte)
    {
        try {
            $consulta = "SELECT * FROM pedidos WHERE id_empresa_transporte = '$idEmpresaTransporte'";
            $query = $this->db->preparar($consulta);
            $query->execute();
            $tPedidos = $query->fetchAll();
        } catch (Exception $e) {
            echo "Se ha producido un error";
        }

        $tablaPedidos = array();
        foreach ($tPedidos as $ped) {
            $p = new Pedido($ped[0], $ped[1], $ped[2], $ped[3], $ped[4], $ped[5], $ped[6], $ped[7], $ped[8], $ped[9], $ped[10], $ped[11], $ped[12], $ped[13], $ped[14]);
            array_push($tablaPedidos, $p);
        }

        return $tablaPedidos;
    }

    public function getCodigosEmpresaTransporte()
    {
        try {
            $consulta = "SELECT id_empresa_transporte FROM pedidos";
            $query = $this->db->preparar($consulta);
            $query->execute();
            $tPedidos = $query->fetchAll();
        } catch (Exception $e) {
            echo "Se ha producido un error";
        }
        $tablaPedidos = array();
        foreach ($tPedidos as $p) {
            foreach($p as $pS){
                array_push($tablaPedidos, $pS);
            }      
        }
        return array_unique($tablaPedidos);
    }

     public function getUnPedido($idPedido)
    {
        try {
            $consulta = "SELECT * FROM pedidos where id_pedido='$idPedido'";
            $query = $this->db->preparar($consulta);
            $query->execute();
            $tPedidos = $query->fetchAll();
        } catch (Exception $e) {
            echo "Se ha producido un error";
        }

        $tablaPedidos = array();
        foreach ($tPedidos as $ped) {
            $p = new Pedido($ped[0], $ped[1], $ped[2], $ped[3], $ped[4], $ped[5], $ped[6], $ped[7], $ped[8], $ped[9], $ped[10], $ped[11], $ped[12], $ped[13], $ped[14]);
            array_push($tablaPedidos, $p);
        }

        return $tablaPedidos[0];
    }


    public function contarPedidos($anio){
            //Devolvemos un número que representa el número de productos que tenemos en la
            try {
                $consulta="SELECT * FROM pedidos WHERE fecha_pedido LIKE '$anio%'";
                
                $query=$this->db->preparar($consulta);
                $query->execute();
                
                $tPedido = $query->fetchAll();
                //obtiene todas las tuplas de la tabla clientes
                //y devuelve el array $tClientes
            } catch (Exception $e) {
                echo "Se ha producido un error";
            }
            return count($tPedido);
    }

    public function addPedido(Pedido $c)
    {
        try {
            $consulta = "INSERT INTO pedidos (id, id_pedido, id_empleado_empaqueta, id_empresa_transporte, fecha_pedido, fecha_envio, fecha_entrega, facturado, id_factura, fecha_factura, pagado, fecha_pago, metodo_pago, id_cliente, activo) values (null,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

            $query = $this->db->preparar($consulta);
            @$query->bindParam(1, $c->getIdPedido());
            @$query->bindParam(2, $c->getIdEmpleadoEmpaqueta());
            @$query->bindParam(3, $c->getIdEmpresaTransporte());
            @$query->bindParam(4, $c->getFechaPedido());
            @$query->bindParam(5, $c->getFechaEnvio());
            @$query->bindParam(6, $c->getFechaEntrega());
            @$query->bindParam(7, $c->getFacturado());
            @$query->bindParam(8, $c->getIdFactura());
            @$query->bindParam(9, $c->getFechaFactura());
            @$query->bindParam(10, $c->getPagado());
            @$query->bindParam(11, $c->getFechaPago());
            @$query->bindParam(12, $c->getMetodoPago());
            @$query->bindParam(13, $c->getIdCliente());
            @$query->bindParam(14, $c->getActivo());
            $query->execute();
            $insertado = true;
        } catch (Exception $e) {
            echo "Se ha producido un error";
            $insertado = false;
        }
        return $insertado;
    }
}
