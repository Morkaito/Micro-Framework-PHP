<?php 

class Posts extends Controller {

    public function __construct(){
        if(!isset($_SESSION['user_id'])){
            Url::Redirect('usuarios/login');
        }

        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('Usuario');
    }

    public function index(){

        $dados = [
            'posts' => $this->postModel->readData()
        ];
        $this->view('posts/index', $dados);

    }

    public function register(){

        $title = $text = '';
        $dados = [];
        $validOk = true;

        if($_SERVER["REQUEST_METHOD"] == 'POST'){
            if(empty($_POST['title'])){
                $dados['titleErr'] = "Preencha esse campo";
                $validOk = false;
            } else {
                $title = $this->test_input($_POST['title']);
                if(!preg_match("/^[a-zA-Z-' ]{3,}$/", $title)){
                    $dados['titleErr'] = 'Apenas letras no mínimo 3';
                    $validOk = false;
                }
            }

            if(empty($_POST['text'])){
                $dados['textErr'] = "Preencha esse campo";
                $validOk = false;
            } else {
                $text = $this->test_input($_POST['text']);
                if(!preg_match("/^.+$/", $text)){
                    $dados['textErr'] = 'Apenas letra, números, simbolos no mínimo 3';
                    $validOk = false;
                }
            }

            if($validOk){
                $dados['title'] = $title;
                $dados['text'] = $text;
                $dados['user_id'] = $_SESSION['user_id'];
                if($this->postModel->storage($dados)){
                    $_SESSION['post'] = '';
                    Session::message('post','Post inserido com successo');
                    Url::Redirect('posts/index');
                } else {
                    Session::message('post','Ocorreu um erro ao inserir o post','alert-danger');
                }
            }
        }

        $this->view('posts/register', $dados);

    }

    public function show($id){
        $post = $this->postModel->showPostById($id);
        $user = $this->userModel->showUserById($post['usuario_id']);

        $dados = [
            'post' => $post,
            'user' => $user
        ];

        $this->view('posts/show', $dados);
    }

    public function edit($id){

        $title = $text = '';
        $dados = [];
        $validOk = true;

        $post = $this->postModel->showPostById($id);

        if($post['usuario_id'] != $_SESSION['user_id']){
            $_SESSION['post'] = '';
            Session::message('post','Você não tem autorização para editar este post','alert-danger');
            Url::Redirect('posts/index');
        }

        $dados = [
            'titulo' => $post['titulo'],
            'texto' => $post['texto']
        ];

        if($_SERVER["REQUEST_METHOD"] == 'POST'){
            if(empty($_POST['title'])){
                $dados['titleErr'] = "Preencha esse campo";
                $validOk = false;
            } else {
                $title = $this->test_input($_POST['title']);
                if(!preg_match("/^[a-zA-Z-' ]{3,}$/", $title)){
                    $dados['titleErr'] = 'Apenas letras no mínimo 3';
                    $validOk = false;
                }
            }

            if(empty($_POST['text'])){
                $dados['textErr'] = "Preencha esse campo";
                $validOk = false;
            } else {
                $text = $this->test_input($_POST['text']);
                if(!preg_match("/^.+$/", $text)){
                    $dados['textErr'] = 'Apenas letra, números, simbolos no mínimo 3';
                    $validOk = false;
                }
            }

            if($validOk){
                $dados['title'] = $title;
                $dados['text'] = $text;
                $dados['user_id'] = $id;
                if($this->postModel->update($dados)){
                    $_SESSION['post'] = '';
                    Session::message('post','Post inserido com successo');
                    Url::Redirect('posts/index');
                } else {
                    Session::message('post','Ocorreu um erro ao inserir o post','alert-danger');
                }
            }
        }

        $this->view('posts/edit', $dados);

    }

    public function delete($id){

        $post = $this->postModel->showPostById($id);

        if($post['usuario_id'] != $_SESSION['user_id']){
            $_SESSION['post'] = '';
            Session::message('post','Você não tem autorização para deletar este post','alert-danger');
            Url::Redirect('posts/index');
        } else {
            if($this->postModel->delete($id)){
                $_SESSION['post'] = '';
                Session::message('post','Post deletado com successo');
                Url::Redirect('posts/index');
            } else {
                Session::message('post','Ocorreu um erro ao deletar o post','alert-danger');
            }
        }
    }

    public function test_input($data){
        $data = trim(rtrim($data));
        $data = htmlspecialchars($data);
        $data = stripcslashes($data);
        return $data;
    }

}

?>