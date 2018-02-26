<?php
class Cliente{
	private $clientID;
	private $nombClient;

    public function getClientID()
    {
        return $this->clientID;
    }
    public function setClientID($clientID)
    {
        $this->clientID = $clientID;
    }
    public function getNombClient()
    {
        return $this->nombClient;
    }
    public function setNombClient($nombClient)
    {
        $this->nombClient = $nombClient;
    }

    //---------------------------------------------------------
    private function cargaDatosform()
    {
        if(isset($_POST['clientID']))
        {
            $this->setClientID($_POST['clientID']);
        }
        if(isset($_POST['nombClient']))
        {
            $this->setNombClient($_POST['nombClient']);
        }
    }

    public function createClient()
    {
        $this->cargaDatosform();
        $link = Conexion::conectar();
        $sql = "INSERT INTO cliente(nombClient) VALUES (:nombClient);";
        $stmt = $link->prepare($sql);

        $nombClient = $this->getNombClient();

        $stmt->bindParam(":nombClient",$nombClient,PDO::PARAM_STR);

        $stmt->execute();

        return true;
    }

    public function readClient()
    {
        $link = Conexion::conectar();
        $sql = "SELECT clientID, nombClient FROM cliente";
        $stmt = $link->prepare($sql);
        $stmt->execute();

        $listadoClientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($stmt->rowCount() == 0)
        {
            echo  '<h2>No existen clientes en la base de datos, por favor ingrese alguno</h2>';
            return $listadoClientes;
        }
        else
        {
            return $listadoClientes;
        }
    }
    
    public function updateClient()
    {
        $this->cargaDatosform();
        $link = Conexion::conectar();

        $sql = "UPDATE cliente SET nombClient = :nombClient WHERE clientID = :clientID";
        $stmt = $link->prepare($sql);

        $nombClient = $this->getNombClient();
        $clientID = $this->getClientID();

        $stmt->bindParam(":nombClient",$nombClient,PDO::PARAM_STR);
        $stmt->bindParam(':clientID', $clientID,PDO::PARAM_INT);

        $stmt->execute();

        return true;
    }

    public function deleteClient()
    {
        $link = Conexion::conectar();

        $sql = "DELETE FROM cliente WHERE clientID = :clientID";
        $stmt = $link->prepare($sql);

        $stmt->bindParam(':clientID', $_GET['clientID']);

        $stmt->execute();

        return true;
    }

    public function buscarClientePorID(){

        $link = Conexion::conectar();
        $sql = "SELECT clientID, nombClient FROM cliente WHERE clientID = :clientID";
        $stmt = $link->prepare($sql);

        if(isset($_GET['clientID']))
        {
            $this->setclientID($_GET['clientID']);
            $stmt->bindParam(':clientID',$_GET['clientID'],PDO::PARAM_INT);
        }
        else
        {
        $stmt->bindParam(':clientID',$clientID,PDO::PARAM_INT);
        }

        $stmt->execute();

        $datoClient = $stmt->fetch(PDO::FETCH_ASSOC);

        if($stmt->rowCount() == 0)
        {
            echo  '<h2>No existen clientes en la base de Datos</h2>';
            return $datoClient;
        }
        else
        {
            return $datoClient;
        }
    }
}