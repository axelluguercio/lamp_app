<?php

include_once DOCUMENT_ROOT.'model/userModel.php';
include_once DOCUMENT_ROOT.'view/authView.php';
include_once DOCUMENT_ROOT.'helpers/authHelper.php';

class authController {

    private $view;
    private $model;

    public function __construct() {
        $this->view = new authView();
        $this->model = new userModel();
        $this->helper = new authHelper();
        $this->error = new errorHelper();
    }

    function handlerMessage($res=null) {
        $this->error->getError($res);
        $this->Users($this->error->message);
    }

    function loginSession() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(!empty($_POST['email'])&& !empty($_POST['password'])){
                $userEmail = $_POST['email'];
                $userPassword = $_POST['password'];

                // obtengo el user
                $user = $this->model->getUserbyEmail($userEmail); 

                //Si el usuario existe y las contraseñas coinciden
                if($user && password_verify($userPassword, ($user->contraseña))) {
                    
                    // Guarda la sesion
                    $this->helper->login($user);
                    // almacena la clave en base64
                    $_SESSION['PASSWORD'] = base64_encode($_POST['password']);
                } else $this->view->showForm('login', "el email y/o la contraseña son invalidos");
            }
        } else $this->view->showForm('login');
    }

    public function logoutSession() {$this->helper->logout();}

    function registerSession() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!empty($_POST['nombre'] && !empty($_POST['email']) && !empty($_POST['password']))) {
                $userName = $_POST['nombre'];
                $userEmail = $_POST['email'];
                $userPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);

                $users = $this->model->verifyUser($userEmail);
                if (empty($users)) {
                    $this->model->createUser($userName, $userEmail, $userPassword);
                    // redirige a login
                    $this->view->showForm('login');
                } else 
                    $this->view->showForm('register', "El email ya esta registrado"); 
            }
        } else $this->view->showForm('register');
     
    }

    function Users($message=null) {
        $users = $this->model->getUsers();
        $this->view->showUsers($users, $message);
    }

    function modifyPermissions($params=[]) {
        $id_user = $params[':ID'];
        if (isset($_GET['permisos'])) {
            $perm = (string) $_GET['permisos'];
            $this->model->changePermissions($id_user, $perm);
            
            header('Location: ' . BASE_URL . 'usuarios');
        }
    }

    function deleteUser($params=[]) {
        $id_user = $params[':ID'];
        if (!empty($id_user)) {
            $res = $this->model->drop($id_user);

            $this->handlerMessage($res);
        }
    }
}

?>