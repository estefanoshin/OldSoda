<?php
class Corte{
	private $corteID;
	private $nc;
	private $fechaCorte;
	private $temporada;
    private $cantidad;

	private $artID;

    public function getCorteID()
    {
        return $this->corteID;
    }
    public function setCorteID($corteID)
    {
        $this->corteID = $corteID;
    }
    public function getNc()
    {
        return $this->nc;
    }
    public function setNc($nc)
    {
        $this->nc = $nc;
    }
    public function getFechaCorte()
    {
        return $this->fechaCorte;
    }
    public function setFechaCorte($fechaCorte)
    {
        $this->fechaCorte = $fechaCorte;
    }
    public function getTemporada()
    {
        return $this->temporada;
    }
    public function setTemporada($temporada)
    {
        $this->temporada = $temporada;
    }
    public function getCantidad()
    {
        return $this->cantidad;
    }
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }


    public function getArtID()
    {
        return $this->artID;
    }
    public function setArtID($artID)
    {
        $this->artID = $artID;
    }

    //---------------------------------------------------------

    private function cargaDatosform()
    {
        if(isset($_POST['corteID']))
        {
            $this->setCorteID($_POST['corteID']);
        }
        if(isset($_POST['nc']))
        {
            $this->setNc($_POST['nc']);
        }
        if(isset($_POST['fechaCorte']))
        {
            $this->setFechaCorte($_POST['fechaCorte']);
        }
        if(isset($_POST['temporada']))
        {
            $this->setTemporada($_POST['temporada']);
        }
        if(isset($_POST['cantidad']))
        {
            $this->setCantidad($_POST['cantidad']);
        }
        if(isset($_POST['artID']))
        {
            $this->setArtID($_POST['artID']);
        }           
    }

    public function createCorte()
    {
        $this->cargaDatosform();
        $link = Conexion::conectar();

        $sql = 
        "INSERT INTO corte (nc, fechaCorte, temporada, cantidad, artID)
        VALUES (:nc, :fechaCorte, :temporada, :artID);";

        $stmt = $link->prepare($sql);

        $nc = $this->getNc();
        $fechaCorte = $this->getFechaCorte();
        $temporada = $this->getTemporada();
        $cantidad = $this->getCantidad();
        $artID = $this->getArtID();

        $stmt->bindParam(":nc",$nc,PDO::PARAM_STR);
        $stmt->bindParam(":fechaCorte",$fechaCorte,PDO::PARAM_STR);
        $stmt->bindParam(":temporada",$temporada,PDO::PARAM_STR);
        $stmt->bindParam(":cantidad",$cantidad,PDO::PARAM_INT);

        $stmt->bindParam(":artID",$artID,PDO::PARAM_INT);

        $stmt->execute();

        return $true;
    }

    public function readCorte()
    {
        $link = Conexion::conectar();
        $sql = "SELECT corteID, nc, fechaCorte, temporada, cantidad, artID FROM corte";
        $stmt = $link->prepare($sql);
        $stmt->execute();

        $listadoCorte = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($stmt->rowCount() == 0)
        {
            echo  '<h2>No existen cortes en la base de datos, por favor ingrese alguno</h2>';
            return $listadoCorte;
        }
        else
        {
            return $listadoCorte;
        }
    }
    
    public function updateCorte()
    {
        $this->cargaDatosform();
        $link = Conexion::conectar();

        $sql =
        "UPDATE corte
        SET nc = :nc, fechaCorte = :fechaCorte, temporada = :temporada, cantidad = :cantidad, artID = :artID
        WHERE corteID = :corteID";
        $stmt = $link->prepare($sql);

        $nc = $this->getNc();
        $fechaCorte = $this->getFechaCorte();
        $temporada = $this->getTemporada();
        $cantidad = $this->getCantidad();
        $artID = $this->getArtID();
        $corteID = $this->getCorteID();

        $stmt->bindParam(":nc",$nc,PDO::PARAM_STR);
        $stmt->bindParam(":fechaCorte",$fechaCorte,PDO::PARAM_STR);
        $stmt->bindParam(":temporada",$temporada,PDO::PARAM_STR);
        $stmt->bindParam(":cantidad",$cantidad,PDO::PARAM_INT);

        $stmt->bindParam(":artID",$artID,PDO::PARAM_INT);
        $stmt->bindParam(":corteID",$corteID,PDO::PARAM_INT);

        $stmt->execute();

        return true;
    }

    public function deleteCorte()
    {
        $link = Conexion::conectar();

        $sql = "DELETE FROM corte WHERE corteID = :corteID";
        $stmt = $link->prepare($sql);

        $stmt->bindParam(':corteID', $_GET['corteID']);

        $stmt->execute();

        return true;
    }

    public function buscarCortePorID()
    {

        $link = Conexion::conectar();
        $sql = "SELECT corteID, nc, fechaCorte, temporada, cantidad, artID FROM corte WHERE corteID = :corteID";
        $stmt = $link->prepare($sql);

        if(isset($_GET['corteID']))
        {
            $this->setCorteID($_GET['corteID']);
            $stmt->bindParam(':corteID',$_GET['corteID'],PDO::PARAM_INT);
        }
        else
        {
            $corteID = $this->getCorteID();
            $stmt->bindParam(':corteID',$corteID,PDO::PARAM_INT);
        }

        $stmt->execute();

        $datoCorte = $stmt->fetch(PDO::FETCH_ASSOC);

        if($stmt->rowCount() == 0)
        {
            echo  '<h2>No existen Cortes en la base de Datos</h2>';
            return $datoCorte;
        }
        else
        {
            return $datoCorte;
        }
    }

    public function buscarCorte()
    {
        $this->cargaDatosform();
        $link = Conexion::conectar();
        $sql = "SELECT DISTINCT nc FROM corte";
        $stmt = $link->prepare($sql);

        $stmt->execute();

        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $datos;
    }

    public function buscarArtPorCorte()
    {
        $this->cargaDatosform();
        $link = Conexion::conectar();
        $sql = "SELECT DISTINCT artID FROM corte";
        $stmt = $link->prepare($sql);

        $stmt->execute();

        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $datos;
    }
}