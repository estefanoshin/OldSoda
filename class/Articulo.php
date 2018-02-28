<?php
class Articulo extends Corte
{
	private $artID;
	private $art;
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
        if(isset($_POST['artID']))
        {
            $this->setArtID($_POST['artID']);
        }
        if(isset($_POST['art']))
        {
            $this->setArt($_POST['art']);
        }
        if(isset($_POST['descrip']))
        {
            $this->setDescrip($_POST['descrip']);
        }
        if(isset($_POST['img']))
        {
            $this->setImg($_POST['img']);
        }
        if(isset($_POST['nombTalle']))
        {
            $this->setNombTalle($_POST['nombTalle']);
        }
        if(isset($_POST['nombColor']))
        {
            $this->setNombColor($_POST['nombColor']);
        }
        if(isset($_POST['telaID']))
        {
            $this->setTelaID($_POST['telaID']);
        }
    }

    public function createArt()
    {
        $this->cargaDatosform();
        $link = Conexion::conectar();

        $sql = 
        "INSERT INTO articulo (art, descrip, img, nombTalle, nombColor, telaID)
        VALUES (:art, :cant, :descrip, :img, :nombTalle, :nombColor, :telaID)";

        $stmt = $link->prepare($sql);

        $art = $this->getArt();
        $descrip = $this->getDescrip();
        $img = $this->getImg();
        $nombTalle = $this->getNombTalle();
        $nombColor = $this->getNombColor();
        $telaID = $this->getTelaID();

        $stmt->bindParam(":art",$art,PDO::PARAM_STR);
        $stmt->bindParam(":descrip",$descrip,PDO::PARAM_STR);
        $stmt->bindParam(":img",$img,PDO::PARAM_STR);
        $stmt->bindParam(":nombTalle",$nombTalle,PDO::PARAM_STR);
        $stmt->bindParam(":nombColor",$nombColor,PDO::PARAM_STR);
        $stmt->bindParam(":telaID",$telaID,PDO::PARAM_INT);

        $stmt->execute();

        return true;
    }

    public function readArt()
    {
        $link = Conexion::conectar();
        $sql = "SELECT artID, art, descrip, img, nombTalle, nombColor, telaID FROM articulo";
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

    
    public function updateArt()
    {
        $this->cargaDatosform();
        $link = Conexion::conectar();

        $sql =
        "UPDATE articulo
        SET art = :art, descrip = :descrip, img = :img, nombTalle = :nombTalle, nombColor = :nombColor, telaID = :telaID
        WHERE artID = :artID";
        $stmt = $link->prepare($sql);

        $art = $this->getArt();
        $descrip = $this->getDescrip();
        $img = $this->getImg();
        $nombTalle = $this->getNombTalle();
        $nombColor = $this->getNombColor();
        $telaID = $this->getTelaID();
        $artID = $this->getArtID();

        $stmt->bindParam(":art",$art,PDO::PARAM_STR);
        $stmt->bindParam(":descrip",$descrip,PDO::PARAM_STR);
        $stmt->bindParam(":img",$img,PDO::PARAM_STR);
        $stmt->bindParam(":nombTalle",$nombTalle,PDO::PARAM_STR);
        $stmt->bindParam(":nombColor",$nombColor,PDO::PARAM_STR);
        $stmt->bindParam(":telaID",$telaID,PDO::PARAM_INT);
        $stmt->bindParam(":artID",$artID,PDO::PARAM_INT);

        $stmt->execute();

        return true;
    }

    public function deleteArt()
    {
        $link = Conexion::conectar();

        $sql = "DELETE FROM articulo WHERE artID = :artID";
        $stmt = $link->prepare($sql);

        $stmt->bindParam(":artID",$_GET['artID'],PDO::PARAM_INT);

        $stmt->execute();

        return true;
    }

    public function buscarArtPorID()
    {
        $link = Conexion::conectar();
        $sql = "SELECT art, descrip, img, nombTalle, nombColor, telaID FROM articulo WHERE artID = :artID";

        $stmt = $link->prepare($sql);

        if(isset($_GET['artID']))
        {
            $this->setArtID($_GET['artID']);
            $stmt->bindParam(':artID',$_GET['artID'],PDO::PARAM_INT);
        }
        else
        {
            $artID = $this->getArtID();
            $stmt->bindParam(':artID',$artID,PDO::PARAM_INT);
        }

        $stmt->execute();

        $datoArt = $stmt->fetch(PDO::FETCH_ASSOC);

        if($stmt->rowCount() == 0)
        {
            $obj = new Metodo();
            return $datoArt;
        }
        else
        {
            return $datoArt;
        }
    }

    public function verifyArtDelete($id){
        $link = Conexion::conectar();
        $sql = "SELECT A.artID FROM articulo A JOIN corte C ON A.artID = C.artID WHERE C.artID = :artID";
        $stmt = $link->prepare($sql);

        $stmt->bindParam(':artID',$id,PDO::PARAM_INT);

        $stmt->execute();

        if($stmt->rowCount())
        {
            return 'enUso';
        }
        else
        {
            return 'noSeUsa';
        }
    }
}