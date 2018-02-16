<?php
class Tela{
	private $telaID;
	private $nombTela;
	private $proveedTela;

    public function getTelaID()
    {
        return $this->telaID;
    }
    public function setTelaID($telaID)
    {
        $this->telaID = $telaID;
    }
    public function getNombTela()
    {
        return $this->nombTela;
    }
    public function setNombTela($nombTela)
    {
        $this->nombTela = $nombTela;
    }
    public function getProveedTela()
    {
        return $this->proveedTela;
    }
    public function setProveedTela($proveedTela)
    {
        $this->proveedTela = $proveedTela;
    }

    //---------------------------------------------------------

    public function createTela($dato)
    {
        $link = Conexion::conectar();
        $sql = "INSERT INTO `tela` (`nombTela`, `proveedTela`) VALUES (:nombTela, :proveedTela);";
        $stmt = $link->prepare($sql);

        $stmt->bindValue(":nombTela",$dato['nombTela']);
        $stmt->bindValue(":proveedTela",$dato['proveedTela']);

        $stmt->execute();

        return true;
    }

    public function readTela()
    {
        $link = Conexion::conectar();
        $sql = "SELECT telaID, nombTela, proveedTela FROM tela";
        $stmt = $link->prepare($sql);
        $stmt->execute();

        $listadoTelas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($stmt->rowCount() == 0)
        {
            echo  '<h2>No existen telas en la base de datos, por favor ingrese alguno</h2>';
            return $listadoTelas;
        }
        else
        {
            return $listadoTelas;
        }
    }
    
    public function updateTela($dato)
    {
        $link = Conexion::conectar();

        $sql = "UPDATE tela SET nombTela = :nombTela, proveedTela = :proveedTela WHERE telaID = :telaID";
        $stmt = $link->prepare($sql);

        $stmt->bindValue(":nombTela", $dato['nombTela']);
        $stmt->bindValue(':proveedTela', $dato['proveedTela']);
        $stmt->bindValue(':telaID', $dato['telaID']);

        $stmt->execute();

        $stmt = $link->prepare($sql);

        return true;
    }

    public function deleteTela($id) //---------------------
    {
        $link = Conexion::conectar();

        $sql = "DELETE FROM tela WHERE telaID = :telaID";
        $stmt = $link->prepare($sql);

        $stmt->bindValue(':telaID', $id);

        $stmt->execute();

        $stmt = $link->prepare($sql);

        return true;
    }

    public function buscarTelaPorID($id)
    {
        $link = Conexion::conectar();
        $sql = "SELECT nombTela, proveedTela FROM tela WHERE telaID = ".$id;
        $stmt = $link->prepare($sql);
        $stmt->execute();

        $datoTela = $stmt->fetch(PDO::FETCH_ASSOC);

        if($stmt->rowCount() == 0)
        {
            echo  '<h2>No existen modelo en la base de Datos</h2>';
            return $datoTela;
        }
        else
        {
            return $datoTela;
        }
    }
}