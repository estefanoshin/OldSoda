<?php
class Movimiento extends Articulo
{
	private $movID;
	private $fechaMov;
	private $tipoMov; //Enrada o Salida
	private $cantMov;
	private $tallesMov;
    private $origen; //Soda o Taller o Cliente
    private $destino; //Soda o Taller o Cliente

	private $nombColor;
	private $tallerID;
	private $clientID;


    public function getMovID()
    {
        return $this->movID;
    }
    public function setMovID($movID)
    {
        $this->movID = $movID;
    }
    public function getFechaMov()
    {
        return $this->fechaMov;
    }
    public function setFechaMov($fechaMov)
    {
        $this->fechaMov = $fechaMov;
    }
    public function getTipoMov()
    {
        return $this->tipoMov;
    }
    public function setTipoMov($tipoMov)
    {
        $this->tipoMov = $tipoMov;
    }
    public function getCantMov()
    {
        return $this->cantMov;
    }
    public function setCantMov($cantMov)
    {
        $this->cantMov = $cantMov;
    }
    public function getTallesMov()
    {
        return $this->destino;
    }
    public function setTallesMov($tallesMov)
    {
        $this->destino = $destino;
    }
    public function getDestino()
    {
        return $this->destinosMov;
    }
    public function setDestino($destino)
    {
        $this->destino = $destino;
    }


    public function getNombColor()
    {
        return $this->nombColor;
    }
    public function setNombColor($nombColor)
    {
        $this->nombColor = $nombColor;
    }
    public function getTallerID()
    {
        return $this->tallerID;
    }
    public function setTallerID($tallerID)
    {
        $this->tallerID = $tallerID;
    }
    public function getClientID()
    {
        return $this->clientID;
    }
    public function setClientID($clientID)
    {
        $this->clientID = $clientID;
    }

    //---------------------------------------------------------

    public function createMov($dato)
    {
        $link = Conexion::conectar();

        $sql = 
        "INSERT INTO `movimiento` (`fechaMov`, `tipoMov`, `cantMov`, `tallesMov`, `nombColor`, `tallerID`, `clientID`)
        VALUES (:fechaMov, :tipoMov, :cantMov, :tallesMov, :nombColor, :tallerID, :clientID);";

        $stmt = $link->prepare($sql);

        $stmt->bindValue(":fechaMov",$dato['fechaMov']);
        $stmt->bindValue(":tipoMov",$dato['tipoMov']);
        $stmt->bindValue(":cantMov",$dato['cantMov']);
        $stmt->bindValue(":tallesMov",$dato['tallesMov']);

        $stmt->bindValue(":nombColor",$dato['nombColor']);
        $stmt->bindValue(":tallerID",$dato['tallerID']);
        $stmt->bindValue(":clientID",$dato['clientID']);

        $stmt->execute();

        return true;
    }

    public function readMov()
    {
        $link = Conexion::conectar();

        $sql = "SELECT movID, fechaMov, tipoMov, cantMov, tallesMov, nombColor, tallerID, clientID FROM movimiento";
        $stmt = $link->prepare($sql);
        $stmt->execute();

        $listadoMov = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($stmt->rowCount() == 0)
        {
            echo  '<h2>No existen movimientos en la base de datos, por favor ingrese alguno</h2>';
            return $listadoMov;
        }
        else
        {
            return $listadoMov;
        }
    }
    
    public function updateMov($dato)
    {
        $link = Conexion::conectar();

        $sql =
        "UPDATE movimiento
        SET fechaMov = :fechaMov, tipoMov = :tipoMov, cantMov = :cantMov, tallesMov = :tallesMov, nombColor = :nombColor, tallerID = :tallerID, clientID = :clientID
        WHERE movID = :movID";
        $stmt = $link->prepare($sql);

        $stmt->bindValue(":fechaMov",$dato['fechaMov']);
        $stmt->bindValue(":tipoMov",$dato['tipoMov']);
        $stmt->bindValue(":cantMov",$dato['cantMov']);
        $stmt->bindValue(":tallesMov",$dato['tallesMov']);

        $stmt->bindValue(":nombColor",$dato['nombColor']);
        $stmt->bindValue(":tallerID",$dato['tallerID']);
        $stmt->bindValue(":clientID",$dato['clientID']);
        $stmt->bindValue(":movID",$dato['movID']);

        $stmt->execute();

        $stmt = $link->prepare($sql);

        return true;
    }

    public function deleteMov($id)
    {
        $link = Conexion::conectar();

        $sql = "DELETE FROM movimiento WHERE movID = :movID";
        $stmt = $link->prepare($sql);

        $stmt->bindValue(':movID', $id);

        $stmt->execute();

        $stmt = $link->prepare($sql);

        return true;
    }

    public function buscarMovPorID($id)
    {
        $link = Conexion::conectar();
        $sql = "SELECT movID, fechaMov, tipoMov, cantMov, tallesMov, nombColor, tallerID, clientID 
        FROM movimiento WHERE movID =".$id;

        $stmt = $link->prepare($sql);
        $stmt->execute();

        $datoMov = $stmt->fetch(PDO::FETCH_ASSOC);

        if($stmt->rowCount() == 0)
        {
            echo  '<h2>No existe movimiento en la base de Datos</h2>';
            return $datoMov;
        }
        else
        {
            return $datoMov;
        }
    }
}