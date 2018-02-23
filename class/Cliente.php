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

    public function createClient()
    {
        $link = Conexion::conectar();
        $sql = "INSERT INTO `cliente` `nombClient` VALUES :nombClient;";
        $stmt = $link->prepare($sql);

        $stmt->bindValue(":nombClient",$dato['nombClient']);

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
        $link = Conexion::conectar();

        $sql = "UPDATE cliente SET nombClient = :nombClient WHERE clientID = :clientID";
        $stmt = $link->prepare($sql);

        $stmt->bindValue(":nombClient", $dato['nombClient']);
        $stmt->bindValue(':clientID', $dato['clientID']);

        $stmt->execute();

        $stmt = $link->prepare($sql);

        return true;
    }

    public function deleteClient()
    {
        $link = Conexion::conectar();

        $sql = "DELETE FROM cliente WHERE clientID = :clientID";
        $stmt = $link->prepare($sql);

        $stmt->bindValue(':clientID', $id);

        $stmt->execute();

        $stmt = $link->prepare($sql);

        return true;
    }
}