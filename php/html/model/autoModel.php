<?php

class autoModel {

    private $db;
    
    public function __construct() {

        $this->db = new PDO('mysql:host=mysql-service;'.'dbname=automotriz;charset=utf8', 'root', 'goelvis');

        // atributos de pdo para el debug de errorers
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // devuelve la cuenta de los autos totales
    function countAllAutos() {
        $query = $this->db->prepare('SELECT COUNT(*) AS total FROM auto');
        $query->execute();

        // devuelve el resultado del conteo
        $resultado = $query->fetch(PDO::FETCH_OBJ)->total;

        return $resultado;
    }

    function getAllAutos($pagination=false, $pos=null, $n=null) {

        if ($pagination) {
            // 2. Enviamos la consulta con la palabra limit para la paginacion
            $query = $this->db->prepare('SELECT * FROM auto LIMIT ?, ?');
            $query->bindParam(1, $pos, PDO::PARAM_INT);
            $query->bindParam(2, $n, PDO::PARAM_INT);  
            $query->execute();
        } else {
            // sino. Enviamos la consulta normal
            $query = $this->db->prepare('SELECT * FROM auto');
            $query->execute();
        }
    
        // 3. obtengo la respuesta de la DB
        $autos = $query->fetchAll(PDO::FETCH_OBJ);

        return $autos;
    }

    // funcion para paginar los autos de x marca
    function countAllAutoFromMarca($id_marca) {
        $query = $this->db->prepare('SELECT COUNT(*) AS total FROM auto WHERE id_marca=?');
        $query->execute([$id_marca]);

        // devuelve el resultado del conteo
        $resultado = $query->fetch(PDO::FETCH_OBJ)->total;

        return $resultado;
    }

    function getAutoByName($modelo) {
        try {
            $query = $this->db->prepare('SELECT * FROM auto WHERE modelo LIKE ?');
            $query->execute(['%'.$modelo.'%']);
            $autos = $query->fetchAll(PDO::FETCH_OBJ);
            return $autos;

        }
        catch (PDOException $error) {
            $error->getMessage();
            return $error;
        }    
    }

    function getAuto($id) {

        // 2. Enviamos la consulta
        $query = $this->db->prepare('SELECT * FROM auto WHERE id_auto=? ');
        $query->execute([$id]);
    
        // 3. obtengo la respuesta de la DB
        $auto = $query->fetch(PDO::FETCH_OBJ);

        return $auto;
    }

    // verifica el modelo para no ingresar 2 veces
    function verifyAuto($modelo, $anio, $marca, $img) {
        
        $query = $this->db->prepare('SELECT modelo FROM auto WHERE modelo = ? AND anio = ? AND id_marca = ? AND img = ?');
        $query->execute([$modelo, $anio, $marca, $img]);

        $res = $query->fetchAll(PDO::FETCH_OBJ);
        return $res;
    
    }

    function insertAuto($modelo, $anio, $marca, $img = null, $ext = null) {
        
        $pathImg = null;

        if ($img) 
            $pathImg = $this->uploadImage($img, $ext);

        try {
            $query = $this->db->prepare('INSERT INTO auto (modelo, anio, img, id_marca) VALUES (?, ?, ?, ?)');
            $query->execute([$modelo, $anio, $pathImg, $marca]);
    
            // 3. Obtengo y devuelo el ID de la tarea nueva
            return $this->db->lastInsertId();
        }
        catch (PDOException $error) {
            // devuelve el error y lo imprime
            $message = $error->getMessage();
            $code = $error->getCode();
            return $message . '/' . $code;
        }
              
    }

    private function uploadImage($image, $ext){

        $filePath = "img/auto/" . uniqid("", true) . "." . strtolower($ext);
        move_uploaded_file($image, $filePath);
        return $filePath;
    }

    function cleanImage($id) {
        try {
            $data = [
                'vacio' => '',
                'id' => $id,
            ];

            $query = $this->db->prepare('UPDATE auto SET img=:vacio WHERE id_auto = :id')->execute($data);

        } 
        catch (PDOException $error) {
            // devuelve el error y lo imprime
            $message = $error->getMessage();
            $code = $error->getCode();
            echo $message . '/' . $code;
        }
    }

    function deleteAuto($id) {
        try {
            $query = $this->db->prepare('DELETE from auto where id_auto = ?');
            $query->execute([$id]);
        }
        catch (PDOException $error) {
            // devuelve el error y lo imprime
            $message = $error->getMessage();
            $code = $error->getCode();
            return $message . '/' . $code;
        }
    }

    /*/ Funcion para modificar el auto /*/
    function alterAuto($id, $modelo, $anio, $marca, $img = null, $ext = null){
        try {
            $pathImg = null;

            $sql_with_img = 'UPDATE auto SET modelo=?, anio=?, img=?, id_marca=? WHERE id_auto=?';
            $sql_without_img = 'UPDATE auto SET modelo=?, anio=?, id_marca=? WHERE id_auto=?';
            if ($img) {
                $pathImg = $this->uploadImage($img, $ext);
                $query = $this->db->prepare($sql_with_img);
                $query->execute([$modelo, $anio, $pathImg, $marca, $id]);
            } else {
                $query = $this->db->prepare($sql_without_img);
                $query->execute([$modelo, $anio, $marca, $id]);
            }
        }
        catch (PDOException $error) {
            // devuelve el error y lo imprime
            $message = $error->getMessage();
            $code = $error->getCode();
            return $message . '/' . $code;
        }
    }
}

?>
