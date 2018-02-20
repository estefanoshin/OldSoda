<?php
class Corte{
	private $corteID;
	private $nc;
	private $fechaCorte;
	private $temporada;

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
        if(isset($corteID))
        {
            $this->setCorteID($_POST['corteID']);
        }
        if(isset($nc))
        {
            $this->setNc($_POST['nc']);
        }
        if(isset($fechaCorte))
        {
            $this->setFechaCorte($_POST['fechaCorte']);
        }
        if(isset($temporada))
        {
            $this->setTemporada($_POST['temporada']);
        }
        if(isset($artID))
        {
            $this->setArtID($_POST['artID']);
        }           
    }

    public function createCorte($dato)
    {
        $link = Conexion::conectar();

        $sql = 
        "INSERT INTO `corte` (`nc`, `fechaCorte`, `temporada`, `artID`, `telaID`)
        VALUES (:nc, :fechaCorte, :temporada, :artID, :telaID);";

        $stmt = $link->prepare($sql);

        $stmt->bindValue(":nc",$dato['nc']);
        $stmt->bindValue(":fechaCorte",$dato['fechaCorte']);
        $stmt->bindValue(":temporada",$dato['temporada']);

        $stmt->bindValue(":artID",$dato['artID']);
        $stmt->bindValue(":telaID",$dato['telaID']);

        $stmt->execute();

        return true;
    }

    public function readCorte()
    {
        $link = Conexion::conectar();
        $sql = "SELECT corteID, nc, fechaCorte, temporada, artID, telaID FROM corte";
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
    
    public function updateCorte($dato)
    {
        $this->cargaDatosform();
        $link = Conexion::conectar();

        $sql =
        "UPDATE corte
        SET nc = :nc, fechaCorte = :fechaCorte, temporada = :temporada, artID = :artID, telaID = :telaID
        WHERE corteID = :corteID";
        $stmt = $link->prepare($sql);

        $stmt->bindValue(":corteID",$corteID=$this->getCorteID());
        $stmt->bindValue(":nc",$nc=$this->getNc());
        $stmt->bindValue(":fechaCorte",$fechaCorte=$this->getFechaCorte());
        $stmt->bindValue(":temporada",$temporada=$this->getTemporada());

        $stmt->bindValue(":artID",$artID=$this->getArtID());

        $stmt->execute();

        $stmt = $link->prepare($sql);

        return true;
    }

    public function deleteCorte($id)
    {
        $link = Conexion::conectar();

        $sql = "DELETE FROM corte WHERE corteID = :corteID";
        $stmt = $link->prepare($sql);

        $stmt->bindValue(':corteID', $id);

        $stmt->execute();

        $stmt = $link->prepare($sql);

        return true;
    }
}