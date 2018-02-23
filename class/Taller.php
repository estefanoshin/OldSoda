<?php
class Taller{
	private $tallerID;
	private $nombTaller;

    public function getTallerID()
    {
        return $this->tallerID;
    }
    public function setTallerID($tallerID)
    {
        $this->tallerID = $tallerID;
    }
    public function getNombTaller()
    {
        return $this->nombTaller;
    }
    public function setNombTaller($nombTaller)
    {
        $this->nombTaller = $nombTaller;
    }

    //---------------------------------------------------------
    private function cargaDatosform()
    {
        if(isset($_POST['tallerID']))
        {
            $this->setTallerID($_POST['tallerID']);
        }
        if(isset($_POST['nombTaller']))
        {
            $this->setNombTaller($_POST['nombTaller']);
        }
    }

    public function createTaller()
    {
        $this->cargaDatosform();
        $link = Conexion::conectar();
        $sql = "INSERT INTO `taller` (`nombTaller`) VALUES (:nombTaller);";
        $stmt = $link->prepare($sql);

        $nombTaller = $this->getNombTaller();

        $stmt->bindParam(":nombTaller",$nombTaller,PDO::PARAM_STR);

        $stmt->execute();

        return true;
    }

    public function readTaller()
    {
        $link = Conexion::conectar();
        $sql = "SELECT tallerID, nombTaller FROM taller";
        $stmt = $link->prepare($sql);
        $stmt->execute();

        $listadoTalleres = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($stmt->rowCount() == 0)
        {
            echo  '<h2>No existen talleres en la base de datos, por favor ingrese alguno</h2>';
            return $listadoTalleres;
        }
        else
        {
            return $listadoTalleres;
        }
    }
    
    public function updateTaller()
    {
        $this->cargaDatosform();
        $link = Conexion::conectar();

        $sql = "UPDATE taller SET nombTaller = :nombTaller WHERE tallerID = :tallerID";
        $stmt = $link->prepare($sql);

        $nombTaller = $this->getNombTaller();
        $tallerID = $this->getTallerID();

        $stmt->bindParam(":nombTaller",$nombTaller,PDO::PARAM_STR);
        $stmt->bindParam(":tallerID",$tallerID,PDO::PARAM_INT);

        $stmt->execute();

        return true;
    }

    public function deleteTaller()
    {
        $link = Conexion::conectar();

        $sql = "DELETE FROM taller WHERE tallerID = :tallerID";
        $stmt = $link->prepare($sql);

        $stmt->bindParam(':tallerID', $_GET['tallerID'],PDO::PARAM_INT);

        $stmt->execute();

        return true;
    }

    public function buscarTallerPorID(){

        $link = Conexion::conectar();
        $sql = "SELECT nombTaller FROM taller WHERE tallerID = :tallerID";
        $stmt = $link->prepare($sql);

        if(isset($_GET['tallerID']))
        {
            $stmt->bindParam(':tallerID',$_GET['tallerID'],PDO::PARAM_INT);
        }
        else
        {
        $tallerID = $this->gettallerID();
        $stmt->bindParam(':tallerID',$tallerID,PDO::PARAM_INT);
        }

        $stmt->execute();

        $datoTaller = $stmt->fetch(PDO::FETCH_ASSOC);

        if($stmt->rowCount() == 0)
        {
            echo  '<h2>No existen talleres en la base de Datos</h2>';
            return $datoTaller;
        }
        else
        {
            return $datoTaller;
        }
    }
}