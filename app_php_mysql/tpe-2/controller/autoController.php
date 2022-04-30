<?php

include_once DOCUMENT_ROOT . 'model/autoModel.php';
include_once DOCUMENT_ROOT . 'model/marcaModel.php';
include_once DOCUMENT_ROOT . 'view/autoView.php';
include_once DOCUMENT_ROOT . 'view/errorView.php';
include_once DOCUMENT_ROOT . 'helpers/authHelper.php';
include_once DOCUMENT_ROOT . 'helpers/errorHelper.php';
include_once DOCUMENT_ROOT . 'helpers/paginationHelper.php';

class autoController {

    private $view;
    public $model;
    private $helper;
    private $pagination;
    private $error_view;

    public function __construct() {
        $this->view = new autoView();
        $this->model = new autoModel();
        // modelo marca
        $this->model_marca = new marcaModel();
        $this->helper = new authHelper();
        $this->error = new errorHelper();
        $this->pagination  = new paginationHelper(10);
        $this->error_view = new errorView();

        // chequea el numero de paginas como resultado 
        $this->pagination->nResultados = $this->model->countAllAutos(); 

        // calcula las paginas
        $this->pagination->calcularPaginas();
    }

    function handlerSession() {
        // chequea si esta logueado y su ultima actividad
        $this->helper->checkLoggedIn();
        $this->helper->checkSessionTimeOut();
    }

    function handlerMessage($res=null) {
        $this->error->getError($res);
        $this->showAllAutos($this->error->message);
    }

    function showAuto($params=[]){ 
        $id = $params[':ID'];
        $auto = $this->model->getAuto($id);
        $this->view->displayAuto($auto);
    }

    function showAllAutos($message=null) {
        // si la pagina esta seteada, es un numero y es igual o mayor a 1 y menor o igual a total paginas
        if(isset($_GET['pagina'])) {
            if(is_numeric($_GET['pagina'])) {
                if(($_GET['pagina']) >= 1 && ($_GET['pagina']) <= $this->pagination->totalPaginas) {
                    $this->pagination->paginaActual = $_GET['pagina'];
                    $this->pagination->indice = ($this->pagination->paginaActual - 1) * ($this->pagination->resultadosPorPagina);
                }   
            }
        }
        // saca los limites
        $pos = $this->pagination->indice;
        $n = $this->pagination->resultadosPorPagina;
        // obtiene los autos paginados
        $result_autos = $this->model->getAllAutos($pagination=true, $pos, $n);
        $nPaginas = $this->pagination->totalPaginas;
        $this->view->showAutos($result_autos, $pag=$nPaginas, $message);
    }

    function cleanAuto($params=[]) {
        $this->handlerSession();
        $id = $params[':ID'];
        $res = $this->model->deleteAuto($id);

        // maneja la excepcion del error
        $this->handlerMessage($res);
    }

    function handlerModifyAuto($params=[]) {
        $this->handlerSession();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ( (isset($_POST['modelo']) || !empty($_POST['modelo'])) && (isset($_POST['anio']) || !empty($_POST['anio'])) && (isset($_POST['id_marca']) || !empty($_POST['id_marca']) ) ) {
                $id_auto = $_POST['id'];
                $new_modelo = $_POST['modelo'];
                $new_anio = $_POST['anio'];
                $new_marca = $_POST['id_marca'];
                $new_img = null;
                $pathext = null;
            
                if (!empty($_FILES['img']['name'])) {
                    // verifica imagen
                    $new_img = $this->handlerImage();
                    $pathext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
                }

                // Verifica que no exista el elemento
                $res = $this->model->verifyAuto($new_modelo, $new_anio, $new_marca, $new_img );
                if (!empty($res))
                    $this->handlerMessage('error/666');
                else {
                    $res = $this->model->alterAuto($id_auto, $new_modelo, $new_anio, $new_marca, $new_img, $pathext);
                    //maneja la excepcion del error
                    $this->handlerMessage($res);
                }  
            }
        } else {
            $id_auto = $params[':ID'];
            $marcas = $this->model_marca->getAllMarcas();
            $auto = $this->model->getAuto($id_auto);
            $this->view->showUpdateAuto($auto, $marcas);
        }  
    } 

    /*/ Funcion para comuinicarse con el modelo e insetar nuevo auto /*/
    function handlerCreateAuto() {
        $this->handlerSession();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ( (isset($_POST['modelo']) || !empty($_POST['modelo'])) && (isset($_POST['anio']) || !empty($_POST['anio'])) && (isset($_POST['id_marca']) || !empty($_POST['id_marca']) ) ) {
            $new_modelo = $_POST['modelo'];
            $new_anio = $_POST['anio'];
            $new_marca = $_POST['id_marca'];
            $img = null;
            $pathext = null;
            
                // Verifica que no exista el elemento
                $res = $this->model->verifyAuto($new_modelo, $new_anio, $new_marca);
                if (!empty($res))
                    $this->handlerMessage('error/666');
                else {
                    // verifica imagen
                    $img = $this->handlerImage();
                    $pathext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
                    $new_id = $this->model->insertAuto($new_modelo, $new_anio, $new_marca, $img, $pathext);
                    $this->handlerMessage();
                }
            }
        } else {
            $marcas = $this->model_marca->getAllMarcas();
            $this->view->formCreateAuto($marcas);
        }
    }

    /*/
    function deleteImage($params=[]) {
        $id = $params=[':ID'];
        echo $id;
        $res = $this->model->cleanImage($id);
        $this->handlerMessage($res);
    }
    /*/
    
    function handlerImage() {
        if ($_FILES['img']['name']) {
            $errors = array();
            $ext = $_FILES['img']['type'];
            // limite maximo de size
            $maxsize = 2097152;
            $allow_extension = array('image/jpg', 'image/png', 'image/jpeg', 'image/gif');

            if(($_FILES['img']['size'] >= $maxsize) || ($_FILES["img"]["size"] == 0))
                $errors[] = 'Tamaño maximo de imagen permitido de 2MB.';

            if (!in_array($ext, $allow_extension) && (!empty($_FILES["img"]["type"]))) 
                $errors[] = 'Tipo de archivo invalido. Solo se permite JPG, GIF y PNG';
            if(count($errors) === 0) {
                $img = $_FILES['img']['tmp_name'];
                return $img;
            }
            else
                return null;
        }
    }
    
}

?>
