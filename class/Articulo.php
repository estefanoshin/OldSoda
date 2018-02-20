<?php
class Articulo extends Corte
{
	private $artID;
	private $art;
	private $cant;
	private $descrip;
	private $img;

	private $nombTalle;
	private $nombColor;
    private $telaID;

    public function getArtID()
    {
        return $this->artID;
    }
    public function setArtID($artID)
    {
        $this->artID = $artID;
    }
    public function getArt()
    {
        return $this->art;
    }
    public function setArt($art)
    {
        $this->art = $art;
    }
    public function getCant()
    {
        return $this->cant;
    }
    public function setCant($cant)
    {
        $this->cant = $cant;
    }
    public function getDescrip()
    {
        return $this->descrip;
    }
    public function setDescrip($descrip)
    {
        $this->descrip = $descrip;
    }
    public function getImg()
    {
        return $this->img;
    }
    public function setImg($img)
    {
        $this->img = $img;
    }
    public function getNombColor()
    {
        return $this->nombColor;
    }
    public function setNombColor($nombColor)
    {
        $this->nombColor = $nombColor;
    }
    public function getNombTalle()
    {
        return $this->nombTalle;
    }
    public function setNombTalle($nombTalle)
    {
        $this->nombTalle = $nombTalle;
    }
    public function getTelaID()
    {
        return $this->telaID;
    }
    public function setTelaID($telaID)
    {
        $this->telaID = $telaID;
    }    

    //---------------------------------------------------------
    private function cargaDatosform()
    {
        if(isset($artID))
        {
            $this->setArtID($_POST['artID']);
        }
        if(isset($art))
        {
            $this->setArt($_POST['art']);
        }
        if(isset($cant))
        {
            $this->setCant($_POST['cant']);
        }
        if(isset($descrip))
        {
            $this->setDescrip($_POST['descrip']);
        }
        if(isset($img))
        {
            $this->setImg($_POST['img']);
        }
        if(isset($nombTalle))
        {
            $this->setNombTalle($_POST['nombTalle']);
        }
        if(isset($nombColor))
        {
            $this->setNombColor($_POST['nombColor']);
        }
        if(isset($telaID))
        {
            $this->setTelaID($_POST['telaID']);
        }
    }

    public function createArt($dato)
    {
        $this->cargaDatosform();
        $link = Conexion::conectar();

        $sql = 
        "INSERT INTO `articulo` (`art`, `cant`, `descrip`, `img`, `nombTalle`, `nombColor`)
        VALUES (:art, :cant, :descrip, :img, :nombTalle, :nombColor, :telaID);";

        $stmt = $link->prepare($sql);

        $stmt->bindValue(":art",$art=$this->getArt());
        $stmt->bindValue(":cant",$cant=$this->getCant());
        $stmt->bindValue(":descrip",$descrip=$this->getDescrip());
        $stmt->bindValue(":img",$img=$this->getImg());
        $stmt->bindValue(":nombTalle",$nombTalle=$this->getNombTalle());
        $stmt->bindValue(":nombColor",$nombColor=$this->getNombColor());
        $stmt->bindValue(":telaID",$telaID=$this->getTelaID());

        $stmt->execute();

        return true;
    }

    public function readArt()
    {
        $link = Conexion::conectar();
        $sql = "SELECT artID, art, cant, descrip, img, nombTalle, nombColor FROM articulo";
        $stmt = $link->prepare($sql);
        $stmt->execute();

        $listadoArt = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($stmt->rowCount() == 0)
        {
            echo  '<h2>No existen articulos en la base de datos, por favor ingrese alguno</h2>';
            return $listadoArt;
        }
        else
        {
            return $listadoArt;
        }
    }

    
    public function updateArt($dato)
    {
        $this->cargaDatosform();
        $link = Conexion::conectar();

        $sql =
        "UPDATE articulo
        SET art = :art, cant = :cant, descrip = :descrip, img = :img, nombTalle = :nombTalle, nombColor = :nombColor, telaID = :telaID
        WHERE artID = :artID";
        $stmt = $link->prepare($sql);

        $stmt->bindValue(":art",$art=$this->getArt());
        $stmt->bindValue(":cant",$cant=$this->getCant());
        $stmt->bindValue(":descrip",$descrip=$this->getDescrip());
        $stmt->bindValue(":img",$img=$this->getImg());
        $stmt->bindValue(":nombTalle",$nombTalle=$this->getNombTalle());
        $stmt->bindValue(":nombColor",$nombColor=$this->getNombColor());
        $stmt->bindValue(":telaID",$telaID=$this->getTelaID());

        $stmt->bindValue(":artID",$artID=$this->getArtID());

        $stmt->execute();

        $stmt = $link->prepare($sql);

        return true;
    }

    public function deleteArt($id)
    {
        $link = Conexion::conectar();

        $sql = "DELETE FROM articulo WHERE artID = :artID";
        $stmt = $link->prepare($sql);

        $stmt->bindValue(':artID', $id);

        $stmt->execute();

        $stmt = $link->prepare($sql);

        return true;
    }

    public function buscarArtPorID($id)
    {
        $link = Conexion::conectar();
        $sql = "SELECT art, cant, descrip, img, nombTalle, nombColor FROM articulo WHERE artID =".$id;

        $stmt = $link->prepare($sql);
        $stmt->execute();

        $datoArt = $stmt->fetch(PDO::FETCH_ASSOC);

        if($stmt->rowCount() == 0)
        {
            echo  '<h2>No existen modelo en la base de Datos</h2>';
            return $datoArt;
        }
        else
        {
            return $datoArt;
        }
    }
}