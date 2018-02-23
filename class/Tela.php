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
    private function cargaDatosform()
    {
        if(isset($_POST['telaID']))
        {
            $this->setTelaID($_POST['telaID']);
        }
        if(isset($_POST['nombTela']))
        {
            $this->setNombTela($_POST['nombTela']);
        }
        if(isset($_POST['proveedTela']))
        {
            $this->setProveedTela($_POST['proveedTela']);
        }
    }

    public function createTela()
    {
        $this->cargaDatosform();
        $link = Conexion::conectar();
        $sql = "INSERT INTO `tela` (`nombTela`, `proveedTela`) VALUES (:nombTela, :proveedTela);";
        $stmt = $link->prepare($sql);

        $nombTela = $this->getNombTela();
        $proveedTela = $this->getProveedTela();

        $stmt->bindParam(":nombTela",$nombTela,PDO::PARAM_STR);
        $stmt->bindParam(":proveedTela",$proveedTela,PDO::PARAM_STR);

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
    
    public function updateTela()
    {
        $this->cargaDatosform();
        $link = Conexion::conectar();

        $sql = "UPDATE tela SET nombTela = :nombTela, proveedTela = :proveedTela WHERE telaID = :telaID";
        $stmt = $link->prepare($sql);

        $nombTela = $this->getNombTela();
        $proveedTela = $this->getProveedTela();      
        $telaID = $this->getTelaID();

        $stmt->bindParam(":nombTela",$nombTela,PDO::PARAM_STR);
        $stmt->bindParam(':proveedTela',$proveedTela,PDO::PARAM_STR);
        $stmt->bindParam(':telaID',$telaID,PDO::PARAM_INT);

        $stmt->execute();

        return true;
    }

    public function deleteTela()
    {
        $link = Conexion::conectar();

        $sql = "DELETE FROM tela WHERE telaID = :telaID";
        $stmt = $link->prepare($sql);

        $stmt->bindParam(':telaID',$_GET['telaID'],PDO::PARAM_INT);

        $stmt->execute();

        return true;
    }

    public function buscarTelaPorID()
    {
        $link = Conexion::conectar();
        $sql = "SELECT nombTela, proveedTela FROM tela WHERE telaID = :telaID";
        $stmt = $link->prepare($sql);

        if(isset($_GET['telaID']))
        {
            $stmt->bindParam(':telaID',$_GET['telaID'],PDO::PARAM_INT);
        }
        else
        {
        $telaID = $this->getTelaID();
        $stmt->bindParam(':telaID',$telaID,PDO::PARAM_INT);
        }

        $stmt->execute();

        $datoTela = $stmt->fetch(PDO::FETCH_ASSOC);

        if($stmt->rowCount() == 0)
        {
            echo  '<h2>No existen tela en la base de Datos</h2>';
            return $datoTela;
        }
        else
        {
            return $datoTela;
        }
    }
}