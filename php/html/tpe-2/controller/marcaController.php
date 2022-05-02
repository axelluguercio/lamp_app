<?php

include_once DOCUMENT_ROOT.'model/marcaModel.php';
include_once DOCUMENT_ROOT.'model/autoModel.php';
include_once DOCUMENT_ROOT.'view/marcaView.php';
include_once DOCUMENT_ROOT.'helpers/authHelper.php';
include_once DOCUMENT_ROOT.'helpers/paginationHelper.php';
include_once DOCUMENT_ROOT.'helpers/errorHelper.php';

class marcaController {

    private $view;
    private $model;
    private $helper;
    public $pagination;

    public function __construct() {
        $this->view = new marcaView();
        $this->model = new marcaModel();
        $this->model_auto = new autoModel();
        $this->helper = new authHelper();
        $this->error = new errorHelper();
        $this->pagination  = new paginationHelper(2); 

        // chequea el numero de paginas como resultado 
        $this->pagination->nResultados = $this->model->countAllMarcas(); 

        // calcula las paginas
        $this->pagination->calcularPaginas();

    }

    function handlerSession() {
        $this->helper->checkLoggedIn();
        $this->helper->checkSessionTimeOut();
    }

    function handlerMessage($res) {
        $this->error->getError($res);
        $this->showAllMarcas($this->error->message);
    }

    // funcion para el buscar
    function handlerBuscador() {
        $marcas = $this->getAllMarcas();
        $this->showBuscador($marcas);
    }

    // Retornar nombre de la marca
    function getMarca($id) {
        $marca = $this->model->getMarcaByName($id, $index=1);
        return $marca;
    }

    function getAllMarcas() {
        return $marcas = $this->model->getAllMarcas();
    }

    function handlerPagination() {
        // si la pagina esta seteada, es un numero y es igual o mayor a 1 y menor o igual a total paginas
        if(isset($_GET['pagina'])) {
            if(is_numeric($_GET['pagina'])) {
                if(($_GET['pagina']) >= 1 && ($_GET['pagina']) <= $this->pagination->totalPaginas) {
                    $this->pagination->paginaActual = $_GET['pagina'];
                    $this->pagination->indice = ($this->pagination->paginaActual - 1) * ($this->pagination->resultadosPorPagina);
                }   
            }
        }
    }

    function showAllMarcas($message=null) {
        $this->handlerPagination();
    
        // saca los limites
        $pos = $this->pagination->indice;
        $n = $this->pagination->resultadosPorPagina;

        // obtiene las marcas paginadas
        $marcas = $this->model->getAllMarcas($pagination=true, $pos, $n);

        $this->view->showMarcas($marcas, $pag=$this->pagination->totalPaginas, $message);
    }

    function cleanMarca($params=[]) {
        $this->handlerSession();
        $id = $params[':ID'];
        $res = $this->model->deleteMarca($id);
        // maneja la excepcion del error
        $this->handlerMessage($res);
    }

    function modifyMarca($params=[]) {
        $this->handlerSession(); 
        $id = $params[':ID'];
        if ( (isset($_GET['nombre']) || !empty($_GET['nombre'])) && (isset($_GET['origen']) || !empty($_GET['origen'])) ) {
            $new_nombre = $_GET['nombre']; 
            $new_origen = $_GET['origen'];

            // Verifica que no exista el elemento
            $res = $this->model->verifyMarca($new_nombre, $new_origen);
            if (!empty($res))
                $this->handlerMessage('error/666');
            else {
                $res = $this->model->alterMarca($id, $new_nombre, $new_origen);
                // maneja la excepcion del error
                $this->handlerMessage($res);
            }
        } else {
            $marca = $this->model->getMarca($id);
            $this->view->showUpdateMarca($marca); 
        }  
    }

    function showBuscador($marcas) {
        if ( !empty($_GET['modelo']) || !empty($_GET['anio']) || !empty($_GET['id_marca']) ) {
            $modelo = $_GET['modelo'];
            $anio = $_GET['anio'];
            $id_marca = $_GET['id_marca'];

            $autos = $this->model->advanceFilter($id_marca, $modelo, $anio);
            $this->view->buscador($marcas, $autos);
        } else
            $this->view->buscador($marcas);
    }

    /*/ Funcion para comuinicarse con el modelo e insetar nueva marcaa /*/
    function createNewMarca() {
        $this->handlerSession();
        if ( (isset($_GET['nombre']) || !empty($_GET['nombre'])) &&  (isset($_GET['origen']) || !empty($_GET['origen']))) {
            $nombre = $_GET['nombre'];         
            $origen = $_GET['origen'];

            $res = $this->model->verifyMarca($nombre, $origen);
            if (!empty($res))
                $this->handlerMessage('error/666');
            else {
                $res = $this->model->insertMarca($nombre, $origen);
                $this->handlerMessage($res);
            }
        } else 
            $this->view->formCreateMarca();   
    }
    
    /*/ Funcion para mostrar las materias de una marcaa atraves del modelo y la vista /*/
    function showAutoFromMarca($id_marca) {
        $this->handlerPagination();
        $this->pagination->calcularPaginas();
        // saca los limites
        $pos = $this->pagination->indice;
        $n = $this->pagination->resultadosPorPagina;
        // obtiene los autos de la marca paginados
        $autos = $this->model->getAllAutosFromMarca($id_marca, $pagination=true, $pos, $n);
        return $autos;
    }

    function handlerAutosFromMarca($params=[]) {
        $id_marca = $params[':ID'];
        $marca = $this->getMarca($id_marca);
        // cuenta los autos de la marca disponibles
        //$nAutos = $this->model_auto->countAllAutoFromMarca($id_marca);
        // lo instancia como nuevo valor de autos por pagina
        
        //$this->pagination->nResultados = $nAutos;

        $autos = $this->showAutoFromMarca($id_marca);
        //$pag = $this->pagination->totalPaginas;

        $this->view->showAutosFromMarca($marca, $autos);
    }

    /*/ Funcion para eliminar las materias de una marca atraves del modelo y la vista /*/
    function deleteAutoFromMarca($id_marca) {
        $this->handlerSession();
        if ($this->handlerSession($context=false)) {
            $autos = $this->model->getAllAutosFromMarca($id_marca);
            return $autos;
        }
    }
}

?>
