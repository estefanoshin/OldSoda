<?php
class Entrada extends Articulo
{
	private $entradaID;
	private $fechaEntrada;
	private $cantEntrada;
	private $tallesEntrada;
    private $colorEntrada; //Soda o Taller o Cliente
    private $origen; //Soda o Taller o Cliente

    public function getEntradaID()
    {
        return $this->entradaID;
    }
    public function setEntradaID($entradaID)
    {
        $this->entradaID = $entradaID;
    }
    public function getFechaEntrada()
    {
        return $this->fechaEntrada;
    }
    public function setFechaEntrada($fechaEntrada)
    {
        $this->fechaEntrada = $fechaEntrada;
    }
    public function getCantEntrada()
    {
        return $this->cantEntrada;
    }
    public function setCantEntrada($cantEntrada)
    {
        $this->cantEntrada = $cantEntrada;
    }
    public function getTallesEntrada()
    {
        return $this->tallesEntrada;
    }
    public function setTallesEntrada($tallesEntrada)
    {
        $this->tallesEntrada = $tallesEntrada;
    }
    public function getColorEntrada()
    {
        return $this->colorEntrada;
    }
    public function setColorEntrada($colorEntrada)
    {
        $this->colorEntrada = $colorEntrada;
    }
    public function getOrigen()
    {
        return $this->origen;
    }
    public function setOrigen($origen)
    {
        $this->origen = $origen;
    }
    
    //---------------------------------------------------------
    private function cargaDatosform()
    {
        if(isset($_POST['entradaID']))
        {
            $this->setEntradaID($_POST['entradaID']);
        }
        if(isset($_POST['fechaEntrada']))
        {
            $this->setFechaEntrada($_POST['fechaEntrada']);
        }
        if(isset($_POST['cantEntrada']))
        {
            $this->setCantEntrada($_POST['cantEntrada']);
        }
        if(isset($_POST['tallesEntrada']))
        {
            $this->setTallesEntrada($_POST['tallesEntrada']);
        }
        if(isset($_POST['colorEntrada']))
        {
            $this->setColorEntrada($_POST['colorEntrada']);
        }
        if(isset($_POST['origen']))
        {
            $this->setOrigen($_POST['origen']);
        }
    }

    public function createEntrada()
    {
        $this->cargaDatosform();
        $link = Conexion::conectar();

        $sql = 
        "INSERT INTO `entrada` (`fechaEntrada`, `cantEntrada`, `tallesEntrada`, `colorEntrada`, `origen`)
        VALUES (:fechaEntrada, :cantEntrada, :tallesEntrada, :colorEntrada, :origen);";

        $stmt = $link->prepare($sql);

        $fechaEntrada = $this->getFechaEntrada();
        $cantEntrada = $this->getCantEntrada();
        $tallesEntrada = $this->getTallesEntrada();
        $colorEntrada = $this->getColorEntrada();
        $origen = $this->getOrigen();

        $stmt->bindParam(":fechaEntrada",$fechaEntrada,PDO::PARAM_STR);
        $stmt->bindParam(":cantEntrada",$cantEntrada,PDO::PARAM_INT);
        $stmt->bindParam(":tallesEntrada",$tallesEntrada,PDO::PARAM_STR);
        $stmt->bindParam(":colorEntrada",$colorEntrada,PDO::PARAM_STR);
        $stmt->bindParam(":origen",$origen,PDO::PARAM_STR);

        $stmt->execute();

        return true;
    }

    public function readEntrada()
    {
        $link = Conexion::conectar();

        $sql = "SELECT entradaID, fechaEntrada, cantEntrada, tallesEntrada, colorEntrada, origen FROM entrada";
        $stmt = $link->prepare($sql);
        $stmt->execute();

        $listadoEntrada = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($stmt->rowCount() == 0)
        {
            echo  '<h2>No existen entradas en la base de datos, por favor ingrese alguno</h2>';
            return $listadoEntrada;
        }
        else
        {
            return $listadoEntrada;
        }
    }
    
    public function updateEntrada()
    {
        $this->cargaDatosform();
        $link = Conexion::conectar();

        $sql =
        "UPDATE entrada
        SET fechaEntrada = :fechaEntrada, cantEntrada = :cantEntrada, tallesEntrada = :tallesEntrada, colorEntrada = :colorEntrada, origen = :origen WHERE entradaID = :entradaID";
        $stmt = $link->prepare($sql);

        $fechaEntrada = $this->getFechaEntrada();
        $cantEntrada = $this->getCantEntrada();
        $tallesEntrada = $this->getTallesEntrada();
        $colorEntrada = $this->getColorEntrada();
        $origen = $this->getOrigen();
        $entradaID = $this->getEntradaID();

        $stmt->bindParam(":fechaEntrada",$fechaEntrada,PDO::PARAM_STR);
        $stmt->bindParam(":cantEntrada",$cantEntrada,PDO::PARAM_INT);
        $stmt->bindParam(":tallesEntrada",$tallesEntrada,PDO::PARAM_STR);
        $stmt->bindParam(":colorEntrada",$colorEntrada,PDO::PARAM_STR);
        $stmt->bindParam(":origen",$origen,PDO::PARAM_STR);
        $stmt->bindParam(":entradaID",$entradaID,PDO::PARAM_INT);

        $stmt->execute();

        return true;
    }

    public function deleteEntrada()
    {
        $this->cargaDatosform();
        $link = Conexion::conectar();

        $sql = "DELETE FROM entrada WHERE entradaID = :entradaID";
        $stmt = $link->prepare($sql);

        $stmt->bindParam(':entradaID', $_GET['entradaID'], PDO::PARAM_INT);

        $stmt->execute();

        $stmt = $link->prepare($sql);

        return true;
    }

}