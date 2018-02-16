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

    public function createTaller($dato)
    {
        $link = Conexion::conectar();
        $sql = "INSERT INTO `taller` (`nombTaller`) VALUES (:nombTaller);";
        $stmt = $link->prepare($sql);

        $stmt->bindValue(":nombTaller",$dato['nombTaller']);

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
    
    public function updateTaller($dato)
    {
        $link = Conexion::conectar();

        $sql = "UPDATE taller SET nombTaller = :nombTaller WHERE tallerID = :tallerID";
        $stmt = $link->prepare($sql);

        $stmt->bindValue(":nombTaller", $dato['nombTaller']);
        $stmt->bindValue(':tallerID', $dato['tallerID']);

        $stmt->execute();

        $stmt = $link->prepare($sql);

        return true;
    }

    public function deleteTaller($id)
    {
        $link = Conexion::conectar();

        $sql = "DELETE FROM taller WHERE tallerID = :tallerID";
        $stmt = $link->prepare($sql);

        $stmt->bindValue(':tallerID', $id);

        $stmt->execute();

        $stmt = $link->prepare($sql);

        return true;
    }
}