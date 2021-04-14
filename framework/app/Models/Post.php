<?php 

class Post {

    private $db;

    public function __construct(){
        $this->db = new Database();   
    }

    public function storage($dados){

        $this->db->query("INSERT INTO posts(titulo, texto, usuario_id) VALUES (?,?,?)");

        $this->db->bind(1, $dados['title']);
        $this->db->bind(2, $dados['text']);
        $this->db->bind(3, $dados['user_id']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function readData(){
        $this->db->query('SELECT *, posts.id as postID, posts.criado_em as postDataRegister, users.id as userId, users.criado_em as userDataRegister FROM posts INNER JOIN users ON posts.usuario_id = users.id ORDER BY posts.id DESC');

        if($this->db->results()){
            $results =  $this->db->results();
            return $results;
        } else {
            return false;
        }
    }

    public function showPostById($id){
        $this->db->query('SELECT * FROM posts WHERE id = ?');
        $this->db->bind(1, $id);
        
        return $this->db->result();
    }

    public function update($dados){
        $this->db->query("UPDATE posts SET titulo = ?, texto = ? WHERE id = ?");

        $this->db->bind(1, $dados['title']);
        $this->db->bind(2, $dados['text']);
        $this->db->bind(3, $dados['user_id']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function delete($id){
        $this->db->query("DELETE FROM posts WHERE id = ?");

        $this->db->bind(1, $id);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

}

?>