<?php 

class Usuario {

    private $db;

    public function __construct(){
        $this->db = new Database();   
    }

    public function checkEmail($email){

        $this->db->query("SELECT email FROM users WHERE email = ?");
        $this->db->bind(1, $email);
        
        if($this->db->result()){
            return true;
        } else {
            return false;
        }

    }

    public function storage($dados){

        $this->db->query("INSERT INTO users(nome, email, senha) VALUES (?,?,?)");

        $this->db->bind(1, $dados['name']);
        $this->db->bind(2, $dados['email']);
        $this->db->bind(3, $dados['password']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function checkLogin($email, $password){

        $this->db->query('SELECT * FROM users WHERE email = ?');
        $this->db->bind(1, $email);

        if($this->db->result()){
            $result = $this->db->result();
            if(password_verify($password, $result['senha'])){
                return $result;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function showUserById($id){
        $this->db->query('SELECT * FROM users WHERE id = ?');
        $this->db->bind(1, $id);
        
        return $this->db->result();
    }

}

?>