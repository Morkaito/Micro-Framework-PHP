<?php 

class Usuarios extends Controller {

    public function __construct(){
        $this->userModel = $this->model('Usuario');
    }

    public function register(){

        $name = $email = $password = $checkPassword = '';
        $dados = [];
        $validOk = true;

        if($_SERVER["REQUEST_METHOD"] == 'POST'){
            if(empty($_POST['name'])){
                $dados['nameErr'] = "Preencha esse campo";
                $validOk = false;
            } else {
                $name = $this->test_input($_POST['name']);
                if(!preg_match("/^[a-zA-Z-' ]{3,}$/", $name)){
                    $dados['nameErr'] = 'Apenas letras no mínimo 3';
                    $validOk = false;
                }
            }

            if(empty($_POST['email'])){
                $dados['emailErr'] = "Preencha esse campo";
                $validOk = false;
            } else {
                $email = $this->test_input($_POST['email']);
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $dados['emailErr'] = 'E-mail inválido';
                    $validOk = false;
                }
            }

            if(empty($_POST['password'])){
                $dados['passwordErr'] = "Preencha esse campo";
                $validOk = false;
            } else {
                $password = $this->test_input($_POST['password']);
                if(!preg_match("/^[a-zA-Z0-9]{6,}$/", $password)){
                    $dados['passwordErr'] = 'Apenas letras(maiusculas e minusculas), números, caracteres especiais, mínino 8 digitos';
                    $validOk = false;
                }
            }

            if(empty($_POST['checkPassword'])){
                $dados['checkPasswordErr'] = "Preencha esse campo";
                $validOk = false;
            } else {
                $checkPassword = $this->test_input($_POST['checkPassword']);
                if(!preg_match("/^[a-zA-Z0-9]{6,}$/", $checkPassword)){
                    $dados['checkPasswordErr'] = 'Apenas letras(maiusculas e minusculas), números, caracteres especiais, mínino 8 digitos';
                    $validOk = false;
                }

                if($checkPassword !== $password){
                    $dados['checkPasswordErr'] = 'As senhas não coincidem';
                    $validOk = false;
                }
            }

            if($validOk){
                $dados['name'] = $name;
                $dados['email'] = $email;
                $dados['password'] = password_hash($password, PASSWORD_DEFAULT);
                if(!$this->userModel->checkEmail($dados['email'])){
                    if($this->userModel->storage($dados)){
                        Session::message('usuario','Cadastrado realizado com successo');
                        Url::Redirect('usuarios/login');
                    } else {
                        Session::message('usuario','Ocorreu um erro ao cadastrar','alert-danger');
                    }
                } else {
                    $dados['emailErr'] = 'E-mail informado já esta em uso';
                }
                
            }
        }

        $this->view('usuarios/register', $dados);
    }


    public function login(){

        $email = $password = '';
        $dados = [];
        $validOk = true;

        if($_SERVER["REQUEST_METHOD"] == 'POST'){

            if(empty($_POST['email'])){
                $dados['emailErr'] = "Preencha esse campo";
                $validOk = false;
            } else {
                $email = $this->test_input($_POST['email']);
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $dados['emailErr'] = 'E-mail inválido';
                    $validOk = false;
                }
            }

            if(empty($_POST['password'])){
                $dados['passwordErr'] = "Preencha esse campo";
                $validOk = false;
            } else {
                $password = $this->test_input($_POST['password']);
                if(!preg_match("/^[a-zA-Z0-9]{6,}$/", $password)){
                    $dados['passwordErr'] = 'Apenas letras(maiusculas e minusculas), números, caracteres especiais, mínino 8 digitos';
                    $validOk = false;
                }
            }

            if($validOk){
                $user = $this->userModel->checkLogin($email, $password);
                if($user){
                    $this->createUserSession($user);
                    Session::message('usuario','Logado com successo');
                    Url::Redirect('posts/index');
                } else {
                    Session::message('usuario','Usuario ou senha inválidos','alert-danger');
                }
            }
        }

        $this->view('usuarios/login', $dados);
    }

    public function exit(){
        unset($_SESSION['user_id']);
        unset($_SESSION['name']);
        unset($_SESSION['email']);

        session_destroy();
        Url::Redirect();
    }

    public function createUserSession($user){
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['nome'];
        $_SESSION['email'] = $user['email'];
    }

    public function test_input($data){
        $data = trim(rtrim($data));
        $data = htmlspecialchars($data);
        $data = stripcslashes($data);
        return $data;
    }

}

?>