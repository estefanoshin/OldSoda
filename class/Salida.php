<?php
class salida extends Articulo
{
	private $salidaID;
	private $fechaSalida;
	private $cantSalida;
	private $tallesSalida;
    private $colorSalida;
    private $destino;
    private $destinoName;
    private $corteID;
    private $articuloID;

    public function getSalidaID()
    {
        return $this->salidaID;
    }
    public function setSalidaID($salidaID)
    {
        $this->salidaID = $salidaID;
    }
    public function getFechaSalida()
    {
        return $this->fechaSalida;
    }
    public function setFechaSalida($fechaSalida)
    {
        $this->fechaSalida = $fechaSalida;
    }
    public function getCantSalida()
    {
        return $this->cantSalida;
    }
    public function setCantSalida($cantSalida)
    {
        $this->cantSalida = $cantSalida;
    }
    public function getTallesSalida()
    {
        return $this->tallesSalida;
    }
    public function setTallesSalida($tallesSalida)
    {
        $this->tallesSalida = $tallesSalida;
    }
    public function getColorSalida()
    {
        return $this->colorSalida;
    }
    public function setColorSalida($colorSalida)
    {
        $this->colorSalida = $colorSalida;
    }
    public function getDestino()
    {
        return $this->destino;
    }
    public function setDestino($destino)
    {
        $this->destino = $destino;
    }
        public function getDestinoName()
    {
        return $this->destinoName;
    }
    public function setDestinoName($destinoName)
    {
        $this->destinoName = $destinoName;
    }

    public function getCorteID()
    {
        return $this->corteID;
    }
    public function setCorteID($corteID)
    {
        $this->corteID = $corteID;
    }

    public function getArticuloID()
    {
        return $this->articuloID;
    }
    public function setArticuloID($articuloID)
    {
        $this->articuloID = $articuloID;
    }
    
    //---------------------------------------------------------
    private function cargaDatosform()
    {
        if(isset($_POST['salidaID']))
        {
            $this->setSalidaID($_POST['salidaID']);
        }
        if(isset($_POST['fechaSalida']))
        {
            $this->setFechaSalida($_POST['fechaSalida']);
        }
        if(isset($_POST['cantSalida']))
        {
            $this->setCantSalida($_POST['cantSalida']);
        }
        if(isset($_POST['tallesSalida']))
        {
            $this->setTallesSalida($_POST['tallesSalida']);
        }
        if(isset($_POST['colorSalida']))
        {
            $this->setColorSalida($_POST['colorSalida']);
        }
        if(isset($_POST['destino']))
        {
            $this->setDestino($_POST['destino']);
        }
        if(isset($_POST['destinoName']))
        {
            $this->setDestinoName($_POST['destinoName']);
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

    public function createSalida()
    {
        $this->cargaDatosform();
        $link = Conexion::conectar();

        $sql = 
        "INSERT INTO salida (fechaSalida, cantSalida, tallesSalida, colorSalida, destino, destinoNombre, corteID, articuloID)
        VALUES (:fechaSalida, :cantSalida, :tallesSalida, :colorSalida, :destino, :destinoName, :corteID, :articuloID);";

        $stmt = $link->prepare($sql);

        $fechaSalida = $this->getFechaSalida();
        $cantSalida = $this->getCantSalida();
        $tallesSalida = $this->getTallesSalida();
        $colorSalida = $this->getColorSalida();
        $destino = $this->getDestino();
        $destinoID = $this->getDestinoName();
        $corteID = $this->getCorteID();
        $articuloID = $this->getArticuloID();

        $stmt->bindParam(":fechaSalida",$fechaSalida,PDO::PARAM_STR);
        $stmt->bindParam(":cantSalida",$cantSalida,PDO::PARAM_INT);
        $stmt->bindParam(":tallesSalida",$tallesSalida,PDO::PARAM_STR);
        $stmt->bindParam(":colorSalida",$colorSalida,PDO::PARAM_STR);
        $stmt->bindParam(":destino",$destino,PDO::PARAM_STR);
        $stmt->bindParam(":destinoName",$destinoID,PDO::PARAM_STR);
        $stmt->bindParam(":corteID",$corteID,PDO::PARAM_INT);
        $stmt->bindParam(":articuloID",$articuloID,PDO::PARAM_INT);

        $stmt->execute();

        return true;
    }

    public function readSalida()
    {
        $link = Conexion::conectar();

        $sql = "SELECT salidaID, fechaSalida, cantSalida, tallesSalida, colorSalida, destino, destinoName, corteID, articuloID FROM salida";

        $stmt = $link->prepare($sql);
        $stmt->execute();

        $listadosalida = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($stmt->rowCount() == 0)
        {
            echo  '<h2>No existen salidas en la base de datos, por favor ingrese alguno</h2>';
            return $listadosalida;
        }
        else
        {
            return $listadosalida;
        }
    }
    
    public function updateSalida()
    {
        $this->cargaDatosform();
        $link = Conexion::conectar();

        $sql =
        "UPDATE salida
        SET fechaSalida = :fechaSalida, cantSalida = :cantSalida, tallesSalida = :tallesSalida, colorSalida = :colorSalida, destino = :destino, destinoName = :destinoName, corteID = :corteID, articuloID = :articuloID  WHERE salidaID = :salidaID";
        $stmt = $link->prepare($sql);

        $fechaSalida = $this->getFechaSalida();
        $cantSalida = $this->getCantSalida();
        $tallesSalida = $this->getTallesSalida();
        $colorSalida = $this->getColorSalida();
        $destino = $this->getDestino();
        $destinoName = $this->getDestinoName();
        $corteID = $this->getCorteID();
        $articuloID = $this->getArticuloID();
        $salidaID = $this->getSalidaID();

        $stmt->bindParam(":fechaSalida",$fechaSalida,PDO::PARAM_STR);
        $stmt->bindParam(":cantSalida",$cantSalida,PDO::PARAM_INT);
        $stmt->bindParam(":tallesSalida",$tallesSalida,PDO::PARAM_STR);
        $stmt->bindParam(":colorSalida",$colorSalida,PDO::PARAM_STR);
        $stmt->bindParam(":destino",$destino,PDO::PARAM_STR);
        $stmt->bindParam(":destinoName",$destinoName,PDO::PARAM_STR);
        $stmt->bindParam(":corteID",$corteID,PDO::PARAM_INT);
        $stmt->bindParam(":articuloID",$articuloID,PDO::PARAM_INT);
        $stmt->bindParam(":salidaID",$salidaID,PDO::PARAM_INT);

        $stmt->execute();
        return true;
    }

    public function deleteSalida()
    {
        $this->cargaDatosform();
        $link = Conexion::conectar();

        $sql = "DELETE FROM salida WHERE salidaID = :salidaID";
        $stmt = $link->prepare($sql);

        $stmt->bindParam(':salidaID', $_GET['salidaID'], PDO::PARAM_INT);

        $stmt->execute();

        $stmt = $link->prepare($sql);

        return true;
    }

    public function buscarSalidaPorID()
    {
        $link = Conexion::conectar();
        $sql = "SELECT fechaSalida, cantSalida, tallesSalida, colorSalida, destino, destinoName, corteID, articuloID FROM salida WHERE salidaID = :salidaID";

        $stmt = $link->prepare($sql);

        if(isset($_GET['salidaID']))
        {
            $this->setArtID($_GET['salidaID']);
            $stmt->bindParam(':salidaID',$_GET['salidaID'],PDO::PARAM_INT);
        }
        else
        {
            $salidaID = $this->getArtID();
            $stmt->bindParam(':salidaID',$salidaID,PDO::PARAM_INT);
        }

        $stmt->execute();

        $datosSalida = $stmt->fetch(PDO::FETCH_ASSOC);

        if($stmt->rowCount() == 0)
        {
            echo  '<h2>No existe salida en la Base de Datos</h2>';
            return $datosSalida;
        }
        else
        {
            return $datosSalida;
        }
    }

    public function mostrarNombreDestino($nombre,$id)
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