<?php
class Entrada extends Articulo
{
	private $entradaID;
	private $fechaEntrada;
	private $cantEntrada;
	private $tallesEntrada;
    private $colorEntrada;
    private $origen;
    private $origenName;
    private $corteID;
    private $articuloID;

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
    public function getOrigenName()
    {
        return $this->origenName;
    }
    public function setOrigenName($origenName)
    {
        $this->origenName = $origenName;
    }
    public function getArticuloID()
    {
        return $this->articuloID;
    }
    public function setArticuloID($articuloID)
    {
        $this->articuloID = $articuloID;
    }
    public function getCorteID()
    {
        return $this->corteID;
    }
    public function setCorteID($corteID)
    {
        $this->corteID = $corteID;
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
        if(isset($_POST['origenName']))
        {
            $this->setOrigenName($_POST['origenName']);
        }
        if(isset($_POST['corteID']))
        {
            $this->setCorteID($_POST['corteID']);
        }
        if(isset($_POST['articuloID']))
        {
            $this->setArticuloID($_POST['articuloID']);
        }
    }

    public function createEntrada()
    {
        $this->cargaDatosform();
        $link = Conexion::conectar();

        $sql = 
        "INSERT INTO entrada (fechaEntrada, cantEntrada, tallesEntrada, colorEntrada, origen, origenName, corteID, articuloID)
        VALUES (:fechaEntrada, :cantEntrada, :tallesEntrada, :colorEntrada, :origen, :origenName, :corteID, :articuloID);";

        $stmt = $link->prepare($sql);

        $fechaEntrada = $this->getFechaEntrada();
        $cantEntrada = $this->getCantEntrada();
        $tallesEntrada = $this->getTallesEntrada();
        $colorEntrada = $this->getColorEntrada();
        $origen = $this->getOrigen();
        $origenName = $this->getOrigenName();
        $corteID = $this->getCorteID();
        $articuloID = $this->getArticuloID();

        $stmt->bindParam(":fechaEntrada",$fechaEntrada,PDO::PARAM_STR);
        $stmt->bindParam(":cantEntrada",$cantEntrada,PDO::PARAM_INT);
        $stmt->bindParam(":tallesEntrada",$tallesEntrada,PDO::PARAM_STR);
        $stmt->bindParam(":colorEntrada",$colorEntrada,PDO::PARAM_STR);
        $stmt->bindParam(":origen",$origen,PDO::PARAM_STR);
        $stmt->bindParam(":origenName",$origenName,PDO::PARAM_STR);
        $stmt->bindParam(":corteID",$corteID,PDO::PARAM_INT);
        $stmt->bindParam(":articuloID",$articuloID,PDO::PARAM_INT);

        $stmt->execute();

        return true;
    }

    public function readEntrada()
    {
        $link = Conexion::conectar();

        $sql = "SELECT entradaID, fechaEntrada, cantEntrada, tallesEntrada, colorEntrada, origen, origenName, corteID, articuloID FROM entrada";
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
        SET fechaEntrada = :fechaEntrada, cantEntrada = :cantEntrada, tallesEntrada = :tallesEntrada, colorEntrada = :colorEntrada, origen = :origen, origenName = :origenName, corteID = :corteID, articuloID = :articuloID  WHERE entradaID = :entradaID";
        $stmt = $link->prepare($sql);

        $fechaEntrada = $this->getFechaEntrada();
        $cantEntrada = $this->getCantEntrada();
        $tallesEntrada = $this->getTallesEntrada();
        $colorEntrada = $this->getColorEntrada();
        $origen = $this->getOrigen();
        $origenName = $this->getOrigenName();
        $corteID = $this->getCorteID();
        $articuloID = $this->getArticuloID();
        $entradaID = $this->getEntradaID();

        $stmt->bindParam(":fechaEntrada",$fechaEntrada,PDO::PARAM_STR);
        $stmt->bindParam(":cantEntrada",$cantEntrada,PDO::PARAM_INT);
        $stmt->bindParam(":tallesEntrada",$tallesEntrada,PDO::PARAM_STR);
        $stmt->bindParam(":colorEntrada",$colorEntrada,PDO::PARAM_STR);
        $stmt->bindParam(":origen",$origen,PDO::PARAM_STR);
        $stmt->bindParam(":origenName",$origenName,PDO::PARAM_STR);
        $stmt->bindParam(":corteID",$corteID,PDO::PARAM_INT);
        $stmt->bindParam(":articuloID",$articuloID,PDO::PARAM_INT);
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

    public function buscarEntradaPorID()
    {
        $link = Conexion::conectar();
        $sql = "SELECT fechaEntrada, cantEntrada, tallesEntrada, colorEntrada, origen, origenName, corteID, articuloID FROM entrada WHERE entradaID = :entradaID";

        $stmt = $link->prepare($sql);

        if(isset($_GET['entradaID']))
        {
            $this->setArtID($_GET['entradaID']);
            $stmt->bindParam(':entradaID',$_GET['entradaID'],PDO::PARAM_INT);
        }
        else
        {
            $entradaID = $this->getArtID();
            $stmt->bindParam(':entradaID',$entradaID,PDO::PARAM_INT);
        }

        $stmt->execute();

        $datoEntrada = $stmt->fetch(PDO::FETCH_ASSOC);

        if($stmt->rowCount() == 0)
        {
            echo  '<h2>No existe entrada en la Base de Datos</h2>';
            return $datoEntrada;
        }
        else
        {
            return $datoEntrada;
        }
    }

    public function mostrarNombreOrigen($nombre,$id)
    {
        if($nombre == 'cliente')
        {
            $obj = new Cliente();
            $obj->setClientID($id);
            $dato = $obj->buscarClientePorID();
            return $dato['nombClient'];
        }
        if($nombre == 'taller')
        {
            $obj = new Taller();
            $obj->setTallerID($id);
            $dato = $obj->buscarTallerPorID();
            return $dato['nombTaller'];
        }
        if($nombre != 'cliente' && $nombre != 'taller')
        {
            return 'error';
        }
    }

    public function mostrarNombreArticulo($artID)
    {
        if(isset($artID))
        {
            $obj = new Articulo();
            $obj->setArtID($artID);
            $dato = $obj->buscarArtPorID();
            return $dato['art'];
        }
    }
}